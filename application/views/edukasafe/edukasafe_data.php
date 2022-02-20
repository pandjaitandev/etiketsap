<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <?php if ($this->fungsi->user_login()->tipe_user < 3) { } else {;?>
        <a href="<?=base_url('edukasafe/tambah');?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a>          
        <?php }?>
        <?php if ($this->fungsi->user_login()->tipe_user == 1) { ?>
        <a href="<?=base_url('page/edukasafe');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
        <?php }?>
        <?php if ($this->fungsi->user_login()->tipe_user == 3) { ?>
        <a href="<?=base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
        <?php }?>
      </div>

      <?php        
        foreach ($row->result() as $key => $data) {;
      ?>

      <div class="col-md-3 float-md-left">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid" src="<?= base_url()?>assets/dist/img/foto-edukasafe/<?= ($data->foto != null) ? $data->foto : "foto-default.png"; ?>" alt="User profile picture" style="width: 300px; height: 200px">
            </div>

            <h3 class="profile-username text-center"><?=$data->judul?></h3>

            <p class="text-muted text-center">
              <i class="fas fa-user"></i> <?= $this->fungsi->pilihan_selected("tb_user",$data->user_id)->row("nama")?> <br> 
              <i class="fas fa-eye"></i> <?= $data->kategori?> 
            </p>          

            <center>
            <a href="<?= site_url('edukasafe/detail/'.$data->id);?>" class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i><b> Lihat</b></a>
            
            <?php if ($this->fungsi->user_login()->tipe_user < 4) { } else {;?> 
            <a href="<?= site_url('edukasafe/edit/'.$data->id);?>" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i><b> Edit</b></a>
            <a href="<?= site_url('edukasafe/hapus/'.$data->id);?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah yakin mau dihapus?')"><i class="fas fa-trash"></i><b> Hapus</b></a>
            </center>
            <?php } ?>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <?php }?>      
    </div>    
    <div class="col-12">
      <?= $this->pagination->create_links(); ?>
    </div>
  </div>
</section>