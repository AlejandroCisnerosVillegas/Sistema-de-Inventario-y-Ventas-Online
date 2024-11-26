<?php
    session_start();
    include('includes/config.php');
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
        if (isset($_POST['submit'])) {
            $adminid = $_SESSION['aid'];
            $cpassword = md5($_POST['currentpassword']);
            $newpassword = md5($_POST['newpassword']);
            $query = mysqli_query($con, "select ID from project_09_admin where ID='$adminid' and   Password='$cpassword'");
            $row = mysqli_fetch_array($query);
            if ($row > 0) {
                $ret = mysqli_query($con, "update project_09_admin set Password='$newpassword' where ID='$adminid'");
                echo "<script>alert('La contraseña se actualizo con éxito.');</script>";
                echo "<script>window.location.href='change-password.php'</script>";
            } else {
                echo "<script>alert('La contraseña ingresada es incorrecta.');</script>";
                echo "<script>window.location.href='change-password.php'</script>";
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
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
            function checkpass() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert('La nueva contraseña no coincide con su confirmación');
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
        <div class="hk-wrapper hk-vertical-nav">
            <?php 
                include_once('includes/navbar.php');
                include_once('includes/sidebar.php');
            ?>
            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
                <div class="hk-pg-wrapper">
                    <nav class="hk-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light bg-transparent">
                            <li class="breadcrumb-item"><a href="#">Configuraciones</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                        </ol>
                    </nav>
                    <div class="container">
                        <div class="hk-pg-header">
                            <h4 class="hk-pg-title"><span class="pg-title-icon"></span>Actualizar contraseña</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <section class="hk-sec-wrapper">
                                    <div class="row">
                                        <div class="col-sm">
                                            <form class="needs-validation" method="post" name="changepassword" novalidate onsubmit="return checkpass();">
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Contraseña actual</label>
                                                        <input type="password" class="form-control" id="currentpassword" placeholder="Ingresa contraseña actual..." name="currentpassword" required>
                                                        <div class="invalid-feedback">Ingresa contraseña actual.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Nueva contraseña</label>
                                                        <input type="password" class="form-control" id="newpassword" placeholder="Ingresa la nueva contraseña..." name="newpassword" required>
                                                        <div class="invalid-feedback">Ingresa la nueva contraseña.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Confirma contraseña</label>
                                                        <input type="password" class="form-control" id="confirmpassword" placeholder="Ingresa la contraseña..." name="confirmpassword" required>
                                                        <div class="invalid-feedback">Ingresa la contraseña.</div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-secondary" type="submit" name="submit">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <script src="dist/js/jquery.slimscroll.js"></script>
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>
        <script src="dist/js/feather.min.js"></script>
        <script src="vendors/jquery-toggles/toggles.min.js"></script>
        <script src="dist/js/toggle-data.js"></script>
        <script src="dist/js/init.js"></script>
        <script src="dist/js/validation-data.js"></script>
    </body>
</html>
<?php } ?>