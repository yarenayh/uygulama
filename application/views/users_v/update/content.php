<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kullanıcı İşlemleri</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Güncelleme Formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php echo base_url("users/update/$item->id")?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" value="<?php echo isset($formError) ? set_value("email"): $item->email;?>" placeholder=" Email Giriniz">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">İsim</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="<?php echo isset($formError) ? set_value("name"): $item->name;?>" placeholder="Kullanıcı Adı Giriniz">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Soyisim</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="surname" value="<?php echo isset($formError) ? set_value("surname"): $item->surname;?>" placeholder="Kullanıcı Soyadı Giriniz">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Parola</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="password" value="<?php echo isset($formError) ? set_value("password"): $item->password;?>" placeholder="Kullanıcı Şifresi Giriniz">
                    </div>
                  </div>
                  <?php if(isset($formError)){?>
                      <small> <?php echo form_error("email");?></small>
                      <small> <?php echo form_error("name");?></small>
                      <small> <?php echo form_error("surname");?></small>
                      <small> <?php echo form_error("password");?></small>
                  <?php }?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Kaydet</button>
                  <a href="<?php echo base_url("users")?>" class="btn btn-default float-right">İptal</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->