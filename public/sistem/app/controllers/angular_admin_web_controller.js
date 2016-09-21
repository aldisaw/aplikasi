app.controller('master_controller', function($scope, $http, API_URL, dataFactory, API) {
    $scope.data = [];
    $scope.libraryTemp = {};
    $scope.totalItemsTemp = {};
    $scope.file = {};
    $scope.totalItems = 0;
    var formdata = new FormData();
    $scope.getTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formdata.append(key, value);
        });
    };

    $scope.pageChanged = function(newPage, link) {
        getResultsPage(newPage, link);
    };
    
    getResultsPage(1, link);
    function getResultsPage(pageNumber, link) {
        if(! $.isEmptyObject($scope.libraryTemp)){
            dataFactory.httpRequest(API_URL+link+'?search='+$scope.searchText+'&page='+pageNumber).then(function(data) {
                if ($.isEmptyObject(data.data)) {
                    $scope.pesan_kosong = 'Maaf, data yang anda cari tidak ditemukan';
                }
                else{
                    $scope.pesan_kosong = '';
                }

                $scope.data = data.data;
                $scope.totalItems = data.total;
                $scope.nomor = (pageNumber-1)*5;
                $scope.halaman = pageNumber;
                
            });
        }else{
            dataFactory.httpRequest(API_URL+link+'?page='+pageNumber).then(function(data) {
                $scope.data = data.data;
                $scope.totalItems = data.total;
                $scope.nomor = (pageNumber-1)*5;
                $scope.halaman = pageNumber;
                console.log(data.data);
            });
        }
    }

    $scope.cari_data = function(link){
        if($.isEmptyObject($scope.libraryTemp)){
            $scope.libraryTemp = $scope.data;
            $scope.totalItemsTemp = $scope.totalItems;
        }
        getResultsPage(1, link);
    }

    //show modal form
    $scope.toggle = function(modalstate, id, form, target, halaman, list, target_list) {
        $scope.modalstate = modalstate;
        if (list == 'list') {
            $http.get(API_URL + target)
            .success(function(response) {
                console.log(response);
                $scope.data_list = response;
            });
        }
        else if(list == 'listedit'){
            $http.get(API_URL + target_list)
            .success(function(response) {
                console.log(response);
                $scope.data_list = response;
            });   
        }
        switch (modalstate) {
            case 'delete':
                $scope.form_title = form;
                $http.get(API_URL + target +id)
                    .success(function(response) {
                        //console.log(response);
                        $scope.form = response;
                    });
                $scope.halaman = halaman;
                $('#hapus-data').modal('show');
                //console.log(halaman);
            break;

            case 'form_input':
                
                $('#'+form).modal('show');
                $('#error').html('');
                $scope.form = '';
                $scope.htmlcontent = '';
                $scope.halaman = id;
                //console.log(id);
            break;

            case 'edit':
                $scope.form_title = form;
                $http.get(API_URL + target +id+'/edit')
                    .success(function(response) {
                        //console.log(response);
                        $scope.form = response;
                    });
                //console.log(id);
                $scope.halaman = halaman;
                $('#update-user').modal('show');
                $('#error-edit').html('');
                //console.log(halaman);
            break;
        }
    }

    $scope.edit = function(link, halaman){
        dataFactory.httpRequest(API+link+'/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
            if (data.errors) {
                var pesan_error = '';
                for (var i = 0; i < data.errors.length; i++) {
                    pesan_error +=  data.errors[i] + '<br>';
                };
                $('#error-edit').html(pesan_error);
                //console.log(data);
            }
            else{
                $(".modal").modal("hide");
                getResultsPage(halaman, link);
            }
        });
    }

    $scope.hapus = function(target,id, halaman){
        $http({
            method: 'DELETE',
            url:target+'/' + id
        }).
        success(function(data){
            getResultsPage(halaman, target);
            $(".modal").modal("hide");
        }).
        error(function(data){
            alert('Data Tidak Bisa Dihapus');
        });
    }
    
    $scope.simpan_gambar = function(link, halaman){
        //$scope.form = {};
        var data = $scope.form;
        var uploadUrl = API+link;
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
                  console.log(data);
            }
            else{
                getResultsPage(halaman, link); 
                $(".modal").modal("hide");
            }
        })
    }

    $scope.simpan = function(link, halaman){
       var data = { 'htmlcontent': $scope.htmlcontent };
        $http.post(API+link, data).
        success(function(data){
          if (data.errors) {
                var msg = '';
                for (var i = 0; i < data.errors.length; i++) {
                  msg +=  data.errors[i] + '<br>';
                };
                $('#error').html(msg);
                  console.log(data);
            }
            else{
                getResultsPage(halaman, link); 
                $(".modal").modal("hide");
            }
        })
    }

    $scope.simpan_text = function(link, halaman){
        dataFactory.httpRequest(API+link,'POST',{},$scope.form).then(function(data) {
            if (data.errors) {
                var msg = '';
                for (var i = 0; i < data.errors.length; i++) {
                    msg +=  data.errors[i] + '<br>';
                };
                $('#error').html(msg);
                console.log(data);

              }
              else{
                getResultsPage(halaman, link); 
                $(".modal").modal("hide");
                //location.reload();
              }
        });
    }

    $scope.text_content = function(){
        $scope.form= {'descr' : $scope.htmlcontent};
    }

    
});
