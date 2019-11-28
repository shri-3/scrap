<?php
session_start();
require_once 'db/connect.php';

//Save
if(!empty(@$_SESSION["id_users"] && @$_POST['namedepot'])) {
    @$depot = trim(addslashes($_POST['depot']));
    $division = trim(addslashes($_POST['division']));
    $namedepot = trim(addslashes($_POST['namedepot']));
    $password = trim(addslashes($_POST['password']));
    $roll = $_POST["rollid"];
    date_default_timezone_set('Asia/Calcutta');
    $addtime= date("Y-m-d H:i:s");
// Check if user name match then exit
    $sqlcheck = "select * from all_users where user_name='".$namedepot."'";
    $results = mysqli_query($conn, $sqlcheck);

    if (mysqli_num_rows($results) == 0) {
        // if depot id not found go to next query.
        if (!empty($depot)) {
            $sql = "insert into all_users(id_division, id_depot, id_user_roll, user_name, password, created_at) values ('" . $division . "','" . $depot . "','" . $roll . "','" . $namedepot . "','" . $password . "','".$addtime."');";
        }else{
            $sql = "insert into all_users(id_division, id_user_roll, user_name, password, created_at) values ('" . $division . "','" . $roll . "','" . $namedepot . "','" . $password . "','".$addtime."');";
        }
        $result = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>
                alert('Your Scrap has been submitted successfully');
                window.location.href='view_allusers.php';
              </script>";
    }else{
        // if depot id not found.
        if (!empty($depot)){
            echo "<script type='text/javascript'>
                alert('User Name is ALREADY USED');
                window.location.href='add_dusers.php';
              </script>";
        }else{
            echo "<script type='text/javascript'>
                alert('User Name is ALREADY USED');
                window.location.href='add_divi_users.php';
              </script>";
        }
    }
}

//Delete
if(!empty(@$_SESSION["id_users"] && @$_GET['id'])) {
    $sql = "delete from all_users where id_all_users=".$_GET['id'];
    $query = mysqli_query($conn, $sql);
    echo "<script type='text/javascript'>
            alert('Your Scrap has been submitted successfully');
            window.location.href='view_allusers.php';
          </script>";
}
