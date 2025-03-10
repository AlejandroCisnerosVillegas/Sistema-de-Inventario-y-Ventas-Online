<nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
    <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><i class="ion ion-ios-menu"></i></a>
    <a class="navbar-brand" href="dashboard.php">Sistema</a>
    <ul class="navbar-nav hk-navbar-content">
        <li class="nav-item dropdown dropdown-authentication">
            <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media">
                    <div class="media-img-wrap">
                        <div class="avatar">
                            <img src="dist/img/user.png" alt="user" class="avatar-img rounded-circle">
                        </div>
                        <span class="badge badge-success badge-indicator"></span>
                    </div>
                    <?php
                        $adminid = $_SESSION['aid'];
                        $query = mysqli_query($con, "select AdminName from project_09_admin where id='$adminid'");
                        $row = mysqli_fetch_array($query);
                    ?>
                    <div class="media-body">
                        <span><?php echo $row['AdminName']; ?><i class="zmdi zmdi-chevron-down"></i></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                <a class="dropdown-item" href="profile.php"><i class="dropdown-icon zmdi zmdi-account"></i><span>Perfil</span></a>
                <a class="dropdown-item" href="change-password.php"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Configuraciones</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php"><i class="dropdown-icon zmdi zmdi-power"></i><span>Cerrar Sesión</span></a>
            </div>
        </li>
    </ul>
</nav>