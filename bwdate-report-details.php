<?php
    session_start();
    include('includes/config.php');
    if (strlen($_SESSION['aid'] == 0)) {
        header('location:logout.php');
    } else {
        if (isset($_GET['del'])) {
            $cmpid = substr(base64_decode($_GET['del']), 0, -5);
            $query = mysqli_query($con, "delete from project_09_category where id='$cmpid'");
            echo "<script>alert('La categoría se elimino con éxito.');</script>";
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
                            <li class="breadcrumb-item"><a href="#">Reportes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Búsqueda de factura por fecha</li>
                        </ol>
                    </nav>
                    <div class="container">
                        <div class="hk-pg-header">
                            <h4 class="hk-pg-title"><span class="pg-title-icon">
                            <?php
                                $fdate = $_POST['fromdate'];
                                $tdate = $_POST['todate'];
                            ?>
                            <span class="feather-icon"><i data-feather="database"></i></span></span>Búsqueda de factura del <?php echo $fdate ?> al <?php echo $tdate ?></h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <section class="hk-sec-wrapper">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="table-wrap">
                                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                                    <thead>
                                                        <tr>
                                                            <th>Número</th>
                                                            <th>Núm. factura</th>
                                                            <th>Cliente</th>
                                                            <th>Número telefónico</th>
                                                            <th>Forma de pago</th>
                                                            <th>F. registro</th>
                                                            <th>Operación</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $rno = mt_rand(10000, 99999);
                                                            $query = mysqli_query($con, "select distinct InvoiceNumber,CustomerName,CustomerContactNo,PaymentMode,InvoiceGenDate  from project_09_orders where date(InvoiceGenDate) between '$fdate' and '$tdate'");
                                                            $cnt = 1;
                                                            while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $cnt; ?></td>
                                                                <td><?php echo $row['InvoiceNumber']; ?></td>
                                                                <td><?php echo $row['CustomerName']; ?></td>
                                                                <td><?php echo $row['CustomerContactNo']; ?></td>
                                                                <td><?php echo $row['PaymentMode']; ?></td>
                                                                <td><?php echo $row['InvoiceGenDate']; ?></td>
                                                                <td>
                                                                    <a href="view-invoice.php?invid=<?php echo base64_encode($row['InvoiceNumber'] . $rno); ?>" class="mr-25" data-toggle="tooltip" data-original-title="Ver detalles" target="_blank"> <i class="glyphicon glyphicon-copy"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $cnt++;
                                                        } ?>
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