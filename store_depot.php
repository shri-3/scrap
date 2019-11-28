<?php
session_start();
require_once 'db/connect.php';
//Save
if(!empty(@$_POST['depotname'] && @$_POST['division'])) {
    $depotname = ucwords(trim(addslashes($_POST['depotname'])));
    $iddivision = ucwords(trim(addslashes($_POST['division'])));
    $sql = "select *  from depot where depot_name = '".$depotname."' and id_division ='".$iddivision."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0){
    $sql = "insert into depot(id_division, depot_name) values (" . $iddivision.",'".$depotname. "')";
    $result = mysqli_query($conn, $sql);
        echo "<script type='text/javascript'>
            alert('Your Depot Name has been saved successfully');
            window.location.href='add_depot.php';
            </script>";
    }else{
        echo "<script type='text/javascript'>
            alert('Your Depot Name has already used');
            window.location.href='add_depot.php';
            </script>";
    }


}

// Edit
if(!empty(@$_POST['depoid'] && @$_POST['depo_name']&& @$_POST['divisionid'])){
    $depoid = $_POST['depoid'];
    $divisionid = $_POST['divisionid'];
    $depo_name = $_POST['depo_name'];
    $sql = "update depot set id_division='".$divisionid."', depot_name='".$depo_name."' where id_depot=".$depoid;
    $query = mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>
        alert('Your Item Name has been Updated successfully');
        window.location.href='add_depot.php';
        </script>";
}elseif(!empty( @$_POST['itemid'])){
    header('location:edit_depot.php?id='.$_POST['itemid']);
}

//Delete
if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = "delete from depot where id_depot=".$id;
    $query = mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>
        alert('Your Depot has been Deleted successfully');
        window.location.href='add_depot.php';
        </script>";
}
