<?php
$conn = mysqli_connect("localhost", "root", "", "scrap");	// Only for local
//$conn = mysqli_connect("LOCALHOST", "USER", "PASSWORD", "DATABASE");

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;

//mysqli_close($conn);
if (@!isset($_SESSION["iduser_roll"]))
{
    @header("location: login.php");
}

