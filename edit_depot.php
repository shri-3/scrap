<?php require_once 'layouts/header.php'; ?>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add Item</div>
                    </div>
                    <?php
                    $id = $_GET['id'];
                    $sql = "select * from depot d left join division di on d.id_division = di.id_division where id_depot=".$id;
                    $query = mysqli_query($conn, $sql);
                    $rows = mysqli_fetch_array($query);
                    ?>
                    <div class="ibox-body">
                        <form action="store_depot.php" method="post">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input name="depoid" class="form-control" type="hidden" value="<?php echo $rows['id_depot']?>" placeholder="Item ID">
                                <input name="depo_name" class="form-control" type="text" value="<?php echo $rows['depot_name']?>" placeholder="Item Name">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Select Division</label>
                                <select name="divisionid" class="form-control select2_demo_1">
                                    <option value="">---Select Division---</option>
                                    <?php
                                    $sql = "select * from division order by division_name ASC";
                                    $query = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($query)){
                                        ?>
                                        <option value="<?php echo $row['id_division']?>"<?php if($row['id_division']==$rows['id_division']) {echo 'selected="selected" ';}?>>
                                            <?php echo $row['division_name']?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'layouts/footer.php'; ?>