
    <div id="konten_kanan">
        <div id="konten_kanan_isi">
            <div id="list">
                <div class="isi_divda">
                    <table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
                        <tr class="tinggi">
                            <td width="20%">
                                <font size="3" color=green>File Karyawan</font>
                            <td width="5%"><img src="images/teachers.png" width="30" height="30" />
                            <td width="23%">
                                <div class="input-group">
                                    <select class="form-control input-sm ng-valid ng-dirty" ng-model="par">
                                        <option value="nama_karyawan">Nama Karyawan</option>
                                        <option value="kode_karyawan">Kode Karyawan</option>
                                        <option value="jk">Jenis Kelamin</option>
                                    </select>
                                    <span class="input-group-addon" >Filter</span>
                                </div>
                            <td width="5%" align="center"><img src="images/cari.png" width="30" height="30" />
                            <td align="right">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-model="searchText" ng-enter="cari_data('data/karyawan/home/data.html');" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                                    <span class="input-group-addon" >Search</span>
                                </div>
                            <td width="10%" align="right">
                                <button class="btn btnb btn-success" data-toggle="modal" ng-click="toggle('form_input', halaman, 'form', 'data/karyawan/','1')" >Buat Baru</button>
                        <tr>
                            <td><br>
                        <tr>
                            <td colspan="6">
                                @include('file_master_data.file_karyawan.data')
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
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="simpan('simpan/karyawan/simpan/simpan', halaman, 'mlt', 'num', 'pg', 'data/karyawan/home/data.html');">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Tambah Data Karyawan</h4>
                                <td><img src="images/teachers.png" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kode Karyawan : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.kode_karyawan" type="text" placeholder="ID Karyawan" name="kode_karyawan" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Karyawan : </strong>
                                        <input ng-model="form.nama_karyawan" type="text" placeholder="Name Karyawan" name="nama_karyawan" class="form-control" required />
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
                                    <strong>Alamat : </strong>
                                    <div class="form-group">
                                        <textarea ng-model="form.alamat" name="alamat" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <strong>No Handpone : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.no_hp" name="no_hp" type="text" placeholder="Input No. Handpone" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Devisi : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.devisi" name="devisi">
                                            <option value="Manager">Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="SDM">SDM</option>
                                            <option value="Kesekretariatan">Kesekretariatan</option>
                                            <option value="Accounting">Accounting</option>
                                            <option value="Receptionist">Receptionist</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Apotek">Apotek</option>
                                            <option value="Kasir">Kasir</option>
                                            <option value="Beautician">Beautician</option>
                                            <option value="Security">Security</option>
                                            <option value="IT">IT</option>
                                            <option value="Cleaning Service">Cleaning Service</option>
                                        </select>        
                                    </div>

                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Gaji Pokok : </strong>
                                    <div class="form-group">
                                        <input type="text" ng-model="form.gaji_pokok" name="gaji_pokok" id="gaji_pokok" onkeypress="return isNumberKey(event)" style="text-align:right" onblur=formatrupiah(this.value,'Rp.','gaji_pokok','v'); class="form-control input-sm" />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kordinator : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.kordinator" name="kordinator">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>        
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>Set Penggajian : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.set_penggajian" name="set_penggajian">
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Umum">Umum</option>
                                        </select>        
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Status : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.status" name="status">
                                            <option value="Pelatihan">Pelatihan</option>
                                            <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                                        </select>        
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>No. Rekening : </strong>
                                    <div class="form-group">
                                        <input type="text" ng-model="form.no_rek" name="no_rek" onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control input-sm" />      
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Cabang : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.cabang" name="cabang">
                                            <option value="CBG-0001">Aurellyn Clinic</option>
                                            <option value="CBG-0002">Dr. Florine Clinic</option>
                                        </select>        
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>Keterangan : </strong>
                                    <div class="form-group">
                                        <textarea type="text" ng-model="form.keterangan" name="keterangan"  class="form-control input-sm" /></textarea>   
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
                <form method="POST" class="avatar-form" name="addItem" role="form" ng-submit="edit('simpan/karyawan/form.kode_karyawan/update',halaman);">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top"><h4 class="modal-title" id="myModalLabel">Edit Data Karyawan</h4>
                                <td><img src="images/teachers.png" width="30" height="30" />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-body">
                        <div class="container" style="width:100%;">
                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kode Karyawan : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.kode_karyawan" readonly="true" type="text" placeholder="ID Karyawan" name="kode_karyawan" class="form-control" required />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <strong>Nama Karyawan : </strong>
                                        <input ng-model="form.nama_karyawan" type="text" placeholder="Name Karyawan" name="nama_karyawan" class="form-control" required />
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
                                    <strong>Alamat : </strong>
                                    <div class="form-group">
                                        <textarea ng-model="form.alamat" name="alamat" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <strong>No Handpone : </strong>
                                    <div class="form-group">
                                        <input ng-model="form.no_hp" name="no_hp" type="text" placeholder="Input No. Handpone" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Devisi : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.devisi" name="devisi">
                                            <option value="Manager">Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="SDM">SDM</option>
                                            <option value="Kesekretariatan">Kesekretariatan</option>
                                            <option value="Accounting">Accounting</option>
                                            <option value="Receptionist">Receptionist</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Apotek">Apotek</option>
                                            <option value="Kasir">Kasir</option>
                                            <option value="Beautician">Beautician</option>
                                            <option value="Security">Security</option>
                                            <option value="IT">IT</option>
                                            <option value="Cleaning Service">Cleaning Service</option>
                                        </select>        
                                    </div>

                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xs-6">
                                    <strong>Gaji Pokok : </strong>
                                    <div class="form-group">
                                        <input type="text" ng-model="form.gaji_pokok" name="gaji_pokok" id="gaji_pokok" onkeypress="return isNumberKey(event)" style="text-align:right" onblur=formatrupiah(this.value,'Rp.','gaji_pokok','v'); class="form-control input-sm" />
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Kordinator : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.kordinator" name="kordinator">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>        
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>Set Penggajian : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.set_penggajian" name="set_penggajian">
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Umum">Umum</option>
                                        </select>        
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Status : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.status" name="status">
                                            <option value="Pelatihan">Pelatihan</option>
                                            <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                                        </select>        
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>No. Rekening : </strong>
                                    <div class="form-group">
                                        <input type="text" ng-model="form.no_rek" name="no_rek" onkeypress="return isNumberKey(event)" style="text-align:right" class="form-control input-sm" />      
                                    </div>
                                </div>
                            </div>

                            <div class="row col-xs-6">
                                <div class="">
                                    <strong>Cabang : </strong>
                                    <div class="form-group">
                                        <select class="form-control input-sm " ng-model="form.cabang" name="cabang">
                                            <option value="CBG-0001">Aurellyn Clinic</option>
                                            <option value="CBG-0002">Dr. Florine Clinic</option>
                                        </select>        
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-6">
                                    <strong>Keterangan : </strong>
                                    <div class="form-group">
                                        <textarea type="text" ng-model="form.keterangan" name="keterangan"  class="form-control input-sm" /></textarea>   
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

