<?php require_once 'layouts/header.php'; ?>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">All Scrap</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Scrap Name</th>
                        <th>Company Name</th>
                        <th>Model No</th>
                        <th>Serial No</th>
                        <th>Item Name</th>
                        <th>User Name</th>
                        <th>Division</th>
                        <th>Depot</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Scrap Name</th>
                        <th>Company Name</th>
                        <th>Model No</th>
                        <th>Serial No</th>
                        <th>Item Name</th>
                        <th>User Name</th>
                        <th>Division</th>
                        <th>Depot</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    // session user id
                    $s_u=$_SESSION["id_users"];
                    // session user roll
                    $s_ur=$_SESSION["iduser_roll"];
                    $qry="where au.id_all_users=".$s_u;
                    $x = (($s_ur=='2')||($s_ur=='3')) ? $qry : ';';
                    $query="SELECT s.id_scrap, s.scrap_name, s.company_name, s.model_no, s.serial_no, s.created_at, il.item_name, au.user_name, di.division_name, de.depot_name 
                            FROM scrap s LEFT JOIN item_list il ON il.id_item_list=s.id_item_list left JOIN all_users au on au.id_all_users=s.id_all_users LEFT JOIN division di 
                            on di.id_division=au.id_division LEFT JOIN depot de ON de.id_depot=au.id_depot LEFT JOIN user_roll ur ON ur.id_user_roll=au.id_user_roll ".$x;
                    $fetch = mysqli_query($conn, $query);
                    if (mysqli_num_rows($fetch) > 0) {
                        while ($row = mysqli_fetch_array($fetch)) {
                            ?>
                            <tr>
                                <td><?php echo $row['scrap_name']?></td>
                                <td><?php echo $row['company_name']?></td>
                                <td><?php echo $row['model_no']?></td>
                                <td><?php echo $row['serial_no']?></td>
                                <td><?php echo $row['item_name']?></td>
                                <td><?php echo $row['user_name']?></td>
                                <td><?php echo $row['division_name']?></td>
                                <td><?php echo ($row['depot_name'] !=NULL) ? $row['depot_name'] : 'N/A'?></td>
                                <td><?php $date = date_create($row['created_at']); echo date_format($date, 'd M y, D, H:i')?></td>
                                <td>
                                    <?php if ($_SESSION["iduser_roll"]!=1){?>
                                    <a href="edit_scrap.php?id=<?php echo $row['id_scrap']?>">
                                        <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                                    </a>
                                    <?php } ?>
                                    <a href="store_scrap.php?id=<?php echo $row['id_scrap']?>">
                                        <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php }} else{?>
                        <tr>
                            <td colspan="10" style="text-align: center;"><h3>No Record</h3></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once 'layouts/footer.php'; ?>