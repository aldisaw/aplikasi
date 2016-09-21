    <div id="konten_kanan">
        <div id="konten_kanan_isi">

            <div id="list" >
                <div class="isi_divda" on-page-change="">
                    <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                        <tr class="tinggi">
                            <td width="15%">
                                <font size="3" color=green>File Paket Treatment</font>
                            <td width="5%"><img src="images/paket.jpg" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par">
                                        <option value="nama_paket">Nama Paket</option>
                                        <option value="keterangan">Kategori Paket</option>
                                        <option value="jenis_paket">Jenis Paket</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right" width="20%">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Cari Paket" ng-model="searchText" ng-enter="cari_data('data/sub-paket-treatment/home/data.html');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Cari</span>
                                </div>
                            <td width="13%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form-paket-produk', 'data/paket-treatment/','1')" >Buat Paket Treatment Baru</button>
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
                                    <font size="3" color=green>@{{$index+1}} . @{{detail[$index].nama_paket}}</font>
                                <td width="5%"><img src="images/paket.jpg" width="30" height="30" />
                                <td width="10%">
                                <td width="5%" align="center"><img src="images/paketbilder.jpg" width="30" height="30" />
                                <td align="center" width="15%"> <font size="3" color=green>Total Produk : @{{isi.detail.total}}</font>
                                <td width="10%" align="right">
                                    <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', $index, 'form', 'data/sub-paket-treatment/','3', isi.nama_paket, isi.kode_paket)" >Buat Baru</button>
                            <tr>
                                <td colspan="6">
                                  <BR>
                                  <div id="@{{$index}}">
                                    @include('file_master_data.file_sub_paket_treatment.data')
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
                                      ng-click="pageChanged_multi(currentPage, 'data/sub-paket-treatment/', 'multi', $index, detail[$index].kode_paket)">
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

    <!--form Data Treatment-->
    <div class="modal fade" id="form-produk" tabindex="-1" style="font-family: arial; font-size:0.7em;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:90%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <table border="0" width="100%">
                        <tr>
                            <td width="20%">
                                    <font size="3" color=green>File Treatment</font>
                            <td width="5%"><img src="images/treatment.png" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par1">
                                        <option value="nama_treatment">Nama Treatment</option>
                                        <option value="kategori">Kategori Treatment</option>
                                        <option value="kategori_treatment">Jenis Treatment</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-model="searchText1" ng-enter="cari_data('data/treatment/home/data.html', '', '2', '', '7');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Search</span>
                                </div>
                            <td width="10%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form-produk-input', 'data/treatment/','2', '', '', '', '1501', '')" >Buat Baru</button>
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="container" style="width:100%;">
                        <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                            <tr>
                                <td colspan="6">
                                    @include('file_master_data.file_sub_paket_treatment.data_treatment')
                            </tr>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--form input Treatment-->
    <div class="modal fade" id="form-produk-input" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/treatment/simpan/simpan',halaman2, '2', '7', 'form-produk-input', 'data/treatment/home/data.html');">
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
                                        <input ng-model="frm.kode_treatment" readonly="true" type="text" placeholder="Kode Treatment" name="kode_treatment" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Treatment : </strong>
                                        <input ng-model="frm.nama_treatment" type="text" placeholder="Name Treatment" name="nama_treatment" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kategori Treatmant : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="frm.kategori" name="kategori">
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
                                        <select class="form-control input-sm " ng-model="frm.kategori_treatment" name="kategori_treatment">
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

                            <div class="row">
                                <div class="col-xs-12">
                                    <strong>Keterangan : </strong>
                                    <div class="form-group">
                                        <textarea ng-model="frm.keterangan" name="keterangan" type="text" class="form-control"></textarea>
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

    <!--form input Paket-->
    <div class="modal fade" id="form-paket-produk" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/paket-treatment/simpan/simpan', halaman, '1', '', '', 'data/sub-paket-treatment/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Paket</h4>
                                <td><img src="images/paket.jpg" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div id="error"></div>
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kode Paket : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.kode_paket" readonly="true" type="text" placeholder="Kode Paket" name="kode_paket" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Paket : </strong>
                                        <input ng-model="form.nama_paket" type="text" placeholder="Name Paket" name="nama_paket" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kategori Paket : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.keterangan" name="keterangan">
                                            <option value="Body">Body</option>
                                            <option value="Face">Face</option>
                                            <option value="Hair">Hair</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Jenis Paket : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.jenis_paket" name="jenis_paket">
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
                                        <input ng-model="form.harga_paket" type="text" placeholder="Harga Paket" name="harga_paket" id="harga" onkeypress="return isNumberKey(event)" style="text-align:right" onblur=formatrupiah(this.value,'Rp.','harga','v'); class="form-control" required />
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
                          
                            <button type="submit" class="btn btn-primary" style="float:right;">Submit</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right;">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--form input sub paket treatment-->
    <div class="modal fade" id="form" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/sub-paket-treatment/simpan/simpan', index, '1', '', '', 'data/sub-paket-treatment/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Treatment Paket - <font color="green">@{{nama_dt}} </font> </h4>
                                <td><img src="images/paketbilder.jpg" width="50" height="50" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kode Detail Paket : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.kode_detail_paket" readonly="true" type="text" placeholder="Kode Detail Paket" name="kode_detail_paket" class="form-control" required />
                                        <input type="hidden" ng-model="form.kode_paket" >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Treatment : </strong>
                                        <input ng-model="form.nama_treatment" name="nama_treatment" type="text" style="cursor:pointer;" placeholder="Name Treatment, Click untuk mencari Treatment" name="nama_treatment" readonly="true" class="form-control" ng-click="toggle('form_input', halaman2, 'form-produk', 'data/treatment/home/data.html','2', '', '', '', '1500', '7')" required />
                                        <input type="hidden" ng-model="form.kode_treatment" name="kode_treatment">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Jumlah : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.jumlah" type="text" placeholder="Input Jumlah Produk" name="jumlah" class="form-control" required onkeypress="return isNumberKey(event)" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
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
