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
  <body class="bg-light">

  <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="firtname" type="text" placeholder="Enter your first name" />
                                                        <label for="firtname">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="lastname" type="text" placeholder="Enter your last name" />
                                                        <label for="lastname">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="row mb-3">
                                              <div  class="col-md-12">
                                              <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="email" type="email" placeholder="Enter your first name" />
                                                    <label for="email">Email</label>
                                                </div>
                                              </div>
                                           </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                      <select class="form-control" id="user_type">
                                                             <option value=""> User type </option>
                                                             <option value="Driver">Driver</option>
                                                             <option value="User">User</option>
                                                        </select>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="phone_number" value="63" type="text" />
                                                        <label for="phone_number">Phone Number</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 driver_other_details" style="display: none;">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                       <input type="number" id="age" class="form-control" />
                                                       <label for="age">Age</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="address"  type="text" />
                                                        <label for="phone_number">Complete Address</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 driver_other_details" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                       <input type="file" id="car_registration" class="form-control" />
                                                       <label for="car_registration">Car Registration</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="officaial_receipt"  type="file" />
                                                        <label for="officaial_receipt">Official Receipt</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 driver_other_details" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                       <input type="text" id="plate_number" class="form-control" />
                                                       <label for="plate_number">Plate Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="body_number"  type="text" />
                                                        <label for="body_number">Body Number</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 driver_other_details" style="display: none;">
                                                <div class="col-md-12">
                                                  <div class="form-floating">
                                                        <input class="form-control" id="driver_license"  type="file" />
                                                        <label for="driver_license">Drivers License</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password" type="password" placeholder="Create a password" />
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="confirm_password" type="password" placeholder="Confirm password" />
                                                        <label for="confirm_password">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary" id="create_account">Create Account</button></div>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('/') ?>">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
         
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('public/assets/js/jquery-3.3.1.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/scripts.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/sweetalert2.js') ?>"></script>
    
  </body>
</html>

<script>

 $(function() {

    $('#user_type').change(function() {
        if($(this).val() == 'Driver') {
            $('.driver_other_details').show();
        } else {
            $('.driver_other_details').hide();
        }
    });

    $('#create_account').click(() => {

        var ph_valid_num = 12;
        var reg_exp_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var form_data = new FormData();

        if($('#firtname').val() == '' || $('#lastname').val() == '' ||
                $('#email').val() == '' || $('#user_type').val() == '' ||
                $('#phone_number').val() == '' || $('#password').val() == '' ||
                $('#confirm_password').val() == '') {

            Swal.fire('Please fill out all fields!','','warning');
            return false;
        }

        if($('#user_type').val() == 'Driver') {
            if($('#age').val() == '' || $('#address').val() == '') {
                Swal.fire('Please fill out all fields!','','warning');
                return false;
            } 

            if($('#car_registration').get(0).files.length === 0) {
                Swal.fire('Car registration is mandatory!','','warning');
                return false;
            }
            if($('#officaial_receipt').get(0).files.length === 0) {
                Swal.fire('Official receipt is mandatory!','','warning');
                return false;
            }
            if($('#driver_license').get(0).files.length === 0) {
                Swal.fire('Drivers license is mandatory!','','warning');
                return false;
            }
        }

        if($('#phone_number').val().length > ph_valid_num) {
            Swal.fire('Please enter valid phone number!','','warning');
            return false;
        }

        if(reg_exp_email.test($('#email').val()) == false) {
            Swal.fire('Please enter valid email!','','warning');
            return false;
        }

        if($('#password').val() != $('#confirm_password').val()) {
            Swal.fire('Password and Confirm Password do not match!','','warning');
            return false;
        }

        $('#create_account').attr('disabled','disabled').html('Please wait...');

        form_data.append('firtname', $('#firtname').val());
        form_data.append('lastname', $('#lastname').val());
        form_data.append('email', $('#email').val());
        form_data.append('user_type', $('#user_type').val());
        form_data.append('phone_number', $('#phone_number').val());
        form_data.append('password', $('#password').val());
        form_data.append('age', $('#age').val());
        form_data.append('address', $('#address').val());

        form_data.append('car_registration', $('#car_registration').prop('files')[0]);
        form_data.append('officaial_receipt', $('#officaial_receipt').prop('files')[0]);
        form_data.append('driver_license', $('#driver_license').prop('files')[0]);
        form_data.append('plate_number', $('#plate_number').val());
        form_data.append('body_number', $('#body_number').val());

        $.ajax({
            type: 'POST',
            url: '<?=base_url('Home/RegisterAccount') ?>',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(result) {
               if(result.msg == 'success') {
                   $('.form-control').val('');
                   Swal.fire('Account Successfully Created!','','success');
                   setTimeout(() => window.location = '<?= base_url('/') ?>',1500);
                   
               } else {
                   console.log(result);
               }

               $('#create_account').removeAttr('disabled').html('Created Account');
            }
        })
        
    });
 });
</script>