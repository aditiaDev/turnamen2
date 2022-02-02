<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOBA - Register</title>

    <link rel="shortcut icon" href="<?php echo base_url('/assets/begam/images/fav.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('/assets/begam/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/begam/css/fontawesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/begam/css/slick.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/begam/css/nice-select.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/begam/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/begam/css/style.css'); ?>">
</head>

<body>

    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Login Reg In start -->
    <section id="login-reg">
        <div class="overlay pb-120">
            <div class="container">
                <div class="top-area">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-5 col">
                            <a class="back-home" href="<?php echo base_url("front/")?>">
                                <img src="<?php echo base_url('/assets/begam/images/left-icon.png'); ?>" alt="image">
                                Back To Home
                            </a>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#">
                                <img src="<?php echo base_url('/assets/begam/images/logo.png'); ?>" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row pt-120 d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login-reg-main text-center">
                            <h4>Let's get started</h4>
                            <div class="form-area">
                                <form id="FRM_DATA">
                                    <div class="form-group">
                                        <label>Nama User</label>
                                        <input  type="text" name="nm_user" placeholder="Nama Pengguna">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input placeholder="Enter Your Username" type="text" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input placeholder="Enter your password" type="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="cmn-btn">Daftar</button>
                                    </div>
                                </form>
                                <div class="account">
                                    <p>Already have an account? <a href="<?php echo base_url("login/")?>">Sign In</a></p>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Reg In end -->

    <script src="<?php echo base_url('/assets/begam/js/jquery-3.5.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/begam/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/adminlte/plugins/toastr/toastr.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/begam/js/slick.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/begam/js/jquery.nice-select.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/begam/js/fontawesome.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/begam/js/jquery.counterup.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/begam/js/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/begam/js/wow.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/begam/js/main.js'); ?>"></script>
    <script>
        $(function(){
            $("#FRM_DATA").submit(function(event){
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "<?php echo site_url('login/signUp') ?>",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    success: function(data){
                        // console.log(data)
                        if (data.status == "success") {
                            alert('Pendaftaran Berhasil')
                            window.location="<?php echo base_url('login');?>"
                        }else{
                            toastr.error(data.message)
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>