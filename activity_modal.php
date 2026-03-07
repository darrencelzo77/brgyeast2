<?php
error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 1);
require('classes/resident.class.php');

$userdetails = $bmis->get_userdata();
$bmis->validate_admin();
$logs = $residentbmis->view_logs();



// Get ID of resident from URL parameter
$id_resident = $_GET['id_resident'];

?>

<?php
include('dashboard_sidebar_start.php');
?>

<style>
    .input-icons i {
        position: absolute;
    }

    .input-icons {
        width: 30%;
        margin-bottom: 10px;
        margin-left: 34%;
    }

    .icon {
        padding: 10px;
        min-width: 40px;
    }

    .form-control {
        text-align: center;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col text-center">
            <h1>Activity Logs</h1>
        </div>
    </div>
    <hr>
    <br><br>
    <div class="row">
        <div class="col">
            <form method="POST">
                <div class="input-icons">
                    <i class="fa fa-search icon"></i>
                    <input type="search" class="form-control" name="keyword" style="border-radius: 30px;" value="" required="" />
                </div>
                <button class="btn btn-success" name="search_certofindigency" style="width: 70px; font-size: 15px; border-radius:5px; margin-left:42%;">Search</button>
                <a href="admn_certofindigency.php" class="btn btn-info" style="width: 70px; font-size: 15px; border-radius:5px;">Reload</a>
            </form>
            <br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class="table table-hover text-center table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                <form action="" method="post">
                    <thead class="alert-info">
                        <tr>
                            <th style="width: 10%;">No.</th>
                            <th style="width: 40%;">Activity</th>
                            <th style="width: 35%;">User</th>
                            <th style="width: 30%;">Date and Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($logs)) : ?>
                        <?php $no = 1;
                        foreach ($logs as $row) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['activity'] ?></td>
                                <td><?= $row['admin_lname'] ?></td>
                                <td><?= date('F d, Y h:i:s A', strtotime($row['timestamp'])) ?></td>
                            </tr>
                        <?php $no++;
                        endforeach ?>
                    <?php endif ?>
                    </tbody>
                </form>
            </table>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<?php
include('dashboard_sidebar_end.php');
?>
