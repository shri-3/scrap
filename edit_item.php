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
                    $sql = "select * from item_list where id_item_list=".$id;
                    $query = mysqli_query($conn, $sql);
                    $rows = mysqli_fetch_array($query);
                    ?>
                    <div class="ibox-body">
                        <form action="store_item.php" method="post">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input name="itemid" class="form-control" type="hidden" value="<?php echo $id?>" placeholder="Item ID">
                                <input name="item_name" class="form-control" type="text" value="<?php echo $rows['item_name']?>" placeholder="Item Name">
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