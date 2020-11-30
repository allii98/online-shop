<section class="section">
          <div class="section-header">
            <h1>Edit Data Admin</h1>
          </div>

          
</section>

<div class="section-body">
          <?php $no=0; foreach($isi as $data): $no++; ?>
          <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-6 col-lg-5">
                <div class="card">
                    <form action="<?php echo base_url('Admin/edit_post')?>"   method="post" enctype="multipart/form-data">
                        <div class="card-header">
                        <h4>Edit Data</h4>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$data->admin_id;?>">
                            <label>Nama*</label>
                            <input type="text" name="users" value="<?=$data->admin_nama;?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username*</label>
                            <input type="text" name="username" value="<?=$data->admin_username;?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="email" value="<?=$data->admin_email;?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Kontak*</label>
                            <input type="number" name="no" value="<?=$data->admin_nohp;?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                                <div class="col-9">
                                    <?php if ($data->admin_foto != null) { ?>
                                        <img src="<?php echo base_url('assets/uploads/admin/'.$data->admin_foto)?>" width="60px">
                                      <?php } ?>
                                </div>
                        </div>
                        <div class="form-group ">
                          <label for="example-text-input" class="col-8 ">Ganti Foto (Kosongkan jika tidak diganti)</label>
                            <div class="col-9">
                                <input type="hidden" name="old" value="<?=$data->admin_foto?>">
                                <input class="form-control " type="file" name="image" >
                            </div>
                        </div>
                        
                        </div>
                        <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>