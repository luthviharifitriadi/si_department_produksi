        <div class="col-12 col-xl-9">
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <img src="<?= base_url()?>template/assets/img/global/burger.svg" class="mb-2" alt="">
                        </button>
                         <h3 class="nav-title">Daftar Customer</h3>
                    </div>
                    
                </div>

                <div class="d-flex justify-content-between align-items-center nav-input-container">
                    <div class="nav-input-group">
                        <input type="text" class="nav-input" placeholder="Cari">
                        <button class="btn-nav-input"><img src="<?= base_url()?>template/assets/img/global/search.svg" alt=""></button>
                    </div>
                </div>
            </div>

            <div class="content">
                  <div class="statistics-card ">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Customer
                    </button>
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-warning">
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $no=1; foreach($data as $key => $value) :?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->kode ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->telp ?></td>
                                <td>
                                    
                                   <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal<?= $value->id ?>">
                                        Edit
                                    </button>
                                    <a href="<?= base_url('customer/hapus/'.$value->kode )?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                               
                            </tr>  
                              <?php endforeach; ?>    
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php    
                    echo form_open_multipart('customer/tambah');
                ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Telp:</label>
                            <input type="text" name="telp" class="form-control" id="recipient-name">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- end modal tambah -->

    <!-- modal untuk edit -->
    <?php $no=1; foreach($data as $key => $value) :?>
        <div class="modal fade" id="editmodal<?= $value->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Customer : <?= $value->kode ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php    
                        echo form_open_multipart('customer/edit/'.$value->kode);
                    ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama:</label>
                                <input type="text" name="nama" class="form-control" value="<?= $value->nama ?>" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Telp:</label>
                                <input type="text" name="telp" class="form-control" value="<?= $value->telp ?>" id="recipient-name">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
     <?php endforeach; ?>   
    <!--  Akhir modal untuk edit -->
    

    




 