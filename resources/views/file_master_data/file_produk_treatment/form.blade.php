    <div id="konten_kanan">
        <div id="konten_kanan_isi">

            <div id="list" >
                <div class="isi_divda" on-page-change="">
                    <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                        <tr class="tinggi">
                            <td width="15%">
                                <font size="3" color=green>File Treatment</font>
                            <td width="5%"><img src="images/treatment.png" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par">
                                        <option value="nama_treatment">Nama Treatment</option>
                                        <option value="kategori">Kategori Treatment</option>
                                        <option value="kategori_treatment">Jenis Treatment</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right" width="20%">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Cari Treatment" ng-model="searchText" ng-enter="cari_data('data/produk-treatment/home/data.html');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Cari</span>
                                </div>
                            <td width="13%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form-treatment', 'data/treatment/','1')" >Buat Treatment Baru</button>
                        <tr>
                            <td colspan="6">
                              <div id="detil">

                                <br>
                                <p align="center">@{{pesan_kosong}}</p>
                              </div>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="formasasfg">
                <div id="list" ng-repeat="isi in data">
                    <div class="isi_divda" on-page-change="">
                        <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                            <tr class="tinggi">
                                <td width="30%">
                                    <font size="3" color=green>@{{$index+1}} . @{{detail[$index].nama_treatment}}</font>
                                <td width="5%"><img src="images/treatment.png" width="30" height="30" />
                                <td width="10%">
                                <td width="5%" align="center"><img src="images/Entourage_Mac.ico" width="30" height="30" />
                                <td align="center" width="15%"> <font size="3" color=green>Total Produk : @{{isi.detail.total}}</font>
                                <td width="10%" align="right">
                                    <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', $index, 'form', 'data/produk-treatment/','3', isi.nama_treatment, isi.kode_treatment)" >Buat Baru</button>
                            <tr>
                                <td colspan="6">
                                  <BR>
                                  <div id="@{{$index}}">
                                    @include('file_master_data.file_produk_treatment.data')
                                  </div>

                                  <paging
                                      class="pagination pull-right small"
                                      page="currentPage" 
                                      page-size="5" 
                                      total="detail[$index].detail.total"
                                      hide-if-empty="hideIfEmpty"
                                      ul-class="ulClass"
                                      active-class="activeClass"
                                      disabled-class="disabledClass"
                                      show-prev-next="showPrevNext"
                                      show-first-last="showFirstLast"
                                      ng-click="pageChanged_multi(currentPage, 'data/produk-treatment/', 'multi', $index, detail[$index].kode_treatment)">
                                  </paging>  

                                  <p align="center">@{{pesan_kosong_multi[$index]}}</p>
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
                                    @include('file_master_data.file_produk_treatment.data_produk')
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

    <!--form input Treatment-->
    <div class="modal fade" id="form-treatment" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/treatment/simpan/simpan', halaman, '1', '', '', 'data/produk-treatment/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Treatment</h4>
                                <td><img src="images/treatment.png" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div id="error"></div>
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kode Treatment : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.kode_treatment" readonly="true" type="text" placeholder="Kode Treatment" name="kode_treatment" class="form-control" required />
                                        
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Treatment : </strong>
                                        <input ng-model="form.nama_treatment" type="text" placeholder="Name Treatment" name="nama_treatment" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kategori Treatmant : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.kategori" name="kategori">
                                            <option value="Body">Body</option>
                                            <option value="Face">Face</option>
                                            <option value="Hair">Hair</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Jenis Treatment : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.kategori_treatment" name="kategori_treatment">
                                            <option value="Injeksi">Injeksi</option>
                                            <option value="Non Injeksi">Non Injeksi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Harga : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.harga" type="text" placeholder="Harga Treatment" name="Harga" id="harga" onkeypress="return isNumberKey(event)" style="text-align:right" onblur=formatrupiah(this.value,'Rp.','harga','v'); class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Disc Member Umum : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_umum" type="text" placeholder="Diskon Member Umum" name="dis_umum" onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
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

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>Disc Member Student : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_student" name="dis_student" type="text" placeholder="Diskon Member Student"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class=" ">
                                    <strong>Disc Member VIP : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_vip" name="dis_vip" type="text" placeholder="Diskon Member VIP"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class=" col-xs-6">
                                    <strong>Disc Member Karyawan : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.dis_karyawan" name="dis_karyawan" type="text" placeholder="Diskon Karyawan"  onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control" required />
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

    <!--form input sub Produk Treatment-->
    <div class="modal fade" id="form" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/produk-treatment/simpan/simpan', index, '1', '', '', 'data/produk-treatment/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Produk Treatment - <font color="green">@{{nama_dt}} </font> </h4>
                                <td><img src="images/Entourage_Mac.ico" width="50" height="50" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kode Produk Treatment : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.kode_produk_treatment" readonly="true" type="text" placeholder="Kode Produk Treatment" name="kode_produk_treatment" class="form-control" required />
                                        <input type="hidden" ng-model="form.kode_treatment" >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Produk : </strong>
                                        <input ng-model="form.nama_produk" name="nama_produk" type="text" style="cursor:pointer;" placeholder="Name Produk, Click untuk mencari produk" name="nama_produk" readonly="true" class="form-control" ng-click="toggle('form_input', halaman2, 'form-produk', 'data/produk/home/data.html','2', '', '', '', '1500', '7')" required />
                                        <input type="hidden" ng-model="form.kode_produk" name="kode_produk">
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
