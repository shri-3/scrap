<?php  session_start();
include 'db/connect.php';
$name=$_POST['uname'];
$pass=$_POST['upass'];
@$a_id=$_POST['a_id'];

if (empty($a_id)){
    $sql="select * from all_users where  BINARY user_name= BINARY '$name' and BINARY password= BINARY '$pass'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);

    if(is_array($rows)) {
        @$_SESSION["id_users"] = $rows['id_all_users'];
        @$_SESSION["user_name"] = $rows['user_name'];
        @$_SESSION["iduser_roll"] = $rows['id_user_roll'];
        @$_SESSION["id_depot"] = $rows['id_depot'];
        @$_SESSION["id_division"] = $rows['id_division'];

        header("Location:view_scrap.php");

    }else {
        $message = "Invalid Username or Password!";
        header('Location: login.php?message=1');
    }
}

if (!empty($a_id)){
    echo $sqla="select * from admin where  BINARY admin_name= BINARY '$name' and BINARY password= BINARY '$pass'";

    $results = mysqli_query($conn, $sqla);
    $row = mysqli_fetch_array($results);

    if(is_array($row)) {
        @$_SESSION["id_users"] = $row['id_admin'];
        @$_SESSION["user_name"] = $row['admin_name'];
        @$_SESSION["iduser_roll"] = $row['id_user_roll'];

        header("Location:index.php");

    }else {
        $message = "Invalid Username or Password!";
        header('Location: admin_login.php?message=1');
    }
}