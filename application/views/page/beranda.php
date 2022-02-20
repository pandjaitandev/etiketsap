<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  <?php $this->view('message') ?>     
    <div class="row">
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/embed/safetyeducation')?>">
            <img src="<?= base_url("")?>/assets/dist/img/safetyeducation.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/embed/safetyeducation')?>" class="small-box-footer">
            Safety Education
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/embed/companyprofile')?>">
            <img src="<?= base_url("")?>/assets/dist/img/companyprofile.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/embed/companyprofile')?>" class="small-box-footer">
            Company Profile
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/pancanirbhaya')?>">
            <img src="<?= base_url("")?>/assets/dist/img/pancanirbhaya.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/pancanirbhaya')?>" class="small-box-footer">
            Panca <br> Nirbhaya
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/edukasafe')?>">
            <img src="<?= base_url("")?>/assets/dist/img/edukasafe.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/edukasafe')?>" class="small-box-footer">
            Edukasafe <br><br>
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/hazardreport')?>">
            <img src="<?= base_url("")?>/assets/dist/img/hazardreport.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/hazardreport')?>" class="small-box-footer">
            Hazard Report (SAP) <br>
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/embed/sumbangsaran')?>">
            <img src="<?= base_url("")?>/assets/dist/img/sumbangsaran.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/embed/sumbangsaran')?>" class="small-box-footer">
            Sumbang Saran (K3) <br>
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/embed/webinarcompany')?>">
            <img src="<?= base_url("")?>/assets/dist/img/webinarcompany.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/embed/webinarcompany')?>" class="small-box-footer">
            Webinar Company <br>
          </a>
        </div>
      </div>      
      <!-- Menu-->
      <div class="col-lg-2 col-4">      	
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('profil')?>">
            <img src="<?= base_url("")?>/assets/dist/img/profil.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('profil')?>" class="small-box-footer">
            Profil Pengguna
          </a>
        </div>
      </div>
      <?php if ($this->session->tipe_user == "3") { ?>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('link')?>">
            <img src="<?= base_url("")?>/assets/dist/img/link.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('link')?>" class="small-box-footer">
            Edit Link <br><br>
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('edukasafe')?>">
            <img src="<?= base_url("")?>/assets/dist/img/artikel.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('edukasafe')?>" class="small-box-footer">
            Tambah Artikel Edusafe
          </a>
        </div>
      </div>
      <?php } ?>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/tentang')?>">
            <img src="<?= base_url("")?>/assets/dist/img/tentang.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/tentang')?>" class="small-box-footer">
            Tentang Aplikasi
          </a>
        </div>
      </div>      
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content