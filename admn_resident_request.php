<?php
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_WARNING);
include('classes/staff.class.php');
include('classes/resident.class.php');

$userdetails = $bmis->get_userdata();
$bmis->validate_admin();
$rescount = $residentbmis->count_resident();
$rescountm = $residentbmis->count_male_resident();
$rescountf = $residentbmis->count_female_resident();
$rescountfh = $residentbmis->count_head_resident();
$rescountfm = $residentbmis->count_member_resident();
$rescountvoter = $residentbmis->count_voters();
$rescountsenior = $residentbmis->count_resident_senior();

$staffcount = $staffbmis->count_staff();
$staffcountm = $staffbmis->count_mstaff();
$staffcountf = $staffbmis->count_fstaff();

$view = $residentbmis->view_request();
$residentbmis->create_resident();
$upreq = $residentbmis->approve_request();
$upstaff = $residentbmis->update_resident();
$residentbmis->reject_request();

$id_resident = $_GET['id_resident'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>East Modern Site Barangay Information System</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css?v=1" rel="stylesheet"> <!-- 
</head>

<body id="page-top">

<?php include('dashboard_sidebar_start.php'); ?>

<div class="container-fluid">

    <h1 class="mb-1 text-center">Pending Requests to Join</h1>
    <hr><br>

    <!-- Search Bar -->
    <div class="col-md-12">
        <form method="POST" action="">
            <div class="input-icons">
                <i class="fa fa-search icon"></i>
                <input type="search" class="form-control search" name="keyword" style="border-radius: 30px;" required>
            </div>
            <center>
                <button class="btn btn-success" name="search_resident">Search</button>
                <a href="admn_resident_crud.php" class="btn btn-info">Reload</a>
            </center>
        </form>
    </div>
    <?php include('flexbox.php'); ?>
    <br>
    <div class="table-responsive">
        <!-- Residents Table -->
        <table class="table table-hover table-bordered text-center">
            <thead class="alert-info">
                <tr>
                    <th>Actions</th>
                    <th>Control Number</th>
                    <th>Email</th>
                    <th>Surname</th>
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Contact #</th>
                    <th>Birth date</th>
                    <th>Birth place</th>
                    <th>Nationality</th>
                    <th>Family Head</th>
                    <th>More</th> <!-- ADDED -->
                </tr>
            </thead>

            <tbody>
                <?php if (is_array($view)) { ?>
                    <?php foreach ($view as $row) { ?>
                        <tr>
                            <td>
                                <form method="POST" action="" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="id_resident" value="<?= $row['id_resident']; ?>">
                                    <button type="submit" name="approve_request" class="btn btn-primary btn-sm">Approve</button>
                                    <button type="submit" name="reject_request" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            </td>
                            <td><?= $row['control_no']; ?></td>
                            <td><?= $row['email']; ?></td>

                            <td><?= $row['lname']; ?></td>
                            <td><?= $row['fname']; ?></td>
                            <td><?= $row['mi']; ?></td>
                            <td><?= $row['age']; ?></td>
                            <td><?= $row['sex']; ?></td>
                            <td><?= $row['houseno']; ?>, <?= $row['street']; ?>, <?= $row['brgy']; ?></td>
                            <td><?= $row['contact']; ?></td>
                            <td><?= $row['bdate']; ?></td>
                            <td><?= $row['bplace']; ?></td>
                            <td><?= $row['nationality']; ?></td>
                            <td><?= $row['head_of_family']; ?></td>

                            <td>
                                <!-- BUTTON TO OPEN MODAL -->
                                <button
                                    class="btn btn-info btn-sm"
                                    data-toggle="modal"
                                    data-target="#viewResidentModal<?= $row['id_resident']; ?>">
                                    View Details
                                </button>
                            </td>
                        </tr>

                        <!-- RESIDENT DETAILS MODAL -->
                        <div class="modal fade" id="viewResidentModal<?= $row['id_resident']; ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">Resident Registration Details</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>

                                    <div class="modal-body">

                                        <h5><b>Personal Information</b></h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-4"><b>Surname:</b> <?= $row['lname']; ?></div>
                                            <div class="col-md-4"><b>First Name:</b> <?= $row['fname']; ?></div>
                                            <div class="col-md-4"><b>Middle Name:</b> <?= $row['mi']; ?></div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-md-4"><b>Age:</b> <?= $row['age']; ?></div>
                                            <div class="col-md-4"><b>Sex:</b> <?= $row['sex']; ?></div>
                                            <div class="col-md-4"><b>Contact:</b> <?= $row['contact']; ?></div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-md-6"><b>Birthdate:</b> <?= $row['bdate']; ?></div>
                                            <div class="col-md-6"><b>Birthplace:</b> <?= $row['bplace']; ?></div>
                                        </div>

                                        <br>

                                        <h5><b>Address</b></h5>
                                        <hr>
                                        <p><?= $row['houseno']; ?>, <?= $row['street']; ?>, <?= $row['brgy']; ?></p>

                                        <br>

                                        <h5><b>Uploaded Valid IDs</b></h5>
                                        <hr>

                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <p><b>ID 1</b></p>
                                                <img src="uploads/validID/<?= $row['id1']; ?>"
                                                    class="img-fluid img-thumbnail"
                                                    style="max-height: 250px;">
                                            </div>

                                            <div class="col-md-6">
                                                <p><b>ID 2</b></p>
                                                <img src="uploads/validID/<?= $row['id2']; ?>"
                                                    class="img-fluid img-thumbnail"
                                                    style="max-height: 250px;">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END MODAL -->

                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>

    <?php include('dashboard_sidebar_end.php'); ?>

    </body>

</html>