
    <div id="konten_kanan">
        <div id="konten_kanan_isi">
            <div id="list">
                <div class="isi_divda">
                    <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                        <tr class="tinggi">
                            <td width="20%">
                                <font size="3" color=green>File Member</font>
                            <td width="5%"><img src="images/non_member.jpg" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par">
                                        <option value="nama">Nama Member</option>
                                        <option value="agama">Agama</option>
                                        <option value="jenis_kelamin">Jenis Kelamin</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-model="searchText" ng-enter="cari_data('data/non-member/home/data.html');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Search</span>
                                </div>
                            <td width="10%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form', 'data/non-member/','1')" >Buat Baru</button>
                        <tr>
                            <td><br>
                        <tr>
                            <td colspan="6">
                                @include('file_master_data.file_non_member.data')
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

    <!--form input -->
    <div class="modal fade" id="form" tabindex="-1" style="font-family: arial;" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" style="width:90%;">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/non-member/simpan/simpan', halaman, 'mlt', 'num', 'pg', 'data/non-member/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Member</h4>
                                <td><img src="images/non_member.jpg" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>ID Pasien : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.kode_pasien" type="text" placeholder="ID Pasien" name="kode_pasien" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Pasien : </strong>
                                        <input ng-model="form.nama_pasien" type="text" placeholder="Name Pasien" name="nama_pasien" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Tanggal Lahir : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.tgl_lahir" name="tgl_lahir" datetime-picker date-format="yyyy-MM-dd" size="30" class="form-control input-sm" date-only />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Jenis Kelamin : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.jenis_kelamin" name="jenis_kelamin">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Agama : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.agama" name="agama">
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kongocu">Kongocu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <strong>Pekerjaan : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.pekerjaan" type="text" placeholder="Input Pekerjaan Pasien" name="pekerjaan" style="text-align:left" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>No Handpone : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.no_hp" name="no_hp" type="text" placeholder="Input No. Handpone" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Tanggal Kunjungan : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.tanggal_kunjungan" name="tanggal_kunjungan" datetime-picker date-format="yyyy-MM-dd" size="30" class="form-control input-sm" date-only />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Alamat : </strong>
                                    <div class="form-group">
                                        <textarea ng-model="form.alamat" name="alamat" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>Informasi : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.informasi" name="informasi">
                                            <option value="Langsung">Langsung</option>
                                            <option value="Info Karyawan">Info Karyawan</option>
                                            <option value="Rekom Customer">Rekom Customer</option>
                                            <option value="Clarisa">Clarisa</option>
                                            <option value="BROSUR/FLIER/BOOKLAT/ BANNER /VOUCHER">BROSUR/FLIER/BOOKLAT/ BANNER /VOUCHER</option>
                                            <option value="INVITATION/PRESENTASI">INVITATION/PRESENTASI</option>
                                            <option value="BBM/INTERNET/IKLAN/FB">BBM/INTERNET/IKLAN/FB</option>
                                        </select>        
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
        <div class="modal-dialog modal-lg" role="document" style="width:90%">
            <div class="modal-content">
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="edit('simpan/non-member/form.kode_pasien/update',halaman);">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Edit Data Member</h4>
                                <td><img src="images/non_member.jpg" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>ID Pasien : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.kode_pasien" readonly="true" type="text" placeholder="ID Pasien" name="kode_pasien" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Pasien : </strong>
                                        <input ng-model="form.nama_pasien" type="text" placeholder="Name Pasien" name="nama_pasien" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Tanggal Lahir : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.tgl_lahir" name="tgl_lahir" datetime-picker date-format="yyyy-MM-dd" size="30" class="form-control input-sm" date-only />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Jenis Kelamin : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.jenis_kelamin" name="jenis_kelamin">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Agama : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.agama" name="agama">
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kongocu">Kongocu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <strong>Pekerjaan : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.pekerjaan" type="text" placeholder="Input Pekerjaan Pasien" name="pekerjaan" style="text-align:left" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>No Handpone : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.no_hp" name="no_hp" type="text" placeholder="Input No. Handpone" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Tanggal Kunjungan : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.tanggal_kunjungan" name="tanggal_kunjungan" datetime-picker date-format="yyyy-MM-dd" size="30" class="form-control input-sm" date-only />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Alamat : </strong>
                                    <div class="form-group">
                                        <textarea ng-model="form.alamat" name="alamat" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>Informasi : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.informasi" name="informasi">
                                            <option value="Langsung">Langsung</option>
                                            <option value="Info Karyawan">Info Karyawan</option>
                                            <option value="Rekom Customer">Rekom Customer</option>
                                            <option value="Clarisa">Clarisa</option>
                                            <option value="BROSUR/FLIER/BOOKLAT/ BANNER /VOUCHER">BROSUR/FLIER/BOOKLAT/ BANNER /VOUCHER</option>
                                            <option value="INVITATION/PRESENTASI">INVITATION/PRESENTASI</option>
                                            <option value="BBM/INTERNET/IKLAN/FB">BBM/INTERNET/IKLAN/FB</option>
                                        </select>        
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

