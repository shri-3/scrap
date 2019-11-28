<!DOCTYPE html>
<?php
$conn = mysqli_connect("localhost", "root", "", "scrap");	// Only for local
$sqlp="select * from project_name order by id_project_name asc limit 1";
$qryp=mysqli_query($conn, $sqlp);
$rowp=mysqli_fetch_array($qryp);
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">

    <title><?php echo $rowp['project_name']?></title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
<div class="content">
    <div class="brand" style="margin-top: 25%"></div>
    <div class="brand">
        <a class="link">Division & Depot</a>
    </div>
    <form id="login-form" action="login_action.php" method="post">
        <h2 class="login-title">Log in</h2>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                <input class="form-control" type="text" name="uname" placeholder="User Name" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                <input class="form-control" type="password" name="upass" placeholder="Password">
            </div>
        </div>
        <div class="form-group d-flex justify-content-between">

            <?php
            if(isset($_REQUEST['message']) &&  $_REQUEST['message']){
                $msg= 'Invalid User id or Password !';
                // echo "<div class='alert-box error'>";
                echo "<div style='color: #D1382E;'>"."$msg"."</div>";
                // echo "</div>";
            }
            ?>
        </div>
        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">Login</button>
        </div>
        <div class="social-auth-hr">
            <span>Or Admin</span>
        </div>
        <div class="text-center">For Admin member?
            <a class="color-blue" href="admin_login.php">Login</a>
        </div>
    </form>

</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS -->
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS -->
<script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="assets/js/app.js" type="text/javascript"></script>

</body>

</html>