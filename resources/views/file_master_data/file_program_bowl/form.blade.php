
    <div id="konten_kanan">
        <div id="konten_kanan_isi">
            <div id="list">
                <div class="isi_divda">
                    <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                        <tr class="tinggi">
                            <td width="20%">
                                <font size="3" color=green>File Produk Bowl</font>
                            <td width="5%"><img src="images/Generic_black.ico" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par">
                                        <option value="nama_produk">Nama Produk</option>
                                        <option value="harga">Harga Produk</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-model="searchText" ng-enter="cari_data('data/program-bowl/home/data.html');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Search</span>
                                </div>
                            <td width="10%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form', 'data/program-bowl/','1')" >Buat Baru</button>
                        <tr>
                            <td><br>
                        <tr>
                            <td colspan="6">
                                @include('file_master_data.file_program_bowl.data')
                        </tr>
                    </table>
                </div>
            </div>


            <div id="log">
                <div class="isi_divda">
                   
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
                                        <option value="satuan">Satuan</option>
                                        <option value="kategori_produk">Jenis Produk</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-model="searchText1" ng-enter="cari_data('data/produk/home/data.html', '', '2', '', '7');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Search</span>
                                </div>
                            <td width="10%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form-produk-input', 'data/produk/','2', '', '', '', '1501', '')" >Buat Baru</button>
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="container" style="width:100%;">
                        <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                            <tr>
                                <td colspan="6">
                                    @include('file_master_data.file_program_bowl.data_produk')
                            </tr>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--form input Produk-->
    <div class="modal fade" id="form-produk-input" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:90%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/produk/simpan/simpan',halaman2, '2', '7', 'form-produk-input', 'data/produk/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Produk</h4>
                                <td><img src="images/produk.png" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kode Produk : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.kode_produk" readonly="true" type="text" placeholder="Kode Produk" name="kode_produk" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Produk : </strong>
                                        <input ng-model="frm.nama_produk" type="text" placeholder="Name Produk" name="nama_produk" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Satuan Produk : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="frm.satuan" name="satuan">
                                            <option value="BOTOL">BOTOL</option>
                                            <option value="PCS">PCS</option>
                                            <option value="POT">POT</option>
                                            <option value="BUNGKUS">BUNGKUS</option>
                                            <option value="TUBE">TUBE</option>
                                            <option value="SET">SET</option>
                                            <option value="GRAM">GRAM</option>
                                            <option value="AMPUL">AMPUL</option>
                                            <option value="UNIT">UNIT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Jenis Produk : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="frm.jenis_promo" name="kategori_treatment">
                                            <option value="PRODUK PROMO">PRODUK PROMO</option>
                                            <option value="PRODUK NON PROMO">PRODUK NON PROMO</option>
                                            <option value="DR FLORINE">DR FLORINE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kategori Produk : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="frm.kategori_produk" name="kategori_produk">
                                            <option value="PRODUK RACIKAN">PRODUK RACIKAN</option>
                                            <option value="PRODUK BRANDED">PRODUK BRANDED</option>
                                            <option value="PIL">PIL</option>
                                            <option value="ALKES">ALKES</option>
                                            <option value="PRODUK PACKINGAN">PRODUK PACKINGAN</option>
                                            <option value="INJEKSI/SERUM">INJEKSI/SERUM</option>
                                            <option value="PRODUK TREATMENT">PRODUK TREATMENT</option>
                                            <option value="WELCOME DRINK">WELCOME DRINK</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Item Set Produk : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="frm.item_produk" name="item_produk">
                                            <option value="PRODUK JUAL">PRODUK JUAL</option>
                                            <option value="PRODUK TREATEMENT">PRODUK TREATEMENT</option>
                                            <option value="PRODUK JUAL/TREATMENT">PRODUK JUAL/TREATMENT</option>
                                            <option value="PRODUK PACKINGAN">PRODUK PACKINGAN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Harga : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.harga" type="text" placeholder="Harga Treatment" name="Harga" id="harga" onkeypress="return isNumberKey(event)" style="text-align:right" onblur=formatrupiah(this.value,'Rp.','harga','v'); class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Disc Member Umum : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.dis_umum" type="text" placeholder="Diskon Member Umum" name="dis_umum" onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Disc Member Family : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.dis_family" name="dis_family" type="text" placeholder="Diskon Member Family"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>Disc Member Student : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.dis_student" name="dis_student" type="text" placeholder="Diskon Member Student"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class=" ">
                                    <strong>Disc Member VIP : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.dis_vip" name="dis_vip" type="text" placeholder="Diskon Member VIP"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class=" col-xs-6">
                                    <strong>Disc Member Karyawan : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.dis_karyawan" name="dis_karyawan" type="text" placeholder="Diskon Karyawan"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Pemakaian : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.pemakaian" type="text" placeholder="Pemakaian Produk Perawatan" name="pemakaian"  style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Kapasitas Produk : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.berat" name="berat" type="text" placeholder="Kapasitas Produk"  style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class=" ">
                                    <strong>Dalam Stok : </strong>
                                    <div class="form-group">
                                        <input ng-model="frm.dalam_stok" name="dalam_stok"  type="text" ng-change="datalink('produk', frm.dalam_stok);" placeholder="Dalam Stok"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div ng-show="myVar">
                                <div class="row ">
                                    <div class="col-xs-6 ">
                                        <strong>Expired : </strong>
                                        <div class="form-group">
                                            <input ng-model="frm.exd" name="exd" datetime-picker date-format="yyyy-MM-dd" class="form-control" />
                                        </div>
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

    <!--form input -->
    <div class="modal fade" id="form" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%;">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/program-bowl/simpan/simpan', halaman, 'mlt', 'num', 'pg', 'data/program-bowl/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Produk Bowl</h4>
                                <td><img src="images/Generic_black.ico" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Nama Produk : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.nama_produk" type="text" readonly="true" placeholder="isi nama produk,..." name="nama_produk" style="cursor:pointer;" class="form-control" required ng-click="toggle('form_input', halaman2, 'form-produk', 'data/produk/home/data.html','2', '', '', '', '1500', '7')" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Disc Member Umum : </strong>
                                        <div class="form-group">
                                            <input ng-model="form.dis_umum" type="text" placeholder="Diskon Member Umum" name="dis_umum" onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Disc Member Family : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_family" name="dis_family" type="text" placeholder="Diskon Member Family"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Disc Member Student : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_student" name="dis_student" type="text" placeholder="Diskon Member Student"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                   <strong>Disc Member VIP : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_vip" name="dis_vip" type="text" placeholder="Diskon Member VIP"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Jumlah Pencapaian : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.jumlah_pencapaian" name="jumlah_pencapaian" type="text" placeholder="Jumlah Pencapaian"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
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
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="edit('simpan/program-bowl/form.id/update',halaman);">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Edit Data Program Bowl</h4>
                                <td><img src="images/Generic_black.ico" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Nama Produk : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.nama_produk" type="text" readonly="true" placeholder="isi nama produk,..." name="nama_produk" style="cursor:pointer;" class="form-control" required ng-click="toggle('form_input', halaman2, 'form-produk', 'data/produk/home/data.html','2', '', '', '', '1500', '7')" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Disc Member Umum : </strong>
                                        <div class="form-group">
                                            <input ng-model="form.dis_umum" type="text" placeholder="Diskon Member Umum" name="dis_umum" onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Disc Member Family : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_family" name="dis_family" type="text" placeholder="Diskon Member Family"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Disc Member Student : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_student" name="dis_student" type="text" placeholder="Diskon Member Student"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                   <strong>Disc Member VIP : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_vip" name="dis_vip" type="text" placeholder="Diskon Member VIP"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Jumlah Pencapaian : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.jumlah_pencapaian" name="jumlah_pencapaian" type="text" placeholder="Jumlah Pencapaian"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
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

