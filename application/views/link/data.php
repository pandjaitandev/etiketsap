<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">
        <a href="<?=base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>  
      <div class="card-body">
          <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td><?= $data->deskripsi?></td>
                  <?php if ($this->session->tipe_user == 3) {?>
                  <td>
                    <a href="<?= site_url('link/edit/'.$data->id);?>" class="btn btn-sm btn-warning"><i class='fas fa-pencil-alt'></i> Edit </a>                    
                  </td>
                  <?php } ?>                   
                </tr>
              <?php }?>
            </tbody>            
          </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --