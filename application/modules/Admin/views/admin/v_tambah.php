<section class="section">
          <div class="section-header">
            <h1>Tambah Data Baru</h1>
          </div>
</section>

<div class="section-body">
          <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-6 col-lg-5">
                <div class="card">
                    <form action="<?php echo base_url('Admin/tambah_post')?>"  method="post" enctype="multipart/form-data">
                        <div class="card-header">
                        <h4>Masukkan Data</h4>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label>Nama*</label>
                            <input type="text" name="users" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username*</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Kontak*</label>
                            <input type="number" name="no" class="form-control" required>
                        </div>
                       
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Foto*</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        </div>
                        <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
</div>