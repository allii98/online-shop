<section class="section">
    <div class="section-header">
      <h1>Barang</h1>
    </div>
    <?php echo $this->session->flashdata('pesan'); ?>
    
</section>

<div class="section-body">
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Barang</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                        <a href="<?=base_url('Barang/tambah')?>" class="btn btn-success" >Tambah</a>
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
                                    <th style="text-align:center">Foto</th>
                                    <th style="text-align:center">Nama Barang</th>
                                    <th style="text-align:center">Deskripsi</th>
                                    <th style="text-align:center">Harga</th>
                                    <th style="text-align:center">Harga Baru</th>
                                   
                                    <th style="text-align:center">Kategori</th>
                                    <th style="text-align:center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;
                            if(isset($brg) ){
                            foreach ($brg as $data) { 
                              
                                ?>
                                <tr>
                                    <td style="text-align:center"><?=$no++?></td>
                                    <td style="text-align:center"><?php if ($data->produk_foto1 != null) { ?>
                                        <img src="<?php echo base_url('assets/uploads/barang/'.$data->produk_foto1)?>" width="60px">
                                      <?php } ?>
                                    </td>
                                    <td style="text-align:center"><?=$data->produk_nama?></td>
                                    <td style="text-align:center"><?=$data->produk_desk?></td>
                                    <td style="text-align:center"><?=$data->produk_hargalama?></td>	
                                    <td style="text-align:center"><?=$data->produk_hargabaru?></td>										
                                    <td style="text-align:center"><?=$data->kategori_nama?></td>
                                    <td style="text-align:center">
                                    <form action="<?=base_url()?>Barang/hapus/<?=$data->produk_id?>/<?=$data->produk_foto1?>" method="post">
                                      <button type="button" class="btn btn-primary " title="Edit" >
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

