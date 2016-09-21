app.controller('master_controller', function($scope, $http, API_URL, dataFactory, API, $route, $parse) {
    $scope.data                 = [];
    $scope.libraryTemp          = {};
    $scope.totalItemsTemp       = {};
    $scope.file                 = {};
    $scope.totalItems           = 0;
    $scope.txt_cari             = {};

    $scope.tgl = new Date();
    
    //set variabel di dalam variable
    var the_string              = 'data';
    var model                   = $parse(the_string);
    var the_string1             = 'data';
    var model1                  = $parse(the_string1);
    var halaman                 =0;



    //text cari multi select
    $scope.text_cari            = [];
    $scope.pesan_kosong_multi   = [];



    
    
    var link                    = $route.current.$$route.parameter;
    var mlt                     = $route.current.$$route.prm;
    var multi                   = $route.current.$$route.sub;

    $scope.pageChanged          = function(newPage, link) {
        ambil_data(newPage, link);
    };

    $scope.pageChanged_multi    = function(newPage, link, multi, index, kode, num) {
        ambil_data(newPage, link, multi, index, kode, num);
    };
    
    $scope.konfirmasi_hapus     = function(nama,tujuan,id){

        var jdl=nama.replace(/%/g," ");
        swal({
            title: "Kamu yakin Akan Menghapus?",
            text: jdl,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, Hapus!',
            cancelButtonText: "No, Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: false
        },

        function(isConfirm){
            if (isConfirm){
                swal("Terhapus!","'"+jdl+"'"+ " Terhapus!", "success");
                hapus(tujuan,id,halaman);
            } else {
                swal("Cancelled", "'"+jdl+"' Batal Dihapus! :)", "error");
            }
        });

    };

    ambil_data(1, link, mlt);
    function ambil_data(pageNumber, link, mlt, index, kode, num) {
        if (mlt == "multi") {         
            if(! $.isEmptyObject($scope.libraryTemp)){
                dataFactory.httpRequest(link+kode+'/paging'+'?page='+pageNumber+'&kode='+kode+'&index='+index).then(function(data) {
                    if ($.isEmptyObject(data.data)) {
                        $scope.pesan_kosong = 'Maaf, data yang anda cari tidak ditemukan';
                    }
                    else{
                        $scope.pesan_kosong = '';
                    }
                    $scope.detail[index] = data.data;
                });
            }else{
                dataFactory.httpRequest(link+kode+'/paging'+'?page='+pageNumber+'&kode='+kode+'&index='+index).then(function(data) {
                    $scope.detail[index] = data.data;
                    $scope.nomor = (pageNumber-1)*5;
                    $scope.pesan_kosong = '';
                });
            }
        }else if (mlt == "2") {   
            if(! $.isEmptyObject($scope.searchText1)){
                dataFactory.httpRequest(link+'?search='+$scope.searchText1+'&par='+$scope.par1+'&page='+pageNumber).then(function(data) {
                    if ($.isEmptyObject(data.data)) {
                        $scope.pesan_kosong = 'Maaf, data yang anda cari tidak ditemukan';
                    }
                    else{
                        $scope.pesan_kosong = '';
                    }
                    $scope.dtl = data.data;
                    $scope.totalItems = data.total/7;
                    $scope.nomor2 = (pageNumber-1)*num;
                    $scope.halaman2 = pageNumber;
                });
            }else{
                dataFactory.httpRequest(link+'?page='+pageNumber).then(function(data) {
                    $scope.dtl = data.data;
                    $scope.totalItems = data.total/7;
                    $scope.nomor2 = (pageNumber-1)*num;
                    if (isNaN($scope.nomor2)) {$scope.nomor2 = (1-1)*num;}
                    $scope.halaman2 = pageNumber;
                    $scope.pesan_kosong = '';
                });
            }
        }
        else{   
            if(! $.isEmptyObject($scope.searchText)){
                dataFactory.httpRequest(link+'?search='+$scope.searchText+'&par='+$scope.par+'&page='+pageNumber).then(function(data) {
                    if ($.isEmptyObject(data.data)) {
                        $scope.pesan_kosong = 'Maaf, data yang anda cari tidak ditemukan';
                    }
                    else{
                        $scope.pesan_kosong = '';
                    }
                    $scope.data = data.data;
                    $scope.detail = data.data;
                    $scope.totalItems = data.total;
                    $scope.nomor = (pageNumber-1)*7;
                    $scope.halaman = pageNumber;
                });
            }else{
                dataFactory.httpRequest(link+'?page='+pageNumber).then(function(data) {
                    $scope.data = data.data;
                    $scope.detail = data.data;
                    $scope.totalItems = data.total;
                    $scope.nomor = (pageNumber-1)*7;
                    $scope.halaman = pageNumber;
                    $scope.pesan_kosong = '';
                });
            }
        }
    }

    $scope.cari_data = function(link, index, mlt, kode, num){
        if($.isEmptyObject($scope.libraryTemp)){
            if (mlt == 'multi') {
                $scope.libraryTemp = $scope.detail;
            }
            else if (mlt == '2'){
                $scope.libraryTemp = $scope.dtl;
            }
            else{
                $scope.libraryTemp = $scope.data;
            }
            $scope.totalItemsTemp = 3;
        }
        $scope.pesan_kosong = '';
        ambil_data(1, link, mlt, index, kode, num);
    }

    //input data produk stok awal
    $scope.datalink = function(jenis_file, nama_text ){
        switch (jenis_file) {
            case 'produk':
                if (nama_text>0) {
                    $scope.myVar = true;
                }
                else{
                    $scope.myVar = false;

                }
            break;
            case 'member':
                if (nama_text=='Rekom Customer') {
                    $scope.myVarssas = true;
                }
                else{
                    $scope.myVarssas = false;
                    $scope.form.kode_member_rekom = '';
                    $scope.form.member_rekom = '';
                }
            break;
        }
    }

    //show modal form
    $scope.toggle = function(modalstate, id, form, target, kode, halaman, list, target_list, index, num) {

        $scope.modalstate = modalstate;
        if (list == 'list') {
            $http.get(API_URL + target)
            .success(function(response) {
                $scope.data_list = response;
            });
        }
        else if(list == 'listedit'){
            $http.get(API_URL + target_list)
            .success(function(response) {
                $scope.data_list = response;
            });   
        }
        switch (modalstate) {
            case 'delete':
                $scope.form_title = form;
                $http.get(API_URL + target +id)
                    .success(function(response) {
                        $scope.form = response;
                    });
                $scope.halaman = halaman;
                $('#hapus-data').modal('show');
            break;

            case 'form_input':
                if (kode == '1') {
                    $http.get(target+'1/kode')
                    .success(function(response) {
                        $scope.form = response;
                    });
                    $scope.nama_dt = halaman;
                    
                    $scope.myVar     = false;
                    $scope.myVarssas = false;
                    $scope.form = '';
                }
                else if (kode == '3') {
                    $scope.form = '';
                    $http.get(target+list+'/kode')
                    .success(function(response) {
                        $scope.form = response;
                        
                    });
                    
                    $scope.index = id;
                    $scope.nama_dt = halaman;
                    switch (target){
                        case 'data/produk-treatment/':
                            $scope.form = {kode_produk_treatment : list};
                        break;
                    }
                }
                else if (kode == '2') {
                    if (num == '') {
                        $http.get(target+'1/kode')
                        .success(function(response) {
                            $scope.frm = response;
                        });
                    }
                    else{
                        $scope.libraryTemp = {};
                        ambil_data(id, target, kode, '', '', num);
                    }                    
                }
                else{
                    $scope.myVar     = false;
                    $scope.myVarssas = false;
                    $scope.form = '';
                }

                $('#'+form).modal('show');
                $('#error').html('');

                if (index == '') {
                    
                }
                else{
                    $('#'+form).css('z-index', index);
                }
                $scope.halaman = id;
            break;

            case 'edit':
                $scope.form_title = form;
                $http.get(target +id+'/edit')
                    .success(function(response) {
                        $scope.form = response;

                        if (kode == 'member') {
                            if(! $.isEmptyObject(response.kode_member)){
                                $scope.myVarssas = true;
                            }
                            else{
                                $scope.myVarssas = false;
                            }
                        }
                    });

                $scope.halaman = halaman;
                $('#'+form).modal('show');
                $('#error-edit').html('');
            break;
        }
    }

    $scope.simpan = function(tujuan, halaman, mlt, num, formhide, link){
        if (mlt == '2') {
            dataFactory.httpRequest(tujuan,'POST',{},$scope.frm).then(function(data) {
                if (data.errors) {
                    var msg = '';
                    for (var i = 0; i < data.errors.length; i++) {
                        
                    };
                    var notify = {
                        type: 'error',
                        title: data.errors
                    };
                    $scope.$emit('notify', notify);
                }
                else{
                    ambil_data(1, link, mlt, '', '', num);
                    $('#'+formhide).modal('hide');
                    var notify = {
                        type: 'success',
                        title: 'Data success ditambah',
                    };
                    $scope.$emit('notify', notify);
                }
            });
        }
        else{
            dataFactory.httpRequest(tujuan,'POST',{},$scope.form).then(function(data) {
                if (data.errors) {
                    var msg = '';
                    for (var i = 0; i < data.errors.length; i++) {
                        
                    };
                    var notify = {
                        type: 'error',
                        title: data.errors
                    };
                    $scope.$emit('notify', notify);
                }
                else{
                    if (mlt == '1') {
                        ambil_data(1, link, mlt);
                    }
                    else{
                        ambil_data(1, link);
                    }
                    
                    $(".modal").modal("hide");
                    var notify = {
                        type: 'success',
                        title: 'Data success ditambah',
                    };
                    $scope.$emit('notify', notify);
                }
            });
        }
        
    }

    $scope.edit = function(tujuan, halaman){
        dataFactory.httpRequest(tujuan,'POST',{},$scope.form).then(function(data) {
            if (data.errors) {
                var pesan_error = '';
                for (var i = 0; i < data.errors.length; i++) {
                    //pesan_error +=  data.errors[i] + '<br>';
                };
                var notify = {
                    type: 'error',
                    title: data.errors
                };
                $scope.$emit('notify', notify);
            }
            else{
                $(".modal").modal("hide");
                ambil_data(1, link);
                var notify = {
                    type: 'success',
                    title: 'Data success diubah',
                    //content: 'data-content'
                };
                $scope.$emit('notify', notify);
            }
        });
    }

    function hapus(target,id, halaman){
        var lnk = target+'/home/data.html';
        $http({
            method: 'GET',
            url:target+'/'+id+'/hapus'
        }).
        success(function(data){

            ambil_data(1, lnk);
            
            var notify = {
                type: 'success',
                title: 'Data Terhapus',
            };
            $scope.$emit('notify', notify);
        }).
        error(function(data){
            var notify = {
                type: 'error',
                title: 'Data gagal dihapus'
            };
            $scope.$emit('notify', notify);
        });
    }

    $scope.simpan_gambar = function(){
        //$scope.form = {};
        var data = $scope.form;
        var uploadUrl = API+'manajemen_home';
        //multipartForm.post(uploadUrl, $scope.form)
        var fd = new FormData();
        for(var key in data)
        fd.append(key, data[key]);
        $http.post(uploadUrl, fd, {
          transformRequest :  angular.identity,
          headers : { 'Content-Type': undefined }
        }).
        success(function(data){
          if (data.errors) {
                var msg = '';
                for (var i = 0; i < data.errors.length; i++) {
                  msg +=  data.errors[i] + '<br>';
                };
                $('#error').html(msg);
                  //console.log(data);
            }
            else{
                ambil_data(1, link); 
                $(".modal").modal("hide");
            }
        })
    }

    $scope.transfer = function(a, b, c, d, form, transfer){
        //$scope.transfer = transfer;
        switch (transfer) {
            case 'produk-transfer':
                $scope.form = {
                    'kode_produk'           : a.replace(/%/g," "),
                    'nama_produk'           : b.replace(/%/g," "),
                    'kode_produk_treatment' : c,
                    'kode_treatment'        : d 
                };
                
                $('#'+form).modal('hide');
            break;
            
            case 'produk-transfer-paket-produk':
                $scope.form = {
                    'kode_produk'           : a.replace(/%/g," "),
                    'nama_produk'           : b.replace(/%/g," "),
                    'kode_detail_paket'     : c,
                    'kode_paket'            : d 
                };
                
                $('#'+form).modal('hide');
            break;

            case 'transfer-paket-treatment':
                $scope.form = {
                    'kode_treatment'        : a.replace(/%/g," "),
                    'nama_treatment'        : b.replace(/%/g," "),
                    'kode_detail_paket'     : c,
                    'kode_paket'            : d 
                };
                
                $('#'+form).modal('hide');
            break;

            case 'produk':
                $scope.form.nama_produk     = a;
                $scope.form.kode_produk     = b;
                
                $('#'+form).modal('hide');
            break;

            case 'treatment':
                $scope.form.nama_treatment     = a;
                $scope.form.kode_treatment     = b;
                
                $('#'+form).modal('hide');

            break;

            case 'coba':
                $scope.form.member_rekom        = a;
                $scope.form.kode_member_rekom   = b;
                
                $('#'+form).modal('hide');
                console.log($scope.form.member_rekom)
            break;

            case 'edit_stok':
                $scope.form = {
                    'kode_produk'   : a,
                    'nama_produk'   : b,
                    'jumlah'        : c,
                    'jlh'           : c,
                    'exd'           : d,
                    'payet'         : d
                };
                
                $('#'+form).modal('show');
            break;   

            case 'produk-stok':
                $scope.form.nama_produk     = a;
                $scope.form.kode_produk     = b;
                $scope.form.sisa            = c;
                console.log($scope.form.sisa);
                $('#'+form).modal('hide');
            break;       
        }
    }

    $scope.transfer_edit = function(a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a13,a14,a15,a16,a17,a18,a19,a20,a21,a22,a23,a24,a25,a26, target, transfer, form){
        switch (transfer) {
            case 'produk-masuk':
                $scope.form = {
                        'kode_produk'   : a1,
                        'nama_produk'   : a2,
                        'no_transaksi'  : a3,
                        'jumlah'        : a4,
                        'exd'           : a5,
                        'tanggal_masuk' : a6,
                        'keterangan'    : a7
                    }

                $('#'+form).modal('show');
            break;

            case 'produk-keluar':
                $scope.form = {
                        'kode_produk'       : a1,
                        'nama_produk'       : a2,
                        'no_transaksi'      : a3,
                        'jumlah'            : a4,
                        'jlh'               : a4,
                        'tanggal_keluar'    : a5,
                        'keterangan'        : a6
                    }

                $('#'+form).modal('show');
            break;
        }
    }

});


//laporan exd

//laporan slow moving

//program apotek

