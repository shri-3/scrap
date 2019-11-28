<?php
session_start();
include 'db/connect.php';
if (!empty($_POST['country_id'])){
$countryId = $_POST["country_id"];
$sql = "select * from depot where id_division=".$countryId;
$query = mysqli_query($conn, $sql);
?>

    <option value="">---Select Depot---</option>
<?php while($rows=mysqli_fetch_array($query)){ ?>
    <option value="<?php echo $rows['id_depot']?>"><?php echo $rows['depot_name']?></option>
<?php } } ?>

