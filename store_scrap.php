<?php
session_start();
require_once 'db/connect.php';

//Save
if(!empty(@$_SESSION["id_users"] && @$_POST['itemlist'])) {
    $itemlist = ucwords(trim(addslashes($_POST['itemlist'])));
    $scrapname = ucwords(trim(addslashes($_POST['scrapname'])));
    $comp_name = ucwords(trim(addslashes($_POST['compname'])));
    $modelno = strtoupper (trim(addslashes($_POST['modelno'])));
    $serialno = strtoupper (trim(addslashes($_POST['serialno'])));
    date_default_timezone_set('Asia/Calcutta');
    $addtime= date("Y-m-d H:i:s");

    $sql = "insert into scrap(id_item_list, id_all_users, scrap_name, company_name, model_no, serial_no, created_at) values ('" . $itemlist . "','".$_SESSION["id_users"]."','".$scrapname."','".$comp_name."','".$modelno."','".$serialno."','".$addtime."');";
    $result = mysqli_query($conn, $sql);

    echo "<script type='text/javascript'>
            alert('Your Scrap has been submitted successfully');
            window.location.href='view_scrap.php';
          </script>";
}

//Update
if(!empty(@$_SESSION["id_users"] && @$_POST['scrap_id'] && @$_POST['item_list'])) {
    $item_list = ucwords(trim(addslashes($_POST['item_list'])));
    $scrap_name = ucwords(trim(addslashes($_POST['scrap_name'])));
    $comp_name = ucwords(trim(addslashes($_POST['comp_name'])));
    $model_no = strtoupper (trim(addslashes($_POST['model_no'])));
    $serial_no = strtoupper (trim(addslashes($_POST['serial_no'])));
    $scrap_id = strtoupper (trim(addslashes($_POST['scrap_id'])));

    $sql = "update scrap set id_item_list='".$item_list."', id_all_users='".$_SESSION["id_users"]."', scrap_name='".$scrap_name."', company_name='".$comp_name."', model_no='".$model_no."', serial_no='".$serial_no."' where id_scrap=".$scrap_id;
    $result = mysqli_query($conn, $sql);

    echo "<script type='text/javascript'>
            alert('Your Scrap has been Updated successfully');
            window.location.href='view_scrap.php';
          </script>";
}

//Delete
$id=$_GET['id'];
if (!empty(@$_SESSION["id_users"] && @$id)){
    $sql="delete from scrap where id_scrap=".$id;
    $query=mysqli_query($conn,$sql);

    echo "<script type='text/javascript'>
            alert('Your Scrap has been Deleted successfully');
            window.location.href='view_scrap.php';
          </script>";
}
