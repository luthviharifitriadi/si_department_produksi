        <div class="col-12 col-xl-9">
            
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <img src="<?= base_url()?>template/assets/img/global/burger.svg" class="mb-2" alt="">
                        </button>
                         <h2 class="nav-title">Daftar Transaksi</h2>
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
                    <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-primary">Tambah Transaksi</a>
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-warning">
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Tanggal</th>
                                <th>Nama Customer</th>
                                <th>Jumlah Barang</th>
                                <th>Sub Total</th>
                                <th>Diskon</th>
                                <th>Ongkir</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $grand_total= 0; $no=1; foreach($data_transaksi as $key => $value) :
                                $grand_total +=  $value->total_bayar;    
                            ?> 
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->kode ?></td>
                                <td><?= $value->tgl ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->jumlah ?> </td>
                                <td><?= number_format($value->subtotal, 2, ",", ".") ?></td>
                                <td><?= number_format($value->diskon, 2, ",", "." )?></td>
                                <td><?= number_format($value->ongkir, 2, ",", "." )?></td>
                                <td><?=  number_format($value->total_bayar, 2, ",", "." )?></td>
                                <td><a href="<?= base_url('transaksi/detail/'.$value->id.'/'. $value->kode) ?>" class="btn btn-warning btn-sm">Detail</a></td>
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                        <tfoot>
                            <tr class="table-light">
                                <th colspan="8">Grand Total</th>
                                <th ><?=  number_format($grand_total, 2, ",", "." )?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




 