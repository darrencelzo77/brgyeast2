<?php
error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 0);
require('classes/resident.class.php');

$userdetails = $bmis->get_userdata();
$bmis->validate_admin();
include_once 'dbcon.php';

// Single resident if provided
$resident = null;
if (isset($_GET['id_resident'])) {
    $id_resident = mysqli_real_escape_string($db_connection, $_GET['id_resident']);
    $query = "SELECT * FROM tbl_resident WHERE id_resident = '$id_resident'";
    $result = mysqli_query($db_connection, $query);
    if (!$result || mysqli_num_rows($result) == 0) die("Resident not found.");
    $resident = mysqli_fetch_assoc($result);
}

// --- Fetch all residents ---
$residentsData = mysqli_query($db_connection, "SELECT * FROM tbl_resident");
$residentList = [];
$totalResidents = 0;
$maleCount = 0;
$femaleCount = 0;
$seniorCount = 0;
$ageGroups = ['0-14' => 0, '15-49' => 0, '50-59' => 0, '60+' => 0];
$requestStatusCounts = ['approved' => 0, 'pending' => 0, 'denied' => 0];

// Social program counters
$pwdCount = $fourPsCount = $seniorFlagCount = $singleParentCount = $outOfSchoolYouth = 0;

while ($r = mysqli_fetch_assoc($residentsData)) {
    // --- Data Cleaning ---
    $r['age'] = is_numeric($r['age']) ? intval($r['age']) : 0;
    $r['sex'] = ucfirst(strtolower(trim($r['sex'])));
    $r['pwd'] = strtolower($r['pwd']) === 'yes' ? 1 : 0;
    $r['four_ps'] = strtolower($r['four_ps']) === 'yes' ? 1 : 0;
    $r['senior_citizen'] = strtolower($r['senior_citizen']) === 'yes' ? 1 : 0;
    $r['single_parent'] = strtolower($r['single_parent']) === 'yes' ? 1 : 0;
    $r['out_of_school_youth'] = strtolower($r['out_of_school_youth']) === 'yes' ? 1 : 0;
    $r['request_status'] = strtolower(trim($r['request_status']));

    // --- Data Augmentation ---
    $r['is_reproductive'] = ($r['sex'] === 'Female' && $r['age'] >= 15 && $r['age'] <= 49) ? 1 : 0;
    if ($r['age'] <= 14) $ageGroups['0-14']++;
    elseif ($r['age'] <= 49) $ageGroups['15-49']++;
    elseif ($r['age'] <= 59) $ageGroups['50-59']++;
    else $ageGroups['60+']++;

    if (isset($requestStatusCounts[$r['request_status']])) $requestStatusCounts[$r['request_status']]++;

    // --- Update counters for predictions ---
    $totalResidents++;
    if ($r['sex'] === 'Male') $maleCount++;
    if ($r['sex'] === 'Female') $femaleCount++;
    if ($r['age'] >= 60) $seniorCount++;
    $pwdCount += $r['pwd'];
    $fourPsCount += $r['four_ps'];
    $seniorFlagCount += $r['senior_citizen'];
    $singleParentCount += $r['single_parent'];
    $outOfSchoolYouth += $r['out_of_school_youth'];

    $residentList[] = $r;
}

// --- Multiple Predictions ---
$birthRatePer100Women = 5;
$deathRatePer100Seniors = 3;

$predictedNextYearPopulation = $totalResidents
    + round(array_sum(array_column($residentList, 'is_reproductive')) * $birthRatePer100Women / 100)
    - round($seniorCount * $deathRatePer100Seniors / 100);

$predictedPWD = round($pwdCount * 1.02);
$predictedFourPs = round($fourPsCount * 1.01);
$predictedSeniors = round($seniorFlagCount * 1.01);
$predictedSingleParents = round($singleParentCount * 1.01);
$predictedOutOfSchoolYouth = round($outOfSchoolYouth * 0.98);

