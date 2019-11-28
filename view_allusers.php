<?php require_once 'layouts/header.php'; ?>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">All Division & Depot User</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Division Name</th>
                        <th>Depot Name</th>
                        <th>User Type</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Division Name</th>
                        <th>Depot Name</th>
                        <th>User Type</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $sql="SELECT au.id_all_users, au.user_name, au.password, au.created_at, di.division_name, de.depot_name, ur.user_roll_name
                            FROM all_users au LEFT JOIN user_roll ur ON ur.id_user_roll=au.id_user_roll
                            LEFT JOIN division di on di.id_division=au.id_division LEFT JOIN depot de ON de.id_depot=au.id_depot";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $row['user_name']?></td>
                                <td><?php echo $row['password']?></td>
                                <td><?php echo $row['division_name']?></td>
                                <td><?php echo($row['depot_name'] != NULL) ? $row['depot_name'] : 'N/A' ?></td>
                                <td><?php echo $row['user_roll_name']?></td>
                                <td><?php $date = date_create($row['created_at']); echo date_format($date, 'd M y, D, H:i')?></td>
                                <td>
                                    <a href="store_d_users.php?id=<?php echo $row['id_all_users']?>">
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
<?php require_once 'layouts/footer.php'; ?>