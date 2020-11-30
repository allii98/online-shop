
<section class="section">
          <div class="section-header">
            <h1>Admin</h1>
            
          </div>
          <?php echo $this->session->flashdata('pesan'); ?>
</section>

<div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Admin</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                        <a href="<?=base_url("Admin/tambah")?>" class="btn btn-success">Tambah</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body ">
                    
                    <div class="table-responsive">

                        <table id="table1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th style="text-align:center">Nama</th>
                                    <th style="text-align:center">Username</th>
                                    <th style="text-align:center">Email</th>
                                    <th style="text-align:center">Kontak</th>
                                    <th style="text-align:center">Foto</th>
                                    <th style="text-align:center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;
                            if(isset($admin) ){
                            foreach ($admin as $data) { ?>
                                <tr>
                                    <td style="text-align:center"><?=$no++?></td>
                                    <td style="text-align:center"><?=$data->admin_nama?></td>
                                    <td style="text-align:center"><?=$data->admin_username?></td>
                                    <td style="text-align:center"><?=$data->admin_email?></td>
                                    <td style="text-align:center"><?=$data->admin_nohp?></td>
                                    <td style="text-align:center"><?php if ($data->admin_foto != null) { ?>
                                        <img src="<?php echo base_url('assets/uploads/admin/'.$data->admin_foto)?>" width="60px">
                                      <?php } ?>
                                    </td>
                                    <td style="text-align:center">
                                    <form action="<?=base_url()?>Admin/hapus/<?=$data->admin_id?>" method="post">
                                      <a href="<?=base_url()?>Admin/edit/<?=$data->admin_id?>" class="btn btn-primary " title="Edit" >
                                        <i class="fa fa-edit"></i>
                                      </a>
                                      <button type="submit"  class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah Anda Yakin?')" >
                                        <i class="fa fa-trash"></i> 
                                      </button>
                                    </form>		
                                    </td>
                                </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        