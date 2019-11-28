<?php
session_start();
@include 'db/connect.php';

if (!isset($_SESSION["id_users"]))
{
    header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <?php
        $sqlp="select * from project_name order by id_project_name asc limit 1";
        $qryp=mysqli_query($conn, $sqlp);
        $rowp=mysqli_fetch_array($qryp);
    ?>
    <title><?php echo $rowp['project_name']?></title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="./assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
</head>
<body class="fixed-navbar">
    <div class="page-wrapper">
        <?php
            require_once 'nav-bar.php';
            require_once 'db/connect.php'
        ?>
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
