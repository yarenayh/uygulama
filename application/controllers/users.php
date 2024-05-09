<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
    {
	   parent::__construct();

	   $this->viewFolder="users_v";
	   $this->load->model("users_model");
    }

	public function index()
	{
		$this->load->model('users_model');
		$items = $this->users_model->getAll();

		//print_r($items);

		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function new_Form()
		{
			$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
	
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

		public function save()
		{
			//kutuphane yuklendı
			$this->load->library("form_validation");
	
			//kurallar
			$this->form_validation->set_rules("email", "kullanıcı adı girin ","required|trim|valid_email|is_unique[users.email]");
			$this->form_validation->set_rules("name", "isim ","required|trim");
            $this->form_validation->set_rules("surname", "soyad ","required|trim");
            $this->form_validation->set_rules("password", "şifre ","required|trim");
            $this->form_validation->set_rules("re-password", "şifre ","required|trim|matches[password]");
			//mesajlar
			$this->form_validation->set_message(
				array(
				"required"=>"<b>{field}</b>  Alanı Doldurulmalıdır",
                "valid_email"=>"<b>{field}</b>  Geçerli bir eposta değildir.",
                "is_unique"=>"<b>{field}</b>  Daha önceden sistemde kayıtlıdır",
                "matches"=>" Şifreler birbiriyle uyuşmuyor."
				)
			);
			//calıstırılnası
			$validate=$this->form_validation->run(); 
	
			if($validate){
				//echo "Kayıt başarılı";
				$data=array(
					"email"=>$this->input->post("email"),
					"name"=>$this->input->post("name"),
                    "surname"=>$this->input->post("surname"),
                    "password"=>md5($this->input->post("password")),
                    "is_active"=>1
					
				);
				$insert=$this->users_model->add($data);
				if($insert){
					redirect(base_url("users"));
				}
				else{
					echo "Kayıt sırasında hata";
				}
			}
			else {
			//echo "validasyon başarısız";
			$viewData = new stdClass();
			$viewData->viewFolder=$this->viewFolder;
			$viewData->subViewFolder="add";
			$viewData->formError=true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
			}
				
				
		}
		public function delete($id)
		{
			$data =  array(
				"id"=> $id
			);
			$this->users_model->delete($data);

			//todo alert sistemi entegre edilicek.
			redirect(base_url("users"));
		}
		/*public function new_form($id)
		{

		}
		public function save($id)
		{

		}*/
		public function update_form($id)
		{
			$item= $this->users_model->get(array(
				"id"=> $id
			)
			);
		$viewData = new stdClass();
		$viewData->item = $item;
		$viewData->subViewFolder = "update";
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
		public function update($id)
		{
			$this->load->library("form_validation");
	
			//kurallar
			$this->form_validation->set_rules("email", "kullanıcı adı girin ","required|trim|valid_email");
			$this->form_validation->set_rules("name", "isim ","required|trim");
            $this->form_validation->set_rules("surname", "soyad ","required|trim");
            $this->form_validation->set_rules("password", "şifre ","required|trim");
			//mesajlar
			$this->form_validation->set_message(
				array(
                    "required"=>"<b>{field}</b>  Alanı Doldurulmalıdır",
                    "valid_email"=>"<b>{field}</b>  Geçerli bir eposta değildir.",
                    "matches"=>" Şifreler birbiriyle uyuşmuyor."
				)
			);
			//calıstırılnası
			$validate=$this->form_validation->run(); 
	
			if($validate){
				//echo "Kayıt başarılı";
				$data=array(
					"email"=>$this->input->post("email"),
					"name"=>$this->input->post("name"),
                    "surname"=>$this->input->post("surname"),
                    "password"=>md5($this->input->post("password"))
				);
			$update=$this->users_model->update(
				array(
					"id"=>$id
				),
				$data
			);
			if($update)
			{
				redirect(base_url("users"));
			}
			else
			{
				echo"başarısız";
			}
			}
			else{
				$item=$this->users_model->get(
					array(
						"id"=>$id
					)
					);
					$viewData = new stdClass();
					$viewData->item =$item;
					$viewData->subViewFolder="update";
					$viewData->viewFolder =$this->viewFolder;
					$viewData->formError=true;
					$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
			}
		}
}