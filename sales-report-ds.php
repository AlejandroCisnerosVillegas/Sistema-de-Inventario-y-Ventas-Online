<?php
    session_start();
    include('includes/config.php');
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
        if (isset($_POST['submit'])) {
            $cname = $_POST['companyname'];
            $query = mysqli_query($con, "insert into project_09_company(CompanyName) values('$cname')");
            if ($query) {
                echo "<script>alert('La compañía se agrego con éxito.');</script>";
                echo "<script>window.location.href='add-company.php'</script>";
            } else {
                echo "<script>alert('Ocurrió un error. Por favor inténtalo de nuevo.');</script>";
                echo "<script>window.location.href='add-company.php'</script>";
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
                            <li class="breadcrumb-item"><a href="#">Reportes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                        </ol>
                    </nav>
                    <div class="container">
                        <div class="hk-pg-header">
                            <h4 class="hk-pg-title"><span class="pg-title-icon"></span>Buscar ventas por fecha</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <section class="hk-sec-wrapper">
                                    <div class="row">
                                        <div class="col-sm">
                                            <form class="needs-validation" method="post" action="sales-report-details.php" novalidate>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Fecha de inicio</label>
                                                        <input class="form-control" type="date" name="fromdate" required />
                                                        <div class="invalid-feedback">Ingresar fecha de inicio.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Fecha limite</label>
                                                        <input class="form-control" type="date" name="todate" required />
                                                        <div class="invalid-feedback">Ingresa fecha limite.</div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-secondary" type="submit" name="submit">Buscar</button>
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