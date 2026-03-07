<?php

error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 0);
require('classes/resident.class.php');
//require('classes/main.class.php');

// Initialize
$userdetails = $bmis->get_userdata();
$bmis->validate_admin();

// Handle POST actions
$bmis->create_blotter_walkin();
$bmis->delete_blotter();

// Get data
$view = $residentbmis->view_blotter();
$id_blotter = isset($_GET['id_blotter']) ? $_GET['id_blotter'] : 0;

if ($id_blotter > 0) {
    $resident = $residentbmis->get_single_blotter($id_blotter);
}

?>

<?php
include('dashboard_sidebar_start.php');
?>

<style>
    .input-icons i {
        position: absolute;
    }

    .input-icons {
        width: 80%;
        margin-bottom: 10px;
        margin-left: auto;
        margin-right: auto;
    }

    .icon {
        padding: 10px;
        min-width: 40px;
    }

    .form-control {
        text-align: center;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col text-center">
            <h1>Peace and Order Report Data</h1>
        </div>
    </div>

    <hr>
    <br><br>

    <!-- Search Form -->
    <div class="row">
        <div class="col">
            <form method="POST" action="">
                <div class="input-icons">
                    <i class="fa fa-search icon"></i>
                    <input type="search" class="form-control" name="keyword" style="border-radius: 30px;" value="<?= isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : '' ?>" placeholder="Search by name, case number, or case type..." />
                </div>
                <button class="btn btn-success" style="width: 70px; font-size: 15px; border-radius:5px; margin-left:42%;" name="search_blotter">Search</button>
                <a href="admn_blotterreport.php" class="btn btn-info" style="width: 70px; font-size: 15px; border-radius:5px;">Reload</a>
            </form>
            <br>
        </div>
    </div>

    <br>

    <!-- Add Button and Modal -->
    <button class="btn btn-success" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#exampleModalCenter">
        <!-- <i class="fas fa-plus icon" style="padding-left: 0; padding-top: 0; padding-bottom: 0;"></i> Add -->
        Add
    </button>

    <!-- Add Blotter Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Complain Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <!-- Complainant Information -->
                        <h5>Complainant Information</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lname">Last name: *</label>
                                    <input name="lname" type="text" class="form-control" style="text-align:left;" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fname">First name: *</label>
                                    <input name="fname" type="text" class="form-control" style="text-align:left;" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mi">Middle initial:</label>
                                    <input name="mi" type="text" class="form-control" style="text-align:left;" maxlength="1">
                                </div>
                            </div>
                        </div>

                        <!-- Case Information -->
                        <h5>Case Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="case_name">Case Name/Type: *</label>
                                    <input name="case_name" type="text" class="form-control" style="text-align:left;" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="case_respondent">Respondent Name:</label>
                                    <input name="case_respondent" type="text" class="form-control" style="text-align:left;">
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact Number: *</label>
                                    <input name="contact" style="text-align:left;" type="text" maxlength="11" class="form-control" placeholder="09123456789" pattern="09[0-9]{9}" required>
                                    <small class="form-text text-muted">Format: 09XXXXXXXXX (11 digits)</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blot_photo">Upload Evidence (Optional):</label>
                                    <input type="file" class="form-control-file" name="blot_photo" accept="image/*,.pdf,.doc,.docx">
                                    <small class="form-text text-muted">Accepted: Images, PDF, Word docs</small>
                                </div>
                            </div>
                        </div>

                        <!-- Address Information -->
                        <h5>Address Information</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>House No: *</label>
                                    <input type="text" class="form-control" name="houseno" placeholder="Enter House No." style="text-align:left;" required>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Street: *</label>
                                    <input type="text" class="form-control" style="text-align:left;" name="street" placeholder="Enter Street" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Barangay:</label>
                                    <input type="text" class="form-control" name="brgy" value="East Modern Site" readonly style="background-color: #f8f9fa;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Municipality:</label>
                                    <input type="text" class="form-control" name="municipal" value="Bagiuo City" readonly style="background-color: #f8f9fa;">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Narrative Report -->
                        <h5>Narrative Report</h5>
                        <div class="alert alert-info">
                            <h6><i class="fas fa-info-circle"></i> Guidelines for Narrative Report:</h6>
                            <ul class="mb-0" style="font-size: 14px;">
                                <li>Use simple, everyday words rather than complex terminology.</li>
                                <li>Be specific in your report</li>
                                <li>Don't use inappropriate language</li>
                                <li>Provide clear and easy to read report</li>
                                <li>Don't use emojis or symbols</li>
                                <li>Include date, time, location, and sequence of events</li>
                            </ul>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="narrative">Narrative Report: *</label>
                                    <textarea class="form-control" rows="6" style="text-align:left;" id="narrative" name="narrative" placeholder="Please describe the incident in detail including date, time, location, and sequence of events..." required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer" style="justify-content: flex-start;">
                            <button type="submit" name="create_blotter_walkin" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Submit Report
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
// Risk analysis before table
$hourCounts = [];
$locationCounts = [];

if (!empty($view)) {
    foreach ($view as $record) {
        // Hour-based analysis
        $hour = date('H', strtotime($record['timeapplied']));
        $hourCounts[$hour] = ($hourCounts[$hour] ?? 0) + 1;

        // Location-based analysis
        $location = $record['street'] . ', ' . $record['brgy'];
        $locationCounts[$location] = ($locationCounts[$location] ?? 0) + 1;
    }

    arsort($hourCounts);
    arsort($locationCounts);

    $topHours = array_slice($hourCounts, 0, 3, true);
    $topLocations = array_slice($locationCounts, 0, 3, true);
}
?>

<!-- Risk Analysis Cards -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card border-primary shadow-sm">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-chart-line"></i> Top Risky Hours
            </div>
            <div class="card-body">
                <?php if (!empty($topHours)): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($topHours as $hour => $count): ?>
                            <li class="list-group-item">
                                <?= date('h:i A', strtotime($hour.':00')) ?> - <?= date('h:i A', strtotime($hour.':59')) ?>
                                <span class="badge badge-danger float-right"><?= $count ?> incidents</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No data available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-warning shadow-sm">
            <div class="card-header bg-warning text-dark">
                <i class="fas fa-map-marker-alt"></i> Top Risky Locations
            </div>
            <div class="card-body">
                <?php if (!empty($topLocations)): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($topLocations as $loc => $count): ?>
                            <li class="list-group-item">
                                <?= htmlspecialchars($loc) ?>
                                <span class="badge badge-danger float-right"><?= $count ?> incidents</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No data available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
    <!-- Blotter Records Table -->
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-primary">
                        <tr>
                            <th>Case No.</th>
                            <th>Complainant</th>
                            <th>Case Type</th>
                            <th>Respondent</th>
                            <th>Contact</th>
                            <th>Date Filed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Display blotter records
                        if (isset($_POST['search_blotter']) && !empty($_POST['keyword'])) {
                            // Display search results
                            include('admn_blotterreport_search.php');
                        } else {
                            // Display all records
                            if (!empty($view)) {
                                foreach ($view as $data) {
                        ?>
                                    <tr>
                                        <td><?= htmlspecialchars($data['case_no'] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($data['lname'] . ', ' . $data['fname'] . ' ' . $data['mi']) ?></td>
                                        <td><?= htmlspecialchars($data['case_name'] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($data['case_respondent'] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($data['contact']) ?></td>
                                        <td><?= date('M d, Y h:i A', strtotime($data['timeapplied'])) ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8" class="text-center">No blotter records found.</td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br>

<!-- JavaScript for Delete Confirmation -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delete confirmation
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this blotter record? This action cannot be undone.')) {
                    window.location.href = 'admn_blotterreport.php?delete_id=' + id;
                }
            });
        });

        // Contact number formatting
        const contactInput = document.querySelector('input[name="contact"]');
        if (contactInput) {
            contactInput.addEventListener('input', function(e) {
                this.value = this.value.replace(/\D/g, '');
                if (this.value.length > 11) {
                    this.value = this.value.slice(0, 11);
                }
            });
        }
    });
</script>

<?php
include('dashboard_sidebar_end.php');
?>
</body>

</html>