// 5-Year population projection
$populationProjection = [];
$currentPopulation = $totalResidents;
for ($year = 1; $year <= 5; $year++) {
    $predictedBirths = round(array_sum(array_column($residentList, 'is_reproductive')) * $birthRatePer100Women / 100);
    $predictedDeaths = round($seniorCount * $deathRatePer100Seniors / 100);
    $currentPopulation = $currentPopulation + $predictedBirths - $predictedDeaths;
    $populationProjection[] = $currentPopulation;
}

?>

<?php include('dashboard_sidebar_start.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <h1>Population & Social Program Analytics</h1>
        </div>
    </div>
    <hr><br>

    <!-- Population & Social Program Cards -->
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
                    <h5>Predicted Population Next Year</h5>
                    <h3><?= $predictedNextYearPopulation ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Program Predictions -->
    <div class="row text-center mb-4">
        <div class="col-md-2">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>PWD</h5>
                    <h3><?= $predictedPWD ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5>4Ps</h5>
                    <h3><?= $predictedFourPs ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5>Senior Citizens</h5>
                    <h3><?= $predictedSeniors ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Single Parents</h5>
                    <h3><?= $predictedSingleParents ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Out-of-School Youth</h5>
                    <h3><?= $predictedOutOfSchoolYouth ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-secondary text-white">Population Projection (5 Years)</div>
                <div class="card-body"><canvas id="populationChart"></canvas></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Social Programs Projection</div>
                <div class="card-body"><canvas id="socialProgramsChart"></canvas></div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">Age Group Distribution</div>
                <div class="card-body"><canvas id="ageGroupChart"></canvas></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">Request Status Distribution</div>
                <div class="card-body"><canvas id="requestStatusChart"></canvas></div>
            </div>
        </div>
    </div>

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
                        } else echo '<tr><td colspan="7" class="text-center">No residents found.</td></tr>';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('dashboard_sidebar_end.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const populationProjection = <?= json_encode($populationProjection) ?>;
    const socialPrograms = {
        labels: ['PWD', '4Ps', 'Seniors', 'Single Parents', 'Out-of-School Youth'],
        data: [<?= $predictedPWD ?>, <?= $predictedFourPs ?>, <?= $predictedSeniors ?>, <?= $predictedSingleParents ?>, <?= $predictedOutOfSchoolYouth ?>]
    };
    const ageGroupLabels = <?= json_encode(array_keys($ageGroups)) ?>;
    const ageGroupData = <?= json_encode(array_values($ageGroups)) ?>;
    const requestStatusLabels = <?= json_encode(array_keys($requestStatusCounts)) ?>;
    const requestStatusData = <?= json_encode(array_values($requestStatusCounts)) ?>;

    // Population Line Chart
    new Chart(document.getElementById('populationChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: ['Year 1', 'Year 2', 'Year 3', 'Year 4', 'Year 5'],
            datasets: [{
                label: 'Predicted Population',
                data: populationProjection,
                backgroundColor: 'rgba(54,162,235,0.2)',
                borderColor: 'rgba(54,162,235,1)',
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

    // Social Programs Bar Chart
    new Chart(document.getElementById('socialProgramsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: socialPrograms.labels,
            datasets: [{
                label: 'Predicted Count Next Year',
                data: socialPrograms.data,
                backgroundColor: ['#FFC107', '#6C757D', '#343A40', '#17A2B8', '#28A745']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Count'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Program'
                    }
                }
            }
        }
    });

    // Age Group Pie Chart
    new Chart(document.getElementById('ageGroupChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ageGroupLabels,
            datasets: [{
                data: ageGroupData,
                backgroundColor: ['#007BFF', '#28A745', '#FFC107', '#DC3545']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Request Status Bar Chart
    new Chart(document.getElementById('requestStatusChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: requestStatusLabels,
            datasets: [{
                label: 'Residents',
                data: requestStatusData,
                backgroundColor: ['#28A745', '#FFC107', '#DC3545']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Count'
                    }
                }
            }
        }
    });
</script>