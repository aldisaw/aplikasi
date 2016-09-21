
    <div id="konten_kanan">
        <div id="konten_kanan_isi">
            <div id="list">
                <div class="isi_divda">
                    <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                        <tr class="tinggi">
                            <td width="20%">
                                <font size="3" color=green>File Program Customer Birthday</font>
                            <td width="5%"><img src="images/2rcahwx.png" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par">
                                        <option value="nama_treatment">Nama Treatment</option>
                                        <option value="harga">Harga Treatment</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-model="searchText" ng-enter="cari_data('data/program-customer-birtday/home/data.html');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Search</span>
                                </div>
                            <td width="10%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form', 'data/program-customer-birtday/','1')" >Buat Baru</button>
                        <tr>
                            <td><br>
                        <tr>
                            <td colspan="6">
                                @include('file_master_data.file_program_customer_birtday.data')
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

    <!--form Data Treatment-->
    <div class="modal fade" id="form-treatment" tabindex="-1" style="font-family: arial; font-size:0.7em;" role="dialog" aria-labelledby="myModalLabel">
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
                                    @include('file_master_data.file_program_customer_birtday.data_treatment')
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

    <!--form input -->
    <div class="modal fade" id="form" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:70%;">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/program-customer-birtday/simpan/simpan', halaman, 'mlt', 'num', 'pg', 'data/program-customer-birtday/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Program Customer Birthday</h4>
                                <td><img src="images/2rcahwx.png" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Nama Treatment : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.nama_treatment" type="text" readonly="true" placeholder="isi nama Treatment,..." name="nama_treatment" style="cursor:pointer;" class="form-control" required ng-click="toggle('form_input', halaman2, 'form-treatment', 'data/treatment/home/data.html','2', '', '', '', '1500', '7')" />
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
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="edit('simpan/program-customer-birtday/form.id/update',halaman);">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Edit Data Program Happy Hours</h4>
                                <td><img src="images/2rcahwx.png" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Nama Treatment : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.nama_treatment" type="text" readonly="true" placeholder="isi nama Treatment,..." name="nama_treatment" style="cursor:pointer;" class="form-control" required ng-click="toggle('form_input', halaman2, 'form-treatment', 'data/treatment/home/data.html','2', '', '', '', '1500', '7')" />
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

                            <button type="submit" class="btn btn-primary" style="float:right;">Submit</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right;">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

