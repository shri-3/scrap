<?php
session_start();
$_SESSION['url'] = basename($_SERVER['REQUEST_URI']);
unset($_SESSION["id_users"]);
unset($_SESSION["user_name"]);
unset($_SESSION["id_depot"]);
unset($_SESSION["id_division"]);
session_destroy();
if (($_SESSION['iduser_roll']=='2') || ($_SESSION['iduser_roll']=='3')){
    unset($_SESSION["iduser_roll"]);
header('Location: login.php');
}else{
    unset($_SESSION["iduser_roll"]);
    header('Location: admin_login.php');
}
