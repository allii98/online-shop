<section class="section">
    <div class="section-header">
      <h1>Kategori</h1>
    </div>
    
</section>

<?php echo $this->session->flashdata('pesan'); ?>
    <div class="section-body">
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Kategori</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#Modal-tambah">Tambah</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body ">
                    
                    <div class="table-responsive">

                        <table id="tbrg" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th style="text-align:center">Nama</th>
                                    
                                    <th style="text-align:center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;
                            if(isset($kat) ){
                            foreach ($kat as $data) { ?>
                                <tr>
                                    <td style="text-align:center"><?=$no++?></td>
                                    <td style="text-align:center"><?=$data->kategori_nama?></td>
                                    
                                    <td style="text-align:center">
                                    <form action="<?=base_url()?>Kategori/del/<?=$data->kategori_id?>" method="post">
                                        <button type="button" class="btn btn-primary " title="Edit" data-toggle="modal" data-target="#Modal-edit<?=$data->kategori_id;?>">
                                            <i class="fa fa-edit"></i>
                                        </button>
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

<!-- modal tambah -->

    <div class="modal fade " tabindex="-1" role="dialog" id="Modal-tambah"  >  
       <div class="modal-dialog modal-md modal-dialog-centered" role="document">     
            <div class="modal-content">    
                <div class="modal-header">    
                    <h5 class="modal-title">Masukkan Data</h5>   
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                            <span aria-hidden="true">×</span>             
                        </button>           
                    </div>
                    <form action="<?php echo base_url('Kategori/tambah')?>" id="form" method="post" >
                        <div class="modal-body">   
                            <div class="form-group">
                                <label  class=" form-control-label">Nama Kategori*</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <button type="reset" class="btn btn-danger "> Reset</button>
                        </div>  
                    </form>
                    </div>      
                 </div>  
    </div>

<!-- modal edit -->
<?php $no = 0;
        if(isset($kat) ){
        foreach ($kat as $data)  {  $no++; ?>
    <div class="modal fade " tabindex="-1" role="dialog" id="Modal-edit<?=$data->kategori_id;?>"  >  
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">     
            <div class="modal-content">    
                <div class="modal-header">    
                    <h5 class="modal-title">Edit Data</h5>   
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                            <span aria-hidden="true">×</span>             
                        </button>           
                    </div>
                    <form action="<?php echo base_url('Kategori/edit')?>" id="form" method="post" >
                        <div class="modal-body">   
                            <div class="form-group">
                            <input type="hidden" readonly value="<?=$data->kategori_id;?>" name="id" class="form-control" >
                                <label for="nama" class=" form-control-label">Nama Kategori*</label>
                                <input type="text" id="nama" name="nama" value="<?=$data->kategori_nama?>" class="form-control" required>
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <button type="reset" class="btn btn-danger "> Reset</button>
                        </div>  
                    </form>
                    </div>      
                 </div>  
    </div>
    <?php } }?>