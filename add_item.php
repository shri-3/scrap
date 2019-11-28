<?php require_once 'layouts/header.php'; ?>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add Item</div>
                    </div>
                    <div class="ibox-body">
                        <form action="store_item.php" method="post">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input name="itemname" class="form-control" type="text" placeholder="Item Name">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">All Items</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        $query="SELECT * FROM `item_list` ";
                        $fetch = mysqli_query($conn, $query);
                        if (mysqli_num_rows($fetch) > 0) {
                            while ($row = mysqli_fetch_array($fetch)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['item_name']?></td>
                                    <td>
                                        <a href="edit_item.php?id=<?php echo $row['id_item_list']?>">
                                            <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                                        </a>
                                        <a href="store_item.php?id=<?php echo $row['id_item_list']?>">
                                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php }} else{?>
                            <tr>
                                <td colspan="2" style="text-align: center;"><h3>No Record</h3></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'layouts/footer.php'; ?>