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
    <link href="<?= base_url('public/assets/css/sweetalert2.css') ?>" rel="stylesheet">
  </head>
  <body class=" bg-light">
  <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email_phone_num" type="text" placeholder="name@example.com" />
                                                <label for="inputEmail">Email/PhoneNumber</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Me</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html"></a>
                                                <button class="btn btn-primary" id="login">Login</button>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('Home/Register') ?>">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- <div id="layoutAuthentication_footer" style="display: none;">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> -->
        </div>

        <input type="hidden" id="lat">
        <input type="hidden" id="lang">

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('public/assets/js/jquery-3.3.1.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/scripts.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/sweetalert2.js') ?>"></script>
    
  </body>
</html>

<script>

function showPosition(position) {
    $('#lat').val(position.coords.latitude);
    $('#lang').val(position.coords.longitude);
}

  $(function() {

    if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      alert('Geolocation is not supported by this browser.');
    }

     $('#login').click(() => {
         if($('.form-control').val() == '') {
           //alert('Please fill out all fields!');
           Swal.fire('Please fill out all fields!','','warning');
           return false;
         }

         $('#login').attr('disabled','disabled').html('Please wait...');

         $.ajax({
            type: 'POST',
            url: '<?=base_url('Home/Login') ?>',
            data: {
                email_phone_num: $('#email_phone_num').val(),
                password: $('#password').val(),
                lat: $('#lat').val(),
                lang: $('#lang').val()
            },
            dataType: 'json',
            success: function(result) {
               if(result.msg == 'success') {
                   $('.form-control').val('');
                   Swal.fire(`Welcome ${result.fname}`,'','success');
                   setTimeout(() => window.location = '<?= base_url('/') ?>', 1500);
                   
               } else {
                   Swal.fire(result.msg,'','error');
               }

               $('#login').removeAttr('disabled').html('Login');
            }
        })
     });
  });
</script>