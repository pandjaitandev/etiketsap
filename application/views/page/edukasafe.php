<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>
    <?php $this->view('message') ?>    
    <div class="row">      
      <!-- Menu-->
      <div class="col-lg-2 col-4">      	
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('edukasafe/kategori/keselamatan')?>">
            <img src="<?= base_url("")?>/assets/dist/img/keselamatan.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('edukasafe/kategori/keselamatan')?>" class="small-box-footer">
            Keselamatan
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('edukasafe/kategori/kesehatan')?>">
            <img src="<?= base_url("")?>/assets/dist/img/kesehatan.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('edukasafe/kategori/kesehatan')?>" class="small-box-footer">
            Kesehatan
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('edukasafe/kategori/lingkungan')?>">
            <img src="<?= base_url("")?>/assets/dist/img/lingkungan.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('edukasafe/kategori/lingkungan')?>" class="small-box-footer">
            Lingkungan
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content