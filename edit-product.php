<?php
    session_start();
    include('includes/config.php');
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
        if (isset($_POST['update'])) {
            $pid = substr(base64_decode($_GET['pid']), 0, -5);
            $catname = $_POST['category'];
            $company = $_POST['company'];
            $pname = $_POST['productname'];
            $pprice = $_POST['productprice'];
            $query = mysqli_query($con, "update project_09_products set CategoryName='$catname',CompanyName='$company',ProductName='$pname',ProductPrice='$pprice' where id='$pid'");
            echo "<script>alert('El registro se actualizo correctamente.');</script>";
            echo "<script>window.location.href='manage-products.php'</script>";
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
                        <li class="breadcrumb-item"><a href="#">Productos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar</li>
                    </ol>
                </nav>
                <div class="container">
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"></span>Editar producto</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="post" novalidate>
                                            <?php
                                                $pid = substr(base64_decode($_GET['pid']), 0, -5);
                                                $query = mysqli_query($con, "select * from project_09_products where id='$pid'");
                                                while ($result = mysqli_fetch_array($query)) {
                                            ?>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Nombre de la categoría</label>
                                                        <select class="form-control custom-select" name="category" required>
                                                            <option value="<?php echo $result['CategoryName']; ?>"><?php echo $catname = $result['CategoryName']; ?></option>
                                                            <?php
                                                                $ret = mysqli_query($con, "select CategoryName from project_09_category");
                                                                while ($row = mysqli_fetch_array($ret)) { ?>
                                                                <option value="<?php echo $row['CategoryName']; ?>"><?php echo $row['CategoryName']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-feedback">Selecciona el nombre de la categoría.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Nombre de la compañía</label>
                                                        <select class="form-control custom-select" name="company" required>
                                                            <option value="<?php echo $result['CompanyName']; ?>"><?php echo $result['CompanyName']; ?></option>
                                                            <?php
                                                                $ret = mysqli_query($con, "select CompanyName from project_09_company");
                                                                while ($rw = mysqli_fetch_array($ret)) { ?>
                                                                <option value="<?php echo $rw['CompanyName']; ?>"><?php echo $rw['CompanyName']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-feedback">Selecciona el nombre de la compañía.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Nombre del producto</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $result['ProductName']; ?>" name="productname" required>
                                                        <div class="invalid-feedback">Ingresa el nombre del producto.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Precio del producto</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $result['ProductPrice']; ?>" name="productprice" required>
                                                        <div class="invalid-feedback">Ingresa el precio del producto.</div>
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