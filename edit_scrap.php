<?php require_once 'layouts/header.php'; ?>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add scrap</div>
                    </div>
                    <?php
                    $id=$_GET['id'];
                    $query="SELECT s.id_scrap, s.scrap_name, s.company_name, s.model_no, s.serial_no, il.id_item_list, il.item_name, au.user_name, di.division_name, de.depot_name 
                            FROM scrap s LEFT JOIN item_list il ON il.id_item_list=s.id_item_list left JOIN all_users au on au.id_all_users=s.id_all_users 
                            LEFT JOIN division di on di.id_division=au.id_division LEFT JOIN depot de ON de.id_depot=au.id_depot where s.id_scrap=".$id;
                    $fetch = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($fetch)
                    ?>
                    <div class="ibox-body">
                        <form action="store_scrap.php" method="post">
                            <div class="form-group">
                                <label>Scrap Item Name</label>
                                <input name="scrap_id" class="form-control" value="<?php echo $row['id_scrap']?>" type="hidden" placeholder="Scrap Item Name">
                                <input name="scrap_name" class="form-control" value="<?php echo $row['scrap_name']?>" type="text" placeholder="Scrap Item Name">
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input name="comp_name" class="form-control" value="<?php echo $row['company_name']?>" type="text" placeholder="Company Name">
                            </div>
                            <div class="form-group">
                                <label>Serial No</label>
                                <input name="serial_no" class="form-control" value="<?php echo $row['serial_no']?>" type="text" placeholder="Serial No">
                            </div>
                            <div class="form-group">
                                <label>Model No</label>
                                <input name="model_no" class="form-control" value="<?php echo $row['model_no']?>" type="text" placeholder="Model No">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Item List</label>
                                <select name="item_list" class="form-control select2_demo_2">
                                    <option value="">---Select Item---</option>
                                    <?php
                                    $sql = "select * from item_list";
                                    $query = mysqli_query($conn, $sql);
                                    while($rows=mysqli_fetch_array($query)){
                                        ?>
                                        <option value="<?php echo $rows['id_item_list']?>"<?php if($rows['id_item_list']==$row['id_item_list']){echo 'selected="selected" ';}?>><?php echo $rows['item_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'layouts/footer.php'; ?>