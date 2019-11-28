<?php require_once 'layouts/header.php'; ?>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add Division</div>
                    </div>
                    <?php
                        $id = $_GET['id'];
                        $sql = "select * from division where id_division=".$id;
                        $query = mysqli_query($conn, $sql);
                        $rows = mysqli_fetch_array($query);
                    ?>
                    <div class="ibox-body">
                        <form action="store_division.php" method="post">
                            <div class="form-group">
                                <label>Division Name</label>
                                <input name="divisionid" class="form-control" type="hidden" value="<?php echo $id?>" placeholder="Division Name">
                                <input name="division_name" class="form-control" type="text" value="<?php echo $rows['division_name']?>" placeholder="Division Name">
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