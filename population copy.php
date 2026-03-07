<?php

error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 0);
require('classes/resident.class.php');

// Initialize
$userdetails = $bmis->get_userdata();
$bmis->validate_admin();

// --- Connect to DB ---
include_once 'dbcon.php';

// --- Single resident if id_resident is provided ---
$resident = null;
if (isset($_GET['id_resident'])) {
    $id_resident = mysqli_real_escape_string($db_connection, $_GET['id_resident']);
    $query = "SELECT * FROM tbl_resident WHERE id_resident = '$id_resident'";
    $result = mysqli_query($db_connection, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        die("Resident not found.");
    }

    $resident = mysqli_fetch_assoc($result);
}

// --- Population Trends Analysis ---
$residentsData = mysqli_query($db_connection, "SELECT age, sex FROM tbl_resident");
$totalResidents = 0;
$maleCount = 0;
$femaleCount = 0;
$seniorCount = 0;

$residentList = []; // to display in table

while ($r = mysqli_fetch_assoc($residentsData)) {
    $totalResidents++;
    if (strtolower($r['sex']) === 'male') $maleCount++;
    if (strtolower($r['sex']) === 'female') $femaleCount++;
    if ($r['age'] >= 60) $seniorCount++;

    $residentList[] = $r; // store for table
}

// Simple population prediction: +2% growth
$predictedNextYear = round($totalResidents * 1.02);

?>

<?php include('dashboard_sidebar_start.php'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col text-center">
            <h1>Population Trends</h1>
        </div>
    </div>

    <hr><br>

    <!-- Population Summary Cards -->
    <div class="row text-center mb-4">
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Total Residents</h5>
                    <h3><?= $totalResidents ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Male Residents</h5>
                    <h3><?= $maleCount ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Female Residents</h5>
                    <h3><?= $femaleCount ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Predicted Next Year</h5>
                    <h3><?= $predictedNextYear ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Resident Details (optional) -->
    <?php if ($resident): ?>
        <div class="row mb-4">
            <div class="col">
                <div class="card border-info">
                    <div class="card-header bg-info text-white">Resident Details</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> <?= htmlspecialchars($resident['lname'] . ', ' . $resident['fname'] . ' ' . $resident['mi']) ?></p>
                        <p><strong>Age:</strong> <?= htmlspecialchars($resident['age']) ?></p>
                        <p><strong>Sex:</strong> <?= htmlspecialchars($resident['sex']) ?></p>
                        <p><strong>Address:</strong> <?= htmlspecialchars($resident['address'] ?? ($resident['houseno'] . ', ' . $resident['street'] . ', ' . $resident['brgy'] . ', ' . $resident['municipal'])) ?></p>
                        <p><strong>Contact:</strong> <?= htmlspecialchars($resident['contact']) ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($resident['email']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Residents Table -->
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-primary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // 2. Perform your separate SELECT query
                        $query = "SELECT id_resident, lname, fname, mi, age, sex, address, houseno, street, brgy, municipal, contact, email FROM tbl_resident";
                        $result = mysqli_query($db_connection, $query);

                        // 3. Loop through results and output table rows
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $r['id_resident'] . '</td>';
                                echo '<td>' . htmlspecialchars($r['lname'] . ', ' . $r['fname'] . ' ' . $r['mi']) . '</td>';
                                echo '<td>' . $r['age'] . '</td>';
                                echo '<td>' . $r['sex'] . '</td>';
                                echo '<td>' . htmlspecialchars($r['address'] ?? ($r['houseno'] . ', ' . $r['street'] . ', ' . $r['brgy'] . ', ' . $r['municipal'])) . '</td>';
                                echo '<td>' . htmlspecialchars($r['contact']) . '</td>';
                                echo '<td>' . htmlspecialchars($r['email']) . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7" class="text-center">No residents found.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include('dashboard_sidebar_end.php'); ?>
</body>

</html>