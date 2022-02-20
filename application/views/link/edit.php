<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('link');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="post">
          <div class="card-body">
            <input type="hidden" class="form-control" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
            <div class="form-group">
              <label for="exampleInputEmail1">Link untuk : <?= $row->deskripsi?></label>
              <input type="text" class="form-control" name="link" placeholder="Masukkan link" required="" value="<?= $this->input->post('link') ?? $row->link ?>">
              <?php echo form_error('link')?>                        
            </div>            
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-success">Edit</button>
            <a href="<?= site_url('pengaturan')?>" class="btn btn-info float-right">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>