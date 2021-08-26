<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">

    <!-- CSS -->
    <!-- Add Material font (Roboto) and Material icon as needed -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Add Material CSS, replace Bootstrap CSS -->
    <link href="<?= base_url('public/assets/css/styles.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/main.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/fontawesome-free-5.12.1-web/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/buttons.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/sweetalert2.css') ?>" rel="stylesheet">
  </head>
  <body>

  <style>
    .table > :not(:last-child) > :last-child > *, .dataTable-table > :not(:last-child) > :last-child > * {
      border-bottom-color: white;
    }
  </style>

  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
   <?php if(session('user_type') == 'Admin') : ?>

    <?= $this->include('layout/admin/navbar') ?>

    <?php endif; ?>

    <?php if(session('user_type') == 'User') : ?>

    <?= $this->include('layout/user/navbar') ?>

    <?php endif; ?>


    <?php if(session('user_type') == 'Driver') : ?>

    <?= $this->include('layout/driver/navbar') ?>

    <?php endif; ?>

    <div class="app-main">
     <div class="app-sidebar sidebar-shadow">
         <div class="app-header__logo">
             <div class="logo-src"></div>
             <div class="header__pane ml-auto">
                 <div>
                     <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                         data-class="closed-sidebar">
                         <span class="hamburger-box">
                             <span class="hamburger-inner"></span>
                         </span>
                     </button>
                 </div>
             </div>
         </div>
         <div class="app-header__mobile-menu">
             <div>
                 <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                     <span class="hamburger-box">
                         <span class="hamburger-inner"></span>
                     </span>
                 </button>
             </div>
         </div>
         <div class="app-header__menu">
             <span>
                 <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                     <span class="btn-icon-wrapper">
                         <i class="fas fa-ellipsis-v fa-w-6"></i>
                     </span>
                 </button>
             </span>
         </div>
         <div class="scrollbar-sidebar">
             <div class="app-sidebar__inner">
                 <ul class="vertical-nav-menu" id="Menus">
                     <li class="app-sidebar__heading">MENU</li>
                     <li class=""><a href="<?= base_url('Home/Homepage') ?>" class="btnmenu">
                             <i class="fas fa-chart-area me-1"></i>
                            Dashboard
                         </a></li>
                         <li class=""><a href="<?= base_url('Home/Setting') ?>" class="btnmenu">
                             <i class="fas fa-cog"></i>
                            Settings
                         </a></li>
                 </ul>
             </div>
         </div>
     </div>

     <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
  
                    </div><br>
                    <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cog"></i>
                                         SETTINGS
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>FIRSTNAME</label>
                                                <input type="text" class="form-control" id="fname"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label>LASTNAME</label>
                                                <input type="text" class="form-control" id="lname"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label>EMAIL</label>
                                                <input type="text" class="form-control" id="email"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label>PHONE NUMBER</label>
                                                <input type="text" class="form-control" id="phone_number"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label>LATITUDE</label>
                                                <input type="text" class="form-control" readonly id="latitude"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label>LONGTITUDE</label>
                                                <input type="text" class="form-control" readonly id="longtitude"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                             <div class="col-md-12">
                                               <div id="map" style="height: 300px;width: 100%;"></div>
                                             </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" id="update_account" style="float: right;">Update Data <span class="fas fa-save"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
  
  </div>

    <input type="hidden" id="RecID">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('public/assets/js/jquery-3.3.1.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/main.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/bootstrap-4.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/sweetalert2.js') ?>"></script>
    <!-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs11H9DodY0H-KqMH4DhA1HLxRRQs-j28&libraries=geometry,places,maps&v=weekly"
      defer
    ></script> -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXFAxSgXP7b5D25WEtjxkYqoWM2PjxaLg&callback=initMap&libraries=places"async defer></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!--   
    <script src="<?= base_url('public/assets/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/pdfmake.min.js') ?>"></script> -->
    
    
  </body>
</html>

<script>
 let map;

function ViewMap(lats, lang, elem, address = '') {

   map = new google.maps.Map(elem, {
    center: { lat: lats, lng: lang },
    zoom: 10,
    disableDefaultUI: true
  });

  var marker = new google.maps.Marker({
      position:{ lat: lats, lng: lang },
      map: map,
  })

  var infoWindow = new google.maps.InfoWindow({
      content: '<h5>'+address+'</h5>'
  })

  marker.addListener('click', function() {
      infoWindow.open(map, marker);
  })

}


function showPosition(position) {
    var elem = document.getElementById('map');
    var apikey = '859be3b454774226ad7d6350ae390cf8';
    var Apiendpoint = 'https://api.opencagedata.com/geocode/v1/json';

    $('#latitude').val(position.coords.latitude);
    $('#longtitude').val(position.coords.longitude);

    $.get(Apiendpoint+'?q='+position.coords.latitude+'%2C%20'+position.coords.longitude+'&key='+apikey+'&language=en&pretty=1', (response) => {
        var address = response.results[0].formatted;
        console.log(response)
        ViewMap(position.coords.latitude,position.coords.longitude,elem,address);
    }, 'json');
    
}

$(function() {
   
    if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      Swal.fire('Geolocation is not supported by this browser.','','error');
    }

    $.get('<?= base_url('Home/GetUserData') ?>',(result) => {
            $("#fname").val(result.firtname);
            $("#lname").val(result.lastname);
            $("#email").val(result.email);
            $("#phone_number").val(result.phone_number);
            $("#latitude").val(result.lat);
            $("#longtitude").val(result.lang);
            $('#RecID').val(result.RecID);
        },'json');

    $('#update_account').click(() => {

        var data = {
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            email: $('#email').val(),
            phone_number: $('#phone_number').val(),
            latitude: $('#latitude').val(),
            longtitude: $('#longtitude').val(),
            RecID: $('#RecID').val()
        };

        $('#update_account').attr('disabled', 'disabled').html('Please wait...');

        $.post('<?= base_url('Home/UpdateUserData') ?>', data, (response) => {
            if(response.msg == 'success') {
                Swal.fire('Successfully Updated!','','success');
            } else {
                console.log(response.msg);
            }

            $('#update_account').removeAttr('disabled').html('Update Data <span class="fas fa-save"></span>');
        },'json');
    });
   
});
</script>
