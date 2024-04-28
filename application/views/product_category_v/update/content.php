<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ürün Kategorisi Güncelleme İşlemleri</h1>
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
                <h3 class="card-title">Ekleme formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php echo base_url("Product_Category/update/$item->id")?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Ürün Katagori Adı</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" value="<?php echo isset($formError) ? set_value("title"): $item->title;?>" placeholder=" Ürün Katagori Adı Giriniz">
                    </div>
                  </div>
                  <?php if(isset($formError)){?>
                      <small> <?php echo form_error("title");?></small>
                  <?php }?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Kaydet</button>
                  <a href="<?php echo base_url("Product_Category")?>" class="btn btn-default float-right">İptal</a>
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