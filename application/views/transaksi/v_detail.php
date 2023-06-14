        <div class="col-12 col-xl-9">
            
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <img src="<?= base_url()?>template/assets/img/global/burger.svg" class="mb-2" alt="">
                        </button>
                         <h2 class="nav-title">Detail Transaksi <?= $kode ?></h2>
                    </div>
                </div>

              
            </div>

            <div class="content">
                <div class="statistics-card ">

                    <hr>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-warning">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga Bandrol</th>
                                <th>QTY</th>
                                <th>Diskon(%)</th>
                                <th>Diskon(RP)</th>
                                <th>Harga Diskon</th>
                                <th>Total</th>
                               
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $no=1; foreach($detail_transaksi as $key => $value) :?> 
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->harga_bandrol ?></td>
                                <td><?= $value->qty?></td>
                                <td><?= $value->diskon_pct?></td>
                                <td><?= $value->diskon_nilai?></td>
                                <td><?= $value->harga_diskon?></td>
                                <td><?= $value->total ?></td>
                               
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                      
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




 