<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {  
    if (isset($_GET['del'])) {
        $cmpid = substr(base64_decode($_GET['del']), 0, -5);
        $query = mysqli_query($con, "delete from project_09_category where id='$cmpid'");
        echo "<script>alert('Se elimino la categoría con éxito.');</script>";
        echo "<script>window.location.href='manage-categories.php'</script>";
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
        <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="#">Facturas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                        </ol>
                    </nav>
                    <div class="container">
                        <div class="hk-pg-header">
                            <h4 class="hk-pg-title"><span class="pg-title-icon"></span>Detalles de la factura</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                                    <div class="invoice-from-wrap">
                                        <div class="row">
                                            <div class="col-md-7 mb-20">
                                                <h3 class="mb-35 font-weight-600"> Sistema </h3>
                                                <h6 class="mb-5">Sistema de Inventario y Ventas Online</h6>
                                            </div>
                                            <?php
                                                $inid = substr(base64_decode($_GET['invid']), 0, -5);
                                                $query = mysqli_query($con, "select distinct InvoiceNumber,CustomerName,CustomerContactNo,PaymentMode,InvoiceGenDate  from project_09_orders  where InvoiceNumber='$inid'");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <div class="col-md-5 mb-20">
                                                <h4 class="mb-35 font-weight-600">Factura/Recibo</h4>
                                                <span class="d-block">Fecha de compra:<span class="pl-10 text-dark"><?php echo $row['InvoiceGenDate']; ?></span></span>
                                                <span class="d-block">Número de factura: #<span class="pl-10 text-dark"><?php echo $row['InvoiceNumber']; ?></span></span>
                                                <span class="d-block">Cliente: <span class="pl-10 text-dark"><?php echo $row['CustomerName']; ?></span></span>
                                                <span class="d-block">Número telefónico: <span class="pl-10 text-dark"><?php echo $row['CustomerContactNo']; ?></span></span>
                                                <span class="d-block">Forma de pago: <span class="pl-10 text-dark"><?php echo $row['PaymentMode']; ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <hr class="mt-0">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="table-wrap">
                                            <table class="table mb-0" border="1">
                                                <thead>
                                                    <tr>
                                                        <th>Número</th>
                                                        <th>Producto</th>
                                                        <th>Categoría</th>
                                                        <th>Compañía</th>
                                                        <th width="5%">Cantidad</th>
                                                        <th width="10%">Precio unitario</th>
                                                        <th width="10%">Precio total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = mysqli_query($con, "select project_09_products.CategoryName,project_09_products.ProductName,project_09_products.CompanyName,project_09_products.ProductPrice,project_09_orders.Quantity  from project_09_orders join project_09_products on project_09_products.id=project_09_orders.ProductId where project_09_orders.InvoiceNumber='$inid'");
                                                        $cnt = 1;
                                                        while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row['ProductName']; ?></td>
                                                        <td><?php echo $row['CategoryName']; ?></td>
                                                        <td><?php echo $row['CompanyName']; ?></td>
                                                        <td><?php echo $qty = $row['Quantity']; ?></td>
                                                        <td>$<?php echo $ppu = $row['ProductPrice']; ?></td>
                                                        <td>$<?php echo $subtotal = number_format($ppu * $qty, 2); ?></td>
                                                    </tr>
                                                    <?php
                                                        $grandtotal += $subtotal;
                                                        $cnt++;
                                                    } ?>
                                                    <tr>
                                                        <th colspan="6" style="text-align:center; font-size:20px;">Total:</th>
                                                        <th style="text-align:left; font-size:20px;">$<?php echo number_format($grandtotal, 2); ?></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
        <script src="dist/js/jquery.slimscroll.js"></script>
        <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="vendors/jszip/dist/jszip.min.js"></script>
        <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="dist/js/dataTables-data.js"></script>
        <script src="dist/js/feather.min.js"></script>
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>
        <script src="vendors/jquery-toggles/toggles.min.js"></script>
        <script src="dist/js/toggle-data.js"></script>
        <script src="dist/js/init.js"></script>
    </body>
</html>
<?php } ?>