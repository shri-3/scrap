<?php
session_start();
require_once 'db/connect.php';
//Save
if(!empty($_POST['itemname'])) {
    $itemname = ucwords(trim(addslashes($_POST['itemname'])));
    $sql = "select * from item_list where item_name = '".$itemname."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0){
    $sql = "insert into item_list(item_name) values ('" . $itemname . "')";
    $result = mysqli_query($conn, $sql);

    echo "<script type='text/javascript'>
        alert('Your Item has been submitted successfully');
        window.location.href='add_item.php';
        </script>";
    }else{
        echo "<script type='text/javascript'>
        alert('This Item has all already Present');
        window.location.href='add_item.php';
        </script>";
    }
}

// Edit
if(!empty(@$_POST['itemid'] && @$_POST['item_name'])){
    $itemid = $_POST['itemid'];
    $itemnname = $_POST['item_name'];
    $sql = "update item_list set item_name='".$itemnname."' where id_item_list=".$itemid;
    $query = mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>
        alert('Your Item Name has been Updated successfully');
        window.location.href='add_item.php';
        </script>";
}elseif(!empty( @$_POST['itemid'])){
    header('location:edit_item.php?id='.$_POST['itemid']);
}

//Delete
if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = "delete from item_list where id_item_list=".$id;
    $query = mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>
        alert('Your Item has been Deleted successfully');
        window.location.href='add_item.php';
        </script>";
}
