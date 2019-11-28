<?php require_once 'layouts/header.php'; ?>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add scrap</div>
                    </div>
                    <div class="ibox-body">
                        <form action="store_scrap.php" method="post">
                            <div class="form-group">
                                <label>Scrap Item Name</label>
                                <input name="scrapname" class="form-control" type="text" placeholder="Scrap Item Name">
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input name="compname" class="form-control" type="text" placeholder="Company Name">
                            </div>
                            <div class="form-group">
                                <label>Serial No</label>
                                <input name="serialno" class="form-control" type="text" placeholder="Serial No">
                            </div>
                            <div class="form-group">
                                <label>Model No</label>
                                <input name="modelno" class="form-control" type="text" placeholder="Model No">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Item List</label>
                                <select name="itemlist" class="form-control select2_demo_2">
                                    <option value="">---Select Item---</option>
                                    <?php
                                    $sql = "select * from item_list";
                                    $query = mysqli_query($conn, $sql);
                                    while($rows=mysqli_fetch_array($query)){
                                        ?>
                                        <option value="<?php echo $rows['id_item_list']?>"><?php echo $rows['item_name']?></option>
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