<?php
session_start();
require_once 'db/connect.php';
//Save
if(!empty($_POST['divisionname'])) {
    $division = ucwords(trim(addslashes($_POST['divisionname'])));
    $sql = "select * from division where division_name='".$division."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0){
    $sql = "insert into division(division_name) values ('" . $division . "')";
    $result = mysqli_query($conn, $sql);

    echo "<script type='text/javascript'>
        alert('Your Division has been submitted successfully');
        window.location.href='add_division.php';
        </script>";
    }else{
        echo "<script type='text/javascript'>
        alert('This Division name has already used');
        window.location.href='add_division.php';
        </script>";
    }
}

// Edit
if(!empty(@$_POST['divisionid'] && @$_POST['division_name'])){
    $id = $_POST['divisionid'];
    $divisionname = $_POST['division_name'];
    $sql = "update division set division_name='".$divisionname."' where id_division=".$id;
    $query = mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>
        alert('Your Division has been Updated successfully');
        window.location.href='add_division.php';
        </script>";
}

//Delete
if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = "delete from division where id_division=".$id;
    $query = mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>
        alert('Your Division has been Deleted successfully');
        window.location.href='add_division.php';
        </script>";
}
