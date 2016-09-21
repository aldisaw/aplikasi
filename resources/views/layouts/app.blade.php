<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Aplikasi Penjualan" />
    <meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
    <meta name="author" content="Codrops" />
    <link rel='shortcut icon' href='images/logo.jpg'/>
    <link rel="stylesheet" type="text/css" href="sistem/src/css/fileMenu.min.css">
        
    <link rel="stylesheet" type="text/css" href="sistem/css/style.css">    
    <script src="sistem/js/js.js"></script>
    <!--Bootstrap-->
    <link href="sistem/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <script src="sistem/notifikasi/scripts/vendor/jquery.min.js"></script>

    <script src="sistem/app/lib/angular/angular.min.js"></script>
    <script src="sistem/app/lib/angular/angular-route.min.js"></script>
    <script src="sistem/js/jquery.min.js"></script>
    <script src="sistem/js/bootstrap.min.js"></script>

    

    <!--angulardatetime-->
    <link rel="stylesheet" href="bower_components/angularjs-datetime-picker/angularjs-datetime-picker.css" />
    <script src="bower_components/angularjs-datetime-picker/angularjs-datetime-picker.js"></script>

    <!--pagging angular script-->
    <script src="sistem/app/paging.js"></script>

    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    
    <!-- AngularJS Application Scripts -->
    <script src="sistem/app/packages/dirPagination.js"></script>
    <script src="sistem/app/app.js"></script>
    <script src="sistem/app/services/services.js"></script>
    <script src="sistem/app/controllers/angular_controller.js"></script>
    
    <script src="sistem/js/modernizr.custom.js"></script>
    <link href="sistem/css/jquery-ui.css" rel="stylesheet" type="text/css" />

    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <link rel="stylesheet" href="sistem/notifikasi/styles/css/angular-notify-texture.min.css" id="notifyTheme">

    <!--Delete confirmasi-->
    <script src="sistem/js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="sistem/js/sweetalert.css">

    <!--Menu Pilihan transaksi-->
       
    <link rel="stylesheet" href="sistem/css/style1.css" />
    <!--<script src="sistem/js/jquery-1.9.1.min.js"></script>-->
    <script src="sistem/js/modernizr.js"></script>

    <title>Aplikasi</title>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .circle {
            display: block;
            width: 120px;
            height: 120px;
            margin: 1em auto;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            -webkit-border-radius: 99em;
            -moz-border-radius: 99em;
            border-radius: 99em;
            border: 5px solid #eee;
            box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);  
        }

    </style>


</head>
<body ng-app="apl">
    <div class="notifies" notifybar style="z-index:9990;position :fixed;top:100px;"></div>

    @yield('content')
    
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/textAngular/1.1.2/textAngular.min.js'></script>
    
    <script src="sistem/notifikasi/scripts/dist/angular-notify.min.js"></script>

    <script type="text/javascript" src="sistem/src/js/fileMenu.js"></script>

    
   

    <script type="text/javascript">
        $(document).ready(function () {
                $('#menu').fileMenu({
                    slideSpeed: 200
                });
            });  

        $(document).ready(function(){
            $('.theme-change').click(function(e){
                var theme = e.target.getAttribute('data-theme');
                console.log(theme);
                var css = document.getElementById('notifyTheme');
                switch(theme){
                    case 'md':
                        css.setAttribute('href','sistem/styles/css/angular-notify-material.min.css');
                        $('.theme-select button').removeClass('active');
                        $(e.target).addClass('active');
                        break;
                    case 'flat':
                        css.setAttribute('href','sistem/styles/css/angular-notify-flat.min.css');
                        $('.theme-select button').removeClass('active');
                        $(e.target).addClass('active');
                        break;
                    case 'bordered':
                        css.setAttribute('href','sistem/styles/css/angular-notify-bordered.min.css');
                        $('.theme-select button').removeClass('active');
                        $(e.target).addClass('active');
                        break;
                    default:
                        css.setAttribute('href','sistem/styles/css/angular-notify-texture.min.css');
                        $('.theme-select button').removeClass('active');
                        $(e.target).addClass('active');
                }
            });
            angular.bootstrap(document, ['apl']);
        }); 
        
        $(document).ready(function(){
            if (Modernizr.touch) {
                // show the close overlay button
                $(".close-overlay").removeClass("hidden");
                // handle the adding of hover class when clicked
                $(".img").click(function(e){
                    if (!$(this).hasClass("hover")) {
                        $(this).addClass("hover");
                    }
                });
                // handle the closing of the overlay
                $(".close-overlay").click(function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    if ($(this).closest(".img").hasClass("hover")) {
                        $(this).closest(".img").removeClass("hover");
                    }
                });
            } else {
                // handle the mouseenter functionality
                $(".img").mouseenter(function(){
                    $(this).addClass("hover");
                })
                // handle the mouseleave functionality
                .mouseleave(function(){
                    $(this).removeClass("hover");
                });
            }
        });
    </script>
</body>
</html>
