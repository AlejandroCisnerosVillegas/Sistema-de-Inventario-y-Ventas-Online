<?php
    session_start();
    include('includes/config.php');
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
        if (isset($_POST['update'])) {
            $adminid = $_SESSION['aid'];
            $adminname = $_POST['adminname'];
            $emailid = $_POST['emailid'];
            $mobileno = $_POST['mobilenumber'];
            $query = mysqli_query($con, "update project_09_admin set AdminName='$adminname',MobileNumber='$mobileno',Email='$emailid' where id='$adminid'");
            if ($query) {
                echo "<script>alert('El registro se actualizo con éxito.');</script>";
                echo "<script>window.location.href='profile.php'</script>";
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
                            <li class="breadcrumb-item"><a href="#">Perfil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                        </ol>
                    </nav>
                    <div class="container">
                        <div class="hk-pg-header">
                            <h4 class="hk-pg-title"><span class="pg-title-icon"></span>Administrar perfil de administrador</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <section class="hk-sec-wrapper">
                                    <div class="row">
                                        <div class="col-sm">
                                            <form class="needs-validation" method="post" novalidate>
                                                <?php
                                                    $adminid = $_SESSION['aid'];
                                                    $query = mysqli_query($con, "select * from project_09_admin where id='$adminid'");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03"> Fecha de registro: </label>
                                                        <?php echo $row['AdminRegdate']; ?>
                                                    </div>
                                                </div>
                                                <?php if ($row['UpdationDate'] != "") { ?>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-10">
                                                            <label for="validationCustom03"> Ultima actualización: </label>
                                                            <?php echo $row['UpdationDate']; ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03"> Nombre completo</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['AdminName']; ?>" name="adminname" required>
                                                        <div class="invalid-feedback">Ingresa nombre completo.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03"> Nombre de usuario</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['UserName']; ?>" name="username" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Correo electrónico</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['Email']; ?>" name="emailid" required>
                                                        <div class="invalid-feedback">Ingresa correo electrónico.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03"> Número telefónico</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['MobileNumber']; ?>" name="mobilenumber" required>
                                                        <div class="invalid-feedback">Ingresa número telefónico.</div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <button class="btn btn-secondary" type="submit" name="update">Actualizar</button>
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