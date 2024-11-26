<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID from project_09_admin where  UserName='$adminuser' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['aid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        echo "<script>alert('Los datos ingresados son incorrecto. Por favor inténtalo de nuevo.');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Sistema de Inventario y Ventas Online</title>
        <link rel="icon" href="../../assets/img/logo.png">
        <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="hk-wrapper">
            <div class="hk-pg-wrapper hk-auth-wrapper">
                <header class="d-flex justify-content-between align-items-center">
                    <a class="d-flex auth-brand align-items-center" href="#">
                        <span class="text-white font-30">Sistema de Inventario y Ventas Online</span>
                    </a>
                </header>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-5 pa-0">
                            <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                                <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner2.png);">
                                    <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                        <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        </div>
                                    </div>
                                    <div class="bg-overlay bg-trans-dark-20"></div>
                                </div>
                                <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner1.png);">
                                    <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                        <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        </div>
                                    </div>
                                    <div class="bg-overlay bg-trans-dark-20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 pa-0">
                            <div class="auth-form-wrap py-xl-0 py-50">
                                <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                    <form method="post">
                                        <h1 class="display-4 mb-10">Bienvenido</h1>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Nombre de Usuario..." type="text" name="username" required="true">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Contraseña..." type="password" name="password" required="true">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-secondary btn-block" type="submit" name="login">Ingresar</button>
                                        <p class="font-14 text-center mt-15">¿Tienes problemas para ingresar?</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="dist/js/jquery.slimscroll.js"></script>
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>
        <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="dist/js/feather.min.js"></script>
        <script src="dist/js/init.js"></script>
        <script src="dist/js/login-data.js"></script>
    </body>
</html>