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

    <?= $this->include('layout/admin/sidebar') ?>

    <?php endif; ?>

    <?php if(session('user_type') == 'User') : ?>

    <?= $this->include('layout/user/navbar') ?>

    <?= $this->include('layout/user/sidebar') ?>

    <?php endif; ?>


    <?php if(session('user_type') == 'Driver') : ?>

    <?= $this->include('layout/driver/navbar') ?>

    <?= $this->include('layout/driver/sidebar') ?>

    <?php endif; ?>
  
  </div>

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

<div class="modal fade" id="MapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MAP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                  <div class="col-md-12">
                  <div id="map" style="height: 300px;width: 100%;"></div>
                  </div>

             </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="UsersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">USER DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                      <label>FIRSTNAME</label>
                      <input type="text" readonly class="form-control" id="fname">
                  </div>
                  <div class="col-md-6">
                      <label>LASTNAME</label>
                      <input type="text" readonly class="form-control" id="lname">
                  </div>
                  <div class="col-md-6">
                      <label>EMAIL</label>
                      <input type="text" readonly class="form-control" id="email">
                  </div>
                  <div class="col-md-6">
                      <label>PHONE NUMBER</label>
                      <input type="text" readonly class="form-control" id="phone_number">
                  </div>
             </div>
                <div class="row" id="driver_data" style="display: none;">
                <div class="col-md-6 driver">
                      <label>AGE</label>
                      <input type="text" readonly class="form-control" id="age">
                  </div>
                  <div class="col-md-6 driver">
                      <label>ADDRESS</label>
                      <input type="text" readonly class="form-control" id="address">
                  </div>
                  <div class="col-md-6 driver">
                      <label>PLATE NUMBER</label>
                      <input type="text" readonly class="form-control" id="plate_num">
                  </div>
                  <div class="col-md-6 driver">
                      <label>BODY NUMBER</label>
                      <input type="text" readonly class="form-control" id="body_num">
                      <br>
                  </div>
                  <div class="col-md-4 driver">
                      <label class="font-weight-bold">OFFICIAL RECEIPT</label><br>
                      <a href="#" target="_blank" id="official_receipt_a">
                       <img src="" id="official_receipt" style="width: 150px;height: 150px;border-radius: 20px">
                      </a>
                  </div>
                  <div class="col-md-4 driver">
                      <label class="font-weight-bold">CAR REGISTRATION</label><br>
                      <a href="#" target="_blank" id="car_resgistration_a">
                      <img src="" id="car_resgistration" style="width: 150px;height: 150px;border-radius: 20px">
                      </a>
                  </div>
                  <div class="col-md-4 driver">
                      <label class="font-weight-bold">DRIVERS LICENSE</label><br>
                      <a href="#" target="_blank" id="driver_license_a">
                      <img src="" id="driver_license" style="width: 150px;height: 150px;border-radius: 20px">
                      </a>
                  </div>
                </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // VARIABLES 
    var users_table = $('#users_table').DataTable();
    var drivers_table = $('#drivers_table').DataTable();
    var transaction_table = $('#pasahero_transaction').DataTable();
    var pending_arkila = $('#pending_requested_arkila').DataTable();
    var approved_arkila = $('#approved_requested_arkila').DataTable();
    var done_arkila = $('#done_requested_arkila').DataTable();
    let map;

    //FUNCTIONS
    function ViewUserDetails(id) {
        $.post('<?=base_url('Home/GetUserData') ?>',{id: id}, (response) => {
    
          if(response.user_type == 'Driver') {
             $('#driver_data').show();
          } else {
            $('#driver_data').hide();
          }
           
            $('#fname').val(response.firtname);
            $('#lname').val(response.lastname);
            $('#email').val(response.email);
            $('#phone_number').val(response.phone_number);
            $('#age').val(response.age);
            $('#address').val(response.location);
            $('#plate_num').val(response.plate_number);
            $('#body_num').val(response.body_number);
            $('#official_receipt').attr('src','<?=base_url('public/uploads') ?>/'+response.or_file+'');
            $('#official_receipt_a').attr('href','<?=base_url('public/uploads') ?>/'+response.or_file+'');
            $('#car_resgistration').attr('src','<?=base_url('public/uploads') ?>/'+response.cr_file+'');
            $('#car_resgistration_a').attr('href','<?=base_url('public/uploads') ?>/'+response.cr_file+'');
            $('#driver_license').attr('src','<?=base_url('public/uploads') ?>/'+response.driver_license+'');
            $('#driver_license_a').attr('href','<?=base_url('public/uploads') ?>/'+response.driver_license+'');
          
        }, 'json');

        $('#UsersModal').modal('show');
    }

    function DeleteUsers(id) {
       if(confirm('Are you sure you want to delete this user?') === false) {
         return false;
       }
       $.post('<?= base_url('Home/DeleteUser') ?>',{id: id}, (response) => {
           if(response.msg == 'success') {
             Swal.fire('Successfully Deleted!','','success');
             GetUsersData();
           } else {
             console.log(response.msg);
           }
       }, 'json');
    }

    function GetUsersData() {
      $.get('<?= base_url('Home/GetUsers') ?>',(result) => {

        users_table.clear().draw();

          result.forEach((row) => {
              var tr = $(`
                <tr>
                    <td>${row.RecID}</td>
                    <td>${row.firtname}</td>
                    <td>${row.lastname}</td>
                    <td>${row.email}</td>
                    <td>${row.phone_number}</td>
                    <td>${row.user_type}</td>
                    <td>${row.IsActivated == 1 ? 'Activated' : 'Not Activated'}</td>
                    <td width="30%" align="center">${row.IsActivated == 1 ? `<button class="btn btn-danger btn-sm" onclick="Deactivate(${row.RecID})"><span class="fas fa-thumbs-down"></span></button>` 
                      : `<button class="btn btn-success btn-sm" onclick="Activate(${row.RecID})"><span class="fas fa-thumbs-up"></span></button>`}

                      <button class="btn btn-primary btn-sm" onclick="ViewUserDetails(${row.RecID})"><span class="fas fa-eye"></span></button>
                      <button class="btn btn-warning btn-sm" onclick="DeleteUsers(${row.RecID})"><span class="fas fa-trash"></span></button>
                      </td>
                </tr>
              `);
              users_table.row.add(tr);
          });

          users_table.draw();
        },'json');
    }

    function GetAllDrivers() {
      $.get('<?= base_url('Home/GetDrivers') ?>',(result) => {
        drivers_table.clear().draw();

          result.forEach((row) => {
              var tr = $(`
                <tr>
                    <td>${row.firtname}</td>
                    <td>${row.lastname}</td>
                    <td>${row.email}</td>
                    <td>${row.phone_number}</td>
                    <td>${row.Status}</td>
                    <td width="20%">
                    ${row.Status == 'AVAILABLE' ? `<button class="btn btn-sm btn-success" onclick="RequestArkila(${row.RecID})">Arkila</button> <button class="btn btn-sm btn-primary" onclick="ViewLocation(${row.lat},${row.lang})">View Location</button>` : ''}
                       
                    </td>
                </tr>
              `);
              drivers_table.row.add(tr);
          });

          drivers_table.draw();
        },'json');
    }

    function GetMyTransaction() {
      $.get('<?= base_url('Home/GetPasaheroRequest') ?>',(result) => {
        transaction_table.clear().draw();

          result.forEach((row) => {
              var tr = $(`
                <tr>
                    <td>${row.transaction_number}</td>
                    <td>${row.pasahero}</td>
                    <td>${row.driver}</td>
                    <td width="15%">${row.date}</td>
                    <td>${row.Status}</td>
                    <td>
                      ${row.Status == 'PENDING' ? `<button class="btn btn-sm btn-warning" onclick="CancelArkila(${row.RecID})">Cancel</button>` : ''}
                       
                    </td>
                </tr>
              `);
              transaction_table.row.add(tr);
          });

          transaction_table.draw();
        },'json');
    }

    function GetPendingArkila() {
      $.get('<?= base_url('Home/GetPendingCanceledArkila') ?>',(result) => {
        pending_arkila.clear().draw();

          result.forEach((row) => {
              var tr = $(`
                <tr>
                    <td>${row.transaction_number}</td>
                    <td>${row.pasahero}</td>
                    <td>${row.driver}</td>
                    <td>${row.date}</td>
                    <td>${row.Status}</td>
                    <td width="20%">
                      ${row.Status == 'PENDING' ? `<button class="btn btn-sm btn-success" onclick="ApprovedArkila(${row.RecID})">Approved</button> <button class="btn btn-sm btn-warning" onclick="CancelArkila(${row.RecID})">Cancel</button>` : ''}
                       
                    </td>
                </tr>
              `);
              pending_arkila.row.add(tr);
          });

          pending_arkila.draw();
        },'json');
    }

    function GetApprovedArkila() {
      $.get('<?= base_url('Home/GetApprovedArkila') ?>',(result) => {
        approved_arkila.clear().draw();

          result.forEach((row) => {
              var tr = $(`
                <tr>
                    <td>${row.transaction_number}</td>
                    <td>${row.pasahero}</td>
                    <td>${row.driver}</td>
                    <td>${row.date}</td>
                    <td>${row.Status}</td>
                    <td width="20%">
                      ${row.Status == 'APPROVED' ? `<button class="btn btn-sm btn-success" onclick="DoneArkila(${row.RecID})">Done</button> <button class="btn btn-sm btn-primary" onclick="ViewLocation(${row.lat},${row.lang})">View Location</button>` : ''}
                       
                    </td>
                </tr>
              `);
              approved_arkila.row.add(tr);
          });

          approved_arkila.draw();
        },'json');
    }

    function GetDoneArkila() {
      $.get('<?= base_url('Home/GetDoneArkila') ?>',(result) => {
        done_arkila.clear().draw();

          result.forEach((row) => {
              var tr = $(`
                <tr>
                    <td>${row.transaction_number}</td>
                    <td>${row.pasahero}</td>
                    <td>${row.driver}</td>
                    <td>${row.date}</td>
                    <td>${row.Status}</td>
                </tr>
              `);
              done_arkila.row.add(tr);
          });

          done_arkila.draw();
        },'json');
    }

    function Activate(id) {
       if(confirm('Are you sure you want to activate this account?') == false) {
         return false;
       }
       $.post('<?= base_url('Home/ActivateAccount') ?>',{id: id}, (response) => {
           if(response.msg == 'success') {
                Swal.fire('Successfully Activated!','','success');
                GetUsersData();
           } else {
             console.log(response.msg);
           }
       },'json');
    }

    function Deactivate(id) {
      if(confirm('Are you sure you want to deactivate this account?') == false) {
         return false;
       }
       $.post('<?= base_url('Home/DeActivateAccount') ?>',{id: id}, (response) => {
           if(response.msg == 'success') {
                Swal.fire('Successfully DeActivated!','','success');
                GetUsersData();
           } else {
             console.log(response.msg);
           }
       },'json');
    }

    function RequestArkila(driver) {
       if(confirm('Are you sure you want rent vehicle?') == false) {
          return false;
       }
       $.post('<?= base_url('Home/ArkilaRequest') ?>',{driver: driver}, (response) => {
           if(response.msg == 'success') {
                Swal.fire('Please wait for driver confirmation!','','success');
                GetUsersData();
                GetMyTransaction()
           } else {
             alert(response.msg);
           }
       },'json');
    }

    function CancelArkila(id) {
      if(confirm('Are you sure you want to cancel?') == false) {
          return false;
       }
       $.post('<?= base_url('Home/CancelArkila') ?>',{id: id}, (response) => {
           if(response.msg == 'success') {
                Swal.fire('Successfully Canceled!','','success');
                GetUsersData();
                GetMyTransaction();
                GetPendingArkila();
                DriverDashBoard();
           } else {
             alert(response.msg);
           }
       },'json');
    }

    function ApprovedArkila(id) {
      if(confirm('Are you sure you want to approved?') == false) {
          return false;
       }
       $.post('<?= base_url('Home/ApprovedArkila') ?>',{id: id}, (response) => {
           if(response.msg == 'success') {
                Swal.fire('Successfully Approved!','','success');
                GetPendingArkila();
                DriverDashBoard();
                GetApprovedArkila();
           } else {
             alert(response.msg);
           }
       },'json');
    }

    function DoneArkila(id) {
      if(confirm('Are you sure this arkila already done?') == false) {
          return false;
       }
       $.post('<?= base_url('Home/DoneArkila') ?>',{id: id}, (response) => {
           if(response.msg == 'success') {
                Swal.fire('Successfully Updated!','','success');
                GetPendingArkila();
                DriverDashBoard();
                GetApprovedArkila();
                GetDoneArkila();
           } else {
             alert(response.msg);
           }
       },'json');
    }

    function DriverDashBoard() {
      $.get('<?= base_url('Home/CountArkila') ?>',(result) => {
            $("#arkila_count").text(result.Pending);
            $("#approved_arkila").text(result.Approved);
            $("#done_arkila").text(result.Done);
            $("#canceled_arkila").text(result.Canceled);
        },'json');
    }

  function ViewMap(lats, lang, elem, address = '') {

    map = new google.maps.Map(elem, {
      center: { lat: lats, lng: lang },
      zoom: 10,
      disableDefaultUI: true
    });

//     var icon = {
//     path: "M512.9 192c-14.9-.1-29.1 2.3-42.4 6.9L437.6 144H520c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24h-45.3c-6.8 0-13.3 2.9-17.8 7.9l-37.5 41.7-22.8-38C392.2 68.4 384.4 64 376 64h-80c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h66.4l19.2 32H227.9c-17.7-23.1-44.9-40-99.9-40H72.5C59 104 47.7 115 48 128.5c.2 13 10.9 23.5 24 23.5h56c24.5 0 38.7 10.9 47.8 24.8l-11.3 20.5c-13-3.9-26.9-5.7-41.3-5.2C55.9 194.5 1.6 249.6 0 317c-1.6 72.1 56.3 131 128 131 59.6 0 109.7-40.8 124-96h84.2c13.7 0 24.6-11.4 24-25.1-2.1-47.1 17.5-93.7 56.2-125l12.5 20.8c-27.6 23.7-45.1 58.9-44.8 98.2.5 69.6 57.2 126.5 126.8 127.1 71.6.7 129.8-57.5 129.2-129.1-.7-69.6-57.6-126.4-127.2-126.9zM128 400c-44.1 0-80-35.9-80-80s35.9-80 80-80c4.2 0 8.4.3 12.5 1L99 316.4c-8.8 16 2.8 35.6 21 35.6h81.3c-12.4 28.2-40.6 48-73.3 48zm463.9-75.6c-2.2 40.6-35 73.4-75.5 75.5-46.1 2.5-84.4-34.3-84.4-79.9 0-21.4 8.4-40.8 22.1-55.1l49.4 82.4c4.5 7.6 14.4 10 22 5.5l13.7-8.2c7.6-4.5 10-14.4 5.5-22l-48.6-80.9c5.2-1.1 10.5-1.6 15.9-1.6 45.6-.1 82.3 38.2 79.9 84.3z",
//     fillColor: '#E32831',
//     fillOpacity: 1,
//     strokeWeight: 0,
//     scale: 0.04
// }

    var marker = new google.maps.Marker({
        position:{ lat: lats, lng: lang },
        map: map,
        icon: '',
    })

    var infoWindow = new google.maps.InfoWindow({
        content: '<h5>'+address+'</h5>'
    })

    marker.addListener('click', function() {
        infoWindow.open(map, marker);
    })

  }

  function ViewLocation(lat, lang) {
    var elem = document.getElementById('map');

    var apikey = '859be3b454774226ad7d6350ae390cf8';
    var Apiendpoint = 'https://api.opencagedata.com/geocode/v1/json';

    // var directionsService = new google.maps.DirectionsService();
    // var destination = lat + ', ' + lang; // using string

    // var request = {
    //     origin: new google.maps.LatLng( lat, lang ), // LatLng|string
    //     destination: destination, // LatLng|string
    //     travelMode: google.maps.DirectionsTravelMode.DRIVING
    // };

    // directionsService.route( request, function( response, status ) {
    //     if ( status === 'OK' ) {
    //         var point = response.routes[ 0 ].legs[ 0 ];
    //         console.log('Estimated travel time: ' + point.duration.text + ' (' + point.distance.text + ')');
    //     }
    // });

    $.get(Apiendpoint+'?q='+lat+'%2C%20'+lang+'&key='+apikey+'&language=en&pretty=1', (response) => {
        var address = response.results[0].formatted;

        ViewMap(lat,lang,elem,address);
    }, 'json');

    $('#MapModal').modal('show');

  }

    $(function() {
       //ADMIN SCRIPTS
      
        $.get('<?= base_url('Home/CountUsersLevel') ?>',(result) => {
            $("#pasahero_count").text(result.Pasahero);
            $("#drivers_count").text(result.Drivers);
            $("#total_count").text(result.Total);
        },'json');

         GetUsersData();
        
        //END ADMIN SCRIPTS

        //PASAHERO SCRIPTS

          GetAllDrivers();

          GetMyTransaction();

        //END PASAHERO SCRIPTS

        //DRIVERS SCRIPTS

        DriverDashBoard();

        GetPendingArkila();

        GetApprovedArkila();

        GetDoneArkila();
           
        //END DRIVERS SCRIPTS
    });
</script>