        <div class="col-12 col-xl-9">
            
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <img src="<?= base_url()?>template/assets/img/global/burger.svg" class="mb-2" alt="">
                        </button>
                         <h2 class="nav-title">Daftar Barang</h2>
                    </div>
                   
                </div>

                <div class="d-flex justify-content-between align-items-center nav-input-container">
                    <div class="nav-input-group">
                        <input type="text"  id="myInput" class="nav-input" placeholder="Cari">
                        <button class="btn-nav-input"><img src="<?= base_url()?>template/assets/img/global/search.svg" alt=""></button>
                    </div>
                </div>
            </div>

            <div class="content">
                
                  <div class="statistics-card table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Barang
                    </button>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-warning">
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody  id="myTable">
                        <?php $no=1; foreach($data as $key => $value) :?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->kode ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?=  number_format($value->harga, 2, ",", "." )?></td>
                                     <td>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal<?= $value->id ?>">
                                        Edit
                                    </button>
                                    <a href="<?= base_url('barang/hapus/'.$value->kode )?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?> 
                        </tbody>
                         
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php    
                    echo form_open_multipart('barang/tambah');
                ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kode:</label>
                            <input type="text" name="kode" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Harga:</label>
                            <input type="text" name="harga" class="form-control" id="recipient-name">
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
    <!-- Akhir Modal Tambah -->

    <!-- Modal Edit -->
    <?php $no=1; foreach($data as $key => $value) :?>
    <div class="modal fade" id="editmodal<?= $value->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang : <?= $value->kode ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php    
                    echo form_open_multipart('barang/edit/'.$value->kode);
                ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama:</label>
                            <input type="text" name="nama" class="form-control" value="<?= $value->nama ?>" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Harga:</label>
                            <input type="text" name="harga" class="form-control" value="<?= $value->harga ?>" id="recipient-name">
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


    <script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

    <!-- Akhir modal edit -->

    




 