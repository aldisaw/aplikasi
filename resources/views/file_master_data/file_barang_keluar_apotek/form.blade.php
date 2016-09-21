
    <div id="konten_kanan">
        <div id="konten_kanan_isi">
            <div id="list">
                <div class="isi_divda">
                    <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                        <tr class="tinggi">
                            <td width="20%">
                                <font size="3" color=green>File Barang Keluar Apotek</font>
                            <td width="5%"><img src="images/inventory.png" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par">
                                        <option value="nama_produk">Nama Produk</option>
                                        <option value="kategori_produk">Kategori Produk</option>
                                        
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-model="searchText" ng-enter="cari_data('data/barang-keluar-apotek/home/data.html');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Search</span>
                                </div>
                            <td width="10%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form', 'data/barang-keluar-apotek/','1')" >Buat Baru</button>
                        <tr>
                            <td><br>
                        <tr>
                            <td colspan="6">
                                @include('file_master_data.file_barang_keluar_apotek.data')
                        </tr>
                    </table>
                </div>
            </div>


        </div>
    </div>

    <!--form Data Produk-->
    <div class="modal fade" id="form-produk" tabindex="-1" style="font-family: arial; font-size:0.7em;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:90%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <table border="0" width="100%">
                        <tr>
                            <td width="20%">
                                    <font size="3" color=green>File Produk</font>
                            <td width="5%"><img src="images/produk.png" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par1">
                                        <option value="nama_produk">Nama Produk</option>
                                        <option value="kategori_produk">Kategori Produk</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-model="searchText1" ng-enter="cari_data('data/produk-stok/home/data.html', '', '2', '', '7');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Search</span>
                                </div>
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="container" style="width:100%;">
                        <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                            <tr>
                                <td colspan="6">
                                    @include('file_master_data.file_produk_stok.data_stok')
                            </tr>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--form input -->
    <div class="modal fade" id="form" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/barang-keluar-apotek/simpan/simpan', halaman, 'mlt', 'num', 'pg', 'data/barang-keluar-apotek/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel"><font color="green"> Data Produk Keluar </font> | <font color="#e2750a"> @{{tgl | date:"dd/MM/yyyy"}} </font> | <font color="#9c1516">{{ Auth::user()->name }}</font></h4>
                                <td><img src="images/inventory.png" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div id="error"></div>
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>No Transaksi : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.no_transaksi" readonly="true" type="text" placeholder="No Transaksi" name="no_transaksi" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Produk : </strong>
                                        <input ng-model="form.nama_produk" readonly="true" type="text" placeholder="Name Produk, clik untuk mencari produk" style="cursor:pointer;" name="nama_produk" class="form-control" ng-click="toggle('form_input', halaman2, 'form-produk', 'data/produk-stok/home/data.html','2', '', '', '', '1500', '7')" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Tanggal Keluar : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.tanggal_keluar"  type="text" datetime-picker date-format="yyyy-MM-dd" name="tanggal_keluar" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <strong>Jumlah : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.jumlah"  type="text" placeholder="Jumlah Produk" name="jumlah" onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12">
                                    <strong>Keterangan : </strong>
                                    <div class="form-group">
                                        <textarea ng-model="form.keterangan" name="keterangan" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" style="float:right;">Submit</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right;">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--form Edit input -->
    <div class="modal fade" id="form-edit" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="edit('simpan/barang-keluar-apotek/edit/update',halaman);">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel"><font color="green">Edit Produk Masuk </font> | <font color="#e2750a"> @{{tgl | date:"dd/MM/yyyy"}} </font> | <font color="#9c1516">{{ Auth::user()->name }}</font></h4>
                                <td><img src="images/inventory.png" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div id="error"></div>
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>No Transaksi : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.no_transaksi" readonly="true" type="text" placeholder="No Transaksi" name="no_transaksi" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Produk : </strong>
                                        <input ng-model="form.nama_produk" readonly="true" type="text" placeholder="Name Produk, clik untuk mencari produk" style="cursor:pointer;" name="nama_produk" class="form-control" ng-click="toggle('form_input', halaman2, 'form-produk', 'data/produk-stok/home/data.html','2', '', '', '', '1500', '7')" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Tanggal Keluar : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.tanggal_keluar"  type="text" datetime-picker date-format="yyyy-MM-dd" name="tanggal_keluar" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <strong>Jumlah : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.jumlah"  type="text" placeholder="Jumlah Produk" name="jumlah" onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12">
                                    <strong>Keterangan : </strong>
                                    <div class="form-group">
                                        <textarea ng-model="form.keterangan" name="keterangan" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                          
                            <button type="submit" class="btn btn-primary" style="float:right;">Submit</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right;">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>