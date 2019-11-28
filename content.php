<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-success color-white widget-stat">
            <div class="ibox-body">
                <?php
                    $sqls = "select * from scrap";
                    $qrys = mysqli_query($conn, $sqls);
                    $rows = mysqli_num_rows($qrys);
                ?>
                <h2 class="m-b-5 font-strong"><?php echo $rows?></h2>
                <div class="m-b-5">Total Scrap</div><i class="ti-shopping-cart widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-info color-white widget-stat">
            <div class="ibox-body">
                <?php
                $sqldi = "select * from division";
                $qrydi = mysqli_query($conn, $sqldi);
                $rowdi = mysqli_num_rows($qrydi);
                ?>
                <h2 class="m-b-5 font-strong"><?php echo $rowdi?></h2>
                <div class="m-b-5">Total Divison</div><i class="ti-bar-chart widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-warning color-white widget-stat">
            <div class="ibox-body">
                <?php
                $sqld = "select * from depot";
                $qryd = mysqli_query($conn, $sqld);
                $rowd = mysqli_num_rows($qryd);
                ?>
                <h2 class="m-b-5 font-strong"><?php echo $rowd?></h2>
                <div class="m-b-5">TOTAL Depot</div><i class="fa fa-money widget-stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-danger color-white widget-stat">
            <div class="ibox-body">
                <?php
                $sqlu = "select * from all_users";
                $qryu = mysqli_query($conn, $sqlu);
                $rowu = mysqli_num_rows($qryu);
                ?>
                <h2 class="m-b-5 font-strong"><?php echo $rowu?></h2>
                <div class="m-b-5">Total USERS</div><i class="ti-user widget-stat-icon"></i>
            </div>
        </div>
    </div>
</div>