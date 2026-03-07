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
$femalesReproductiveAge = 0; // age 15-49
$residentList = []; // for table display

while ($r = mysqli_fetch_assoc($residentsData)) {
    $totalResidents++;
    $sexLower = strtolower($r['sex']);
    if ($sexLower === 'male') $maleCount++;
    if ($sexLower === 'female') {
        $femaleCount++;
        if ($r['age'] >= 15 && $r['age'] <= 49) $femalesReproductiveAge++;
    }
    if ($r['age'] >= 60) $seniorCount++;

    $residentList[] = $r;
}

// --- Simple population prediction for next year ---
$birthRatePer100Women = 5;   // 5 new residents per 100 reproductive-age women per year
$deathRatePer100Seniors = 3; // 3 deaths per 100 seniors per year

$predictedNextYear = $totalResidents + round(($femalesReproductiveAge * $birthRatePer100Women) / 100)
                                  - round(($seniorCount * $deathRatePer100Seniors) / 100);

// --- 5-Year Population Projection ---
$populationProjection = [];
$currentPopulation = $totalResidents;
for ($year = 1; $year <= 5; $year++) {
    $predictedBirths = round(($femalesReproductiveAge * $birthRatePer100Women) / 100);
    $predictedDeaths = round(($seniorCount * $deathRatePer100Seniors) / 100);
    $currentPopulation = $currentPopulation + $predictedBirths - $predictedDeaths;
    $populationProjection[] = $currentPopulation;
}

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

    <!-- 5-Year Population Trend Chart -->
    <div class="row mb-5">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Population Projection (Next 5 Years)
                </div>
                <div class="card-body">
                    <canvas id="populationChart" height="100"></canvas>
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
                        $query = "SELECT id_resident, lname, fname, mi, age, sex, address, houseno, street, brgy, municipal, contact, email FROM tbl_resident";
                        $result = mysqli_query($db_connection, $query);

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

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('populationChart').getContext('2d');
    const populationChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Year 1', 'Year 2', 'Year 3', 'Year 4', 'Year 5'],
            datasets: [{
                label: 'Predicted Population',
                data: <?= json_encode($populationProjection) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    title: {
                        display: true,
                        text: 'Number of Residents'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Years'
                    }
                }
            }
        }
    });
</script>

</body>
</html>
