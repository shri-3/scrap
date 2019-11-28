<?php require_once 'layouts/header.php'; ?>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add New Depot</div>
                    </div>
                    <div class="ibox-body">
                        <form action="store_d_users.php" method="post">
                            <div class="form-group">
                                <label>User Name</label>
                                <input name="rollid" class="form-control" value="2" type="hidden" placeholder="Name">
                                <input name="namedepot" class="form-control" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" type="Password" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label ">Select Division</label>
                                <select name="division" class="form-control select2_demo_2" onChange="getState(this.value);">
                                    <option value="">---Select Division---</option>
                                    <?php
                                    $sql1 = "select * from division";
                                    $query1 = mysqli_query($conn, $sql1);
                                    while($rows1=mysqli_fetch_array($query1)){
                                        ?>
                                        <option value="<?php echo $rows1['id_division']?>"><?php echo $rows1['division_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Select Depot</label>
                                <select name="depot" id="state-list" class="form-control select2_demo_2">
                                    <option  value="">---Select Depot---</option>
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