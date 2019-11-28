<!-- START SIDEBAR-->
<?php
$value = basename($_SERVER['PHP_SELF']);
switch ($value) {
    case 'add_item.php':
        $a='class="active"';
        break;
    case 'add_scrap.php':
        $b='class="active"';
        break;
    case 'view_scrap.php':
        $c='class="active"';
        break;
    case 'add_depot.php':
        $d='class="active"';
        break;
    case 'add_division.php':
        $e='class="active"';
        break;
    case 'add_dusers.php':
        $f='class="active"';
        break;
    case 'add_divi_users.php':
        $g='class="active"';
        break;
    case 'view_allusers.php':
        $h='class="active"';
        break;
}
?>

<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/admin-avatar.png" width="45px" />
            </div>
            <?php
                $sqlz = "select * from user_roll where id_user_roll=".$_SESSION["iduser_roll"];
                $queryz = mysqli_query($conn, $sqlz);
                $rowz = mysqli_fetch_array($queryz);
            ?>
            <div class="admin-info">
                <div class="font-strong"><?php echo ucwords(strtolower($_SESSION["user_name"]))?></div><small><?php echo $rowz['user_roll_name']?></small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="<?php echo $p ?>"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>

            <li <?php echo (@$b)? @$b : @$c; ?>>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Scrap</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <?php if ($_SESSION["iduser_roll"]!=1){?>
                    <li>
                        <a <?php echo @$b; ?> href="add_scrap.php">Add Scrap</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a <?php echo @$c; ?> href="view_scrap.php">All Scrap</a>
                    </li>
                </ul>
            </li>
            <?php if ($_SESSION["iduser_roll"]==1){?>
            <li <?php echo @$a; ?>>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Item List</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a <?php echo @$a; ?> href="add_item.php">Create Item</a>
                    </li>
                </ul>
            </li>
            <li <?php echo @$d; ?>>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Depot</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a <?php echo @$d; ?> href="add_depot.php">Add Depot</a>
                    </li>
                </ul>
            </li>
            <li <?php echo @$e; ?>>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Division</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a <?php echo @$e; ?> href="add_division.php">Create Division</a>
                    </li>
                </ul>
            </li>
            <li <?php echo @$f ? @$f : (@$g ? @$g : @$h); ?>>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-user"></i>
                    <span class="nav-label">Users</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a <?php echo @$f; ?> href="add_dusers.php">Create Depot User</a>
                    </li>
                    <li>
                        <a <?php echo @$g; ?> href="add_divi_users.php">Create Division User</a>
                    </li>
                    <li>
                        <a <?php echo @$h; ?> href="view_allusers.php">All Depot & Division Users</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
