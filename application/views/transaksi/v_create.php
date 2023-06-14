        <div class="col-12 col-xl-9">

            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <img src="<?= base_url()?>template/assets/img/global/burger.svg" class="mb-2" alt="">
                        </button>   
                    </div>
                </div>              
            </div>

            <div class="nav content">
                
                <div class="statistics-card ">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <?php
                                $attributes = array('name' => 'form_save');
                                echo form_open_multipart('transaksi/add_data', $attributes);
                            ?>
                            <div class="alert alert-success">
                                <b>Transaksi</b>
                            </div>

                           <div class="col-12 col-md-6 col-lg-6 mb-3">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" value="<?= $no_nota ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tgl" name="tgl" value="<?=  date('Y-m-d') ?>" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-success">
                                <b>Customer</b>
                            </div>

                             <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Kode</label>
                                    <div class="col-sm-10">
                                        <div class="input-group ">
                                             <input type="hidden" class="form-control" name="cust_id" id="item_id">
                                            <input type="text" class="form-control" id="item_kode" readonly >
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#customerModal"><img src="<?= base_url()?>template/assets/img/global/search.svg" alt=""></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-labe fw-bold">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="item_nama" readonly>
                                    </div>
                                </div>

                                <div class="form-group row  mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold">Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  id="item_telp" readonly>
                                    </div>
                                </div>
                            </div> 
                        </div>   
                    </div>
        
                    <hr>

                    <div class="table-responsive" >
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-warning">
                                <th  rowspan="2"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produkModal">Tambah</button></th>
                                <th  rowspan="2">No</th>
                                <th  rowspan="2">Kode Barang</th>
                                <th  rowspan="2">Nama Barang</th>
                                <th  rowspan="2">Qty</th>
                                <th  rowspan="2">Harga Bandrol</th>
                                <th  colspan="2">Diskon</th>
                                <th  rowspan="2">Harga Diskon</th>
                                <th  rowspan="2">Total</th>
                            </tr>
                            <tr class="table-warning">
                                <th>(%)</th>
                                <th>(Rp)</th>
                            </tr>
                        </thead>
                        <tbody id="detail_cart">
                          
                        </tbody>
                    </table>
                </div>
                <hr>

                  <div class="row">    

                    <div class="col-12 col-md-6 col-lg-6 mb-3">       
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                    
                        <div class="row justify-content-end">
                            <div class="col-3">
                                <b>Subtotal</b>
                            </div>
                            <div class="col-4">
                                <textarea name="subtotal" id="subtotal"  class="form-control"  rows="1" onkeyup="EvenTotal()"  readonly  ></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-3">
                                <b>Diskon</b>
                            </div>
                            <div class="col-4">
                                 <input type="text" name="diskon" id="diskon" class="form-control" value= 0  onkeyup="EvenTotal()">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-3">
                                <b>Ongkir</b>
                            </div>
                            <div class="col-4">
                                 <input type="text" name="ongkir" id="ongkir" class="form-control" value= 0 onkeyup="EvenTotal()">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-3">
                                <b>Total Bayar</b>
                            </div>
                            <div class="col-4">
                                 <textarea name="total_bayar" id="total_bayar"  class="form-control"  rows="1" readonly></textarea>
                            </div>
                        </div>`
                    
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit"  class="btn btn-primary" onclick="EvenTotal()">Simpan</button>
                    <a href="<?= base_url('transaksi' )?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
                <?php echo form_close(); ?>         
            </div>
            </div>
        </div>
    </div>

    <!--modal customer -->
    <!-- Button trigger modal -->

    <!-- Modal customer -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Customer</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table-responsive">
        
                <table id="example" class="table table-striped table-bordered"  style="width:100%">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="detail_cart">
                    <?php $no=1; foreach($data_customer as $key => $value) :?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->kode ?></td>
                        <td><?= $value->nama ?></td>
                        <td><?= $value->telp ?></td>
                        <td>
                            <button id="select" class="btn btn-primary btn-sm"
                                data-id   = "<?= $value->id ?>"
                                data-kode = "<?= $value->kode ?>"
                                data-nama = "<?= $value->nama ?>"
                                data-telp = "<?= $value->telp ?>"
                            >
                                Select
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>    
                </tbody>
            </table>
        </div>
        
        </div>
    </div>
    </div>

    <!-- modal tambah produk -->
    <div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Produk</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        
            <div class="col-12 mb-3">
                <form action="" name="form" id="form">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-labe fw-bold">Cari</label>
                    <div class="col-sm-10">  
                        <select id="mySelect2" style=" width:100%;">
                            <option selected value="" disabled selected>Pilih Produk</option>
                            <?php $no=1; foreach($data_barang as $key => $value) :?>
                                <option value="<?= $value->id ?>|<?= $value->kode ?>|<?= $value->nama ?>|<?= $value->harga ?>"><?= $value->kode ?>  <?= $value->nama ?>  <?= $value->harga ?></option>
                            <?php endforeach; ?>  
                        </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Kode</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="barang_id" id="barang_id" readonly>
                            <input type="text" class="form-control" name="kode_produk" id="kode_produk" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label fw-bold">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label fw-bold">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga_produk" id="harga_produk" readonly>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label fw-bold">Qty</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="qty_Produk" id="qty_produk"  onkeyup="EvenTotal()">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label fw-bold">Diskon (%)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="diskon_produk" id="diskon_produk" onkeyup="EvenTotal()">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label fw-bold">Diskon (Rp)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="diskonrp" id="diskonrp" readonly>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label fw-bold">Harga Diskon</label>
                        <div class="col-sm-10">
                            <input type="text" name="harga_diskon" id="harga_diskon" class="form-control"  readonly>             
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label fw-bold">Total</label>
                        <div class="col-sm-10">
                            <input type="text" name="total" class="form-control" id="total" readonly>             
                        </div>
                    </div>
                </div>
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="add_cart btn btn-primary" onclick=" EvenTotal() ">Simpan</button>
                    </div>
                
                </div>
            </div>
        </div>            
    </div>
</div>

<script>
    //custumor
    $(document).ready(function(){
        $(document).on('click', '#select', function() {
            var item_id   = $(this).data('id');
            var item_kode = $(this).data('kode');
            var item_nama = $(this).data('nama');
            var item_telp = $(this).data('telp');

            $('#item_id').val(item_id);
            $('#item_kode').val(item_kode);
            $('#item_nama').val(item_nama);
            $('#item_telp').val(item_telp);
            $('#customerModal').modal('hide');
        })
    });

    //datables
    $(document).ready(function () {
        $('#example').DataTable();

        //simpan produk
        $('.add_cart').click(function(){
            var barang_id       = $('#barang_id').val();
            var kode_produk     = $('#kode_produk').val();
			var nama_produk     = $('#nama_produk').val();
            var harga_produk    = $('#harga_produk').val();
            var qty_produk      = $('#qty_produk').val();
            var diskon_produk   = $('#diskon_produk').val();
            var diskonrp        = $('#diskonrp').val();
            var harga_diskon    = $('#harga_diskon').val();
            var total           = $('#total').val();

			$.ajax({
				url : "<?php echo site_url('transaksi/add_produk');?>",
				method : "POST",
				data : {barang_id: barang_id,   kode_produk : kode_produk,  nama: nama_produk, harga_bandrol: harga_produk, qty: qty_produk, diskon_pct: diskon_produk, diskon_nilai: diskonrp, harga_diskon, total : total},
				success: function(data){
				    $('#detail_cart').html(data);
                    $('#subtotal').load("<?php echo site_url('transaksi/load_subtotal');?>");
                    $('#total_bayar').load("<?php echo site_url('transaksi/load_subtotal');?> ");
                        setTimeout(function() {
                        EvenTotal();
                    }, 500);
				}
			});
            EvenTotal();
            document.getElementById("form").reset();
            $('#produkModal').modal('hide');
		});

            $('#detail_cart').load("<?php echo site_url('transaksi/load_cart');?>").val();
            $('#subtotal').load("<?php echo site_url('transaksi/load_subtotal');?> ");
            setTimeout(function() {
                EvenTotal();
            }, 500);
         
        //Get
        $(document).on('click','.romove_cart',function(){
			var row_id=$(this).attr("id"); 
			$.ajax({
				url     :   "<?php echo site_url('transaksi/delete_cart');?>",
				method  :   "POST",
				data    :   {row_id : row_id},
				success :   function(data){
					$('#detail_cart').html(data);
                    $('#subtotal').load("<?php echo site_url('transaksi/load_subtotal');?>");  
                    setTimeout(function() {
                        EvenTotal();
                    }, 500); 
                               
				}
			});
		});     
    });

    function EvenTotal() {
        var qty = document.form.qty_produk.value;
        var harga = document.form.harga_produk.value;
        var diskon_produk = document.form.diskon_produk.value;

            diskon =  harga * diskon_produk /100 ;
            hargadiskon = harga - diskon;

        document.form.diskonrp.value = diskon
        document.form.harga_diskon.value = hargadiskon;
        document.form.total.value = hargadiskon * qty; 
        
        
        //form grand
        var subtotal =  parseInt(document.form_save.subtotal.value);
        var diskon_grand =  parseInt(document.form_save.diskon.value);
        var ongkir = parseInt(document.form_save.ongkir.value);

        diskon_total = subtotal - diskon_grand;
        ongkir = diskon_total + ongkir;
       
        document.form_save.total_bayar.value = ongkir;
    }


    //select2
    $('#mySelect2').select2({
        dropdownParent: $('#produkModal')
    });

    $('#mySelect2').change(function(){
         var data_konsumen = $('#mySelect2').val();
         var myArray = data_konsumen.split("|");

         document.form.barang_id.value= myArray[0];
         document.form.kode_produk.value= myArray[1];
         document.form.nama_produk.value= myArray[2];
         document.form.harga_produk.value= myArray[3];
    });

    //readonly

</script>


<!-- akhir modal customer-->




 