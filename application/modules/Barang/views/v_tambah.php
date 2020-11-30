<section class="section">
          <div class="section-header">
            <h1><?=$tittle;?></h1>
          </div>

          
</section>

<div class="section-body">
            

              <!-- start:: List Request -->
                <div class="row list-group">
                <form action="<?php echo base_url('Barang/tambah_post')?>" id="form"  method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                    
                        <div class="card">
                            <div class="card-header">
                                    <h4>Masukkan Data</h4>
                            </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                <label for="example-text-input" class="col-2 ">Nama Barang*</label>
                                <div class="col-9">
                                    <input class="form-control m-input" type="text" name="nama" placeholder="Nama barang"  required>
                                </div>
                                </div>
                                <div class="form-group ">
                                <label for="example-text-input" class="col-5 ">Deskripsi Barang*</label>
                                <div class="col-9">
                                <textarea class="form-control m-input" name="des" required></textarea>
                                </div>
                                </div>
                                <div class="form-group ">
                                <label for="example-text-input" class="col-2 ">Harga*</label>
                                <div class="col-9">
                                    <input class="form-control m-input" type="text" name="hrg" placeholder="Rp." required>
                                </div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="example-text-input" class="col-5 ">Kategori*</label>
                                    <div class="col-9">
                                    <select type="text" name="kat" class="form-control" >
                                        <option value="">-Pilih-</option>
                                        <?php 
                                        foreach ($kat->result_array() as $k) {
                                        $k_id=$k['kategori_id'];
                                        $k_nama=$k['kategori_nama'];
                                        
                                    ?>
                                    <option value="<?php echo $k_id;?>"><?php echo $k_nama;?></option>
                                    <?php } ?>	
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                <label for="example-text-input" class="col-5 ">Foto (Max. 4 foto)</label>
                                <div class="col-9">
                                    <input class="form-control m-input" type="file"  name="userfile[]" multiple="multiple" >
                                </div>
                                </div>
                                
                            </div>
                            </div>
                                    
                        </div>
                            <div class="card-footer text-right">
                                <a href="<?=base_url('Barang');?>" class="btn btn-default">Cancel</a>
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>
                        
                    
                    </div>
                </form>
                </div>
    <!-- end:: List Request -->
          </div>