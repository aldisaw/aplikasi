var app = angular.module('apl', ['ngRoute', 'angularjs-datetime-picker', 'angularUtils.directives.dirPagination', 'angularNotify', 'bw.paging'])
            .constant('API_URL', 'api/v1/')
            .constant('API', './');

    app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl : 'master/home/home/form.html',
                parameter   : ''
            }).
            when('/treatment', {
                templateUrl : 'master/treatment/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/treatment/home/data.html'
            }).
            when('/ruangan', {
                templateUrl : 'master/ruangan/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/ruangan/home/data.html'
            }).
            when('/produk', {
                templateUrl : 'master/produk/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/produk/home/data.html'
            }).
            when('/paket-produk', {
                templateUrl : 'master/paket-produk/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/paket-produk/home/data.html'
            }).
            when('/sub-paket-produk', {
                templateUrl : 'master/sub-paket-produk/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/sub-paket-produk/home/data.html',
                sub         : 'data/sub-paket-produk/sub_produk/sub_produk'
            }).
            when('/produk-treatment', {
                templateUrl : 'master/produk-treatment/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/produk-treatment/home/data.html'
            }).
             when('/paket-treatment', {
                templateUrl : 'master/paket-treatment/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/paket-treatment/home/data.html'
            }).
            when('/sub-paket-treatment', {
                templateUrl : 'master/sub-paket-treatment/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/sub-paket-treatment/home/data.html'
            }).
            when('/member', {
                templateUrl : 'master/member/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/member/home/data.html'
            }).
            when('/non-member', {
                templateUrl : 'master/non-member/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/non-member/home/data.html'
            }).
            when('/karyawan', {
                templateUrl : 'master/karyawan/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/karyawan/home/data.html'
            }).
            when('/program-bowl', {
                templateUrl : 'master/program-bowl/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/program-bowl/home/data.html'
            }).
            when('/program-happy-hours', {
                templateUrl : 'master/program-happy-hours/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/program-happy-hours/home/data.html'
            }).
            when('/program-apotek', {
                templateUrl : 'master/program-apotek/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/program-apotek/home/data.html'
            }).
            when('/program-customer-birtday', {
                templateUrl : 'master/program-customer-birtday/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/program-customer-birtday/home/data.html'
            }).
            when('/paket-promo', {
                templateUrl : 'master/paket-promo/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/paket-promo/home/data.html'
            }).
            when('/transaksi', {
                templateUrl : 'master/transaksi/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/paket-promo/home/data.html'
            }).
            when('/balance-stok-apotek', {
                templateUrl : 'master/balance-stok-apotek/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/balance-stok-apotek/home/data.html'
            }).
            when('/barang-masuk-apotek', {
                templateUrl : 'master/barang-masuk-apotek/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/barang-masuk-apotek/home/data.html'
            }).
            when('/barang-keluar-apotek', {
                templateUrl : 'master/barang-keluar-apotek/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/barang-keluar-apotek/home/data.html'
            }).
            when('/permintaan-produk-treatment', {
                templateUrl : 'master/permintaan-produk-treatment/home/form.html',
                controller  : 'master_controller',
                parameter   : 'data/permintaan-produk-treatment/home/data.html'
            });   
}]);

        