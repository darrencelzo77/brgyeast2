<?php
// require the database connection
require 'classes/conn.php';
$bmis->delete_certofres();
if (isset($_POST['search_certofres'])) {
    $keyword = $_POST['keyword'];
?>
    <table class="table table-hover text-center table-bordered table-responsive">
        <thead class="alert-info">

            <tr>
                <th> Actions</th>
                <th>Certificate / Clearance</th>
                <th> Surname </th>
                <th> First name </th>
                <th> Middle name </th>
                <th> Age </th>
                <th> Address</th>
                <th> Nationality </th>
            </tr>
        </thead>

        <tbody>
            <?php
            $stmnt = $conn->prepare("SELECT * FROM `tbl_resident` WHERE `lname` LIKE '%$keyword%' OR `fname` LIKE '%$keyword%' OR `email` LIKE '%$keyword%' OR `mi` LIKE '%$keyword%' OR `age` LIKE '%$keyword%' OR `houseno` LIKE '%$keyword%' OR `street` LIKE '%$keyword%' OR `nationality` LIKE '%$keyword%'");
            $stmnt->execute();

            while ($search = $stmnt->fetch()) {
            ?>
                <tr>
                    <td>
                        <form method="post">
                            <a href="update_resident_form.php?id_resident=<?= $view['id_resident']; ?>" style="width:70px; font-size: 14px; border-radius:5px; margin-bottom: 2px;" class="btn btn-success"> Update </a>
                            <button class="btn btn-danger" type="submit" name="delete_resident" style="width: 70px; font-size: 14px; border-radius:5px;"> Delete </button>
                            <input type="hidden" id="idresident" name="id_resident" value="<?= $view['id_resident']; ?>">
                        </form>
                    </td>
                    <td>
                        <button data-id="<?= $view['id_resident']; ?>" class="btn btn-success residency" style="width: 100%; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;">Residency</button>
                        <button data-id="<?= $view['id_resident']; ?>" class="btn btn-success business" style="width: 100%; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#modalBusiness">Business</button>
                        <button data-id="<?= $view['id_resident']; ?>" class="btn btn-success clearance" style="width: 100%; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#modalClearance">Clearance</button>
                        <button data-id="<?= $view['id_resident']; ?>" class="btn btn-success indigency" style="width: 100%; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#modalIndigency">Indigency</button>

                        <!-- Residency -->
                        <div class="modal fade" id="modalResidency" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Certificate of Residency Form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="generate_rescert_auto.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="mtop">Date Needed: </label>
                                                        <input type="date" class="form-control" name="date" style="text-align:left;" required min="<?php echo date('Y-m-d'); ?>" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="purposes">Purpose:</label>
                                                        <select class="form-control" name="purpose" style="text-align:left;" id="purpose" required>
                                                            <option value="">Choose Purpose</option>
                                                            <option value="Job/Employment">Job/Employment</option>
                                                            <option value="Business Establishment">Business Establishment</option>
                                                            <option value="Financial Transaction">Financial Transaction</option>
                                                            <option value="Certify that you are living in a certain barangay">Certify that you are living in a certain barangay</option>
                                                            <option value="Other important transactions.">Other important transactions.</option>
                                                        </select>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer" style="justify-content: flex-start;">
                                            <div class="paa">
                                                <input type="hidden" class="resid" name="id">
                                                <button name="generate" type="submit" class="btn btn-primary">Generate</button>
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Business -->
                        <div class="modal fade" id="modalBusiness" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Business Permit Form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="generate_bspermit_auto.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="bsname">Business Name:</label>
                                                        <input name="bsname" style="text-align:left;" type="text" class="form-control" placeholder="Enter Business Name" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="status">Business Industry:</label>
                                                        <select class="form-control" style="text-align:left;" name="bsindustry" id="status" placeholder="Enter Status" required>
                                                            <option value="">Choose your Business Industry</option>
                                                            <option value="Computer">Computer</option>
                                                            <option value="Telecommunication">Telecommunication</option>
                                                            <option value="Agriculture">Agriculture</option>
                                                            <option value="Construction">Construction</option>
                                                            <option value="Education">Education</option>
                                                            <option value="Pharmaceutical">Pharmaceutical</option>
                                                            <option value="Food">Food</option>
                                                            <option value="HealthCare">HealthCare</option>
                                                            <option value="Hospitality">Hospitality</option>
                                                            <option value="Entertainment">Entertainment</option>
                                                            <option value="News Media">News Media</option>
                                                            <option value="Energy">Energy</option>
                                                            <option value="Manufacturing">Manufacturing</option>
                                                            <option value="Music">Music</option>
                                                            <option value="Mining">Mining</option>
                                                            <option value="WorldWide Web">WorldWide Web</option>
                                                            <option value="Electronics">Electronics</option>
                                                            <option value="Transport">Pharmaceutical</option>
                                                            <option value="Transport">Aerospace</option>
                                                        </select>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="aoe" class="mtop">Area of Establishment (SqM): </label>
                                                        <input type="number" style="text-align:left;" name="aoe" class="form-control" placeholder="Enter your AOE" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer" style="justify-content: flex-start;">
                                            <div class="paa">
                                                <input type="hidden" class="busid" name="id">
                                                <button name="generate" type="submit" class="btn btn-primary">Generate</button>
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Clearance -->
                        <div class="modal fade" id="modalClearance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Barangay Clearance Form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="generate_brgycle_auto.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="status">Status:</label>
                                                        <select class="form-control" style="text-align:left;" name="status" id="status" placeholder="Enter Status" value="<?= $userdetails['status'] ?>" required>
                                                            <option value="">Choose your Status</option>
                                                            <option value="Single">Single</option>
                                                            <option value="In a relationship">In a relationship</option>
                                                            <option value="Engaged">Engaged</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                            <option value="Divorces">Divorced</option>
                                                        </select>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="purposes">Purposes:</label>
                                                        <select class="form-control" style="text-align:left;" name="purpose" id="purposes" placeholder="Enter Status" required>
                                                            <option value="">Choose your Purpose</option>
                                                            <option value="Local Employment">Local Employment</option>
                                                            <option value="Loan">Loan</option>
                                                            <option value="School/S.S.S Requirements">School/S.S.S Requirements</option>
                                                            <option value="NBI/Police Clearance">NBI/Police Clearance</option>
                                                            <option value="Postal ID Application">Postal ID</option>
                                                            <option value="Bank Requirements">Bank Requirements</option>
                                                            <option value="Water/Electric service Connection">Water/Electric service Connection</option>
                                                            <option value="Legal Purpose">Legal Purpose</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer" style="justify-content: flex-start;">
                                            <div class="paa">
                                                <input type="hidden" class="clearid" name="id">
                                                <button name="generate" type="submit" class="btn btn-primary">Generate</button>
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Indigency -->
                        <div class="modal fade" id="modalIndigency" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Certificate of Indigency Form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="generate_indigency_auto.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="mtop">Date Needed: </label>
                                                        <input type="date" class="form-control" name="date" style="text-align:left;" required min="<?php echo date('Y-m-d'); ?>" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="purposes">Purposes:</label>
                                                        <select class="form-control" style="text-align:left;" name="purpose" id="purposes" required>
                                                            <option value="">Choose your Purposes</option>
                                                            <option value="Job/Employment">Job/Employment</option>
                                                            <option value="Business Establishment">Business Requirement</option>
                                                            <option value="Financial Transaction">Financial Transaction</option>
                                                            <option value="Scholarship">Scholarship</option>
                                                            <option value="Other important transactions.">Other important transactions.</option>
                                                        </select>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer" style="justify-content: flex-start;">
                                            <div class="paa">
                                                <input type="hidden" class="indiid" name="id">
                                                <button name="generate" type="submit" class="btn btn-primary">Generate</button>
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td> <?= $search['lname']; ?> </td>
                    <td> <?= $search['fname']; ?> </td>
                    <td> <?= $search['mi']; ?> </td>
                    <td> <?= $search['age']; ?> </td>
                    <td> <?= $search['houseno']; ?>, <?= $search['street']; ?>, <?= $search['brgy']; ?> </td>
                    <td> <?= $search['nationality']; ?> </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

<?php
} else {
?>
    <div class="table-responsive">
        <table class="table table-hover text-center table-bordered table-responsive">
            <thead class="alert-info">
                <tr>
                    <th> Actions</th>
                    <th>Certificate / Clearance</th>
                    <th> Email </th>
                    <th> Surname </th>
                    <th> First name </th>
                    <th> Middle name </th>
                    <th> Age </th>
                    <th> Sex </th>
                    <th> Status </th>
                    <th> Address</th>
                    <th> Contact # </th>
                    <!-- <th> Birth date </th>
                <th> Birth place </th>
                <th> Nationality </th>
                <th> Registered Voter </th>
                <th> PWD </th>
                <th> Indigent </th>
                <th> Single Parent </th>
                <th> Malnourished </th>
                <th> 4Ps </th> -->
                </tr>
            </thead>

            <tbody>
                <?php if (is_array($view)) { ?>
                    <?php foreach ($view as $view) { ?>
                        <tr>
                            <td>
                                <form method="post">
                                    <a href="update_resident_form.php?id_resident=<?= $view['id_resident']; ?>" style="width:70px; font-size: 14px; border-radius:5px; margin-bottom: 2px;" class="btn btn-success"> Update </a>
                                    <button class="btn btn-danger" type="submit" name="delete_resident" style="width: 70px; font-size: 14px; border-radius:5px;"> Delete </button>
                                    <input type="hidden" id="idresident" name="id_resident" value="<?= $view['id_resident']; ?>">
                                </form>
                            </td>
                            <td>
                                <button data-id="<?= $view['id_resident']; ?>" class="btn btn-success residency" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;">Residency</button>
                                <button data-id="<?= $view['id_resident']; ?>" class="btn btn-success business" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#modalBusiness">Business</button>
                                <button data-id="<?= $view['id_resident']; ?>" class="btn btn-success clearance" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#modalClearance">Clearance</button>
                                <button data-id="<?= $view['id_resident']; ?>" class="btn btn-success indigency" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#modalIndigency">Indigency</button>
                                <button onclick="openWin('view_resident.php?id_resident=<?= $view['id_resident']; ?>')" class="btn btn-secondary view" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#modalView">View</button>

                                <!-- Residency -->
                                <div class="modal fade" id="modalResidency" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Certificate of Residency Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="generate_rescert_auto.php" method="post">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="mtop">Date Needed: </label>
                                                                <input type="date" class="form-control" name="date" style="text-align:left;" required min="<?php echo date('Y-m-d'); ?>" required>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="purposes">Purpose:</label>
                                                                <select class="form-control" name="purpose" style="text-align:left;" id="purpose" required>
                                                                    <option value="">Choose Purpose</option>
                                                                    <option value="Job/Employment">Job/Employment</option>
                                                                    <option value="Business Establishment">Business Establishment</option>
                                                                    <option value="Financial Transaction">Financial Transaction</option>
                                                                    <option value="Certify that you are living in a certain barangay">Certify that you are living in a certain barangay</option>
                                                                    <option value="Other important transactions.">Other important transactions.</option>
                                                                </select>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer" style="justify-content: flex-start;">
                                                    <div class="paa">
                                                        <input type="hidden" class="resid" name="id">
                                                        <button name="generate" type="submit" class="btn btn-primary">Generate</button>
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Business -->
                                <div class="modal fade" id="modalBusiness" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Business Permit Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="generate_bspermit_auto.php" method="post">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="bsname">Business Name:</label>
                                                                <input name="bsname" style="text-align:left;" type="text" class="form-control" placeholder="Enter Business Name" required>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="status">Business Industry:</label>
                                                                <select class="form-control" style="text-align:left;" name="bsindustry" id="status" placeholder="Enter Status" required>
                                                                    <option value="">Choose your Business Industry</option>
                                                                    <option value="Computer">Computer</option>
                                                                    <option value="Telecommunication">Telecommunication</option>
                                                                    <option value="Agriculture">Agriculture</option>
                                                                    <option value="Construction">Construction</option>
                                                                    <option value="Education">Education</option>
                                                                    <option value="Pharmaceutical">Pharmaceutical</option>
                                                                    <option value="Food">Food</option>
                                                                    <option value="HealthCare">HealthCare</option>
                                                                    <option value="Hospitality">Hospitality</option>
                                                                    <option value="Entertainment">Entertainment</option>
                                                                    <option value="News Media">News Media</option>
                                                                    <option value="Energy">Energy</option>
                                                                    <option value="Manufacturing">Manufacturing</option>
                                                                    <option value="Music">Music</option>
                                                                    <option value="Mining">Mining</option>
                                                                    <option value="WorldWide Web">WorldWide Web</option>
                                                                    <option value="Electronics">Electronics</option>
                                                                    <option value="Transport">Pharmaceutical</option>
                                                                    <option value="Transport">Aerospace</option>
                                                                </select>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="aoe" class="mtop">Area of Establishment (SqM): </label>
                                                                <input type="number" style="text-align:left;" name="aoe" class="form-control" placeholder="Enter your AOE" required>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer" style="justify-content: flex-start;">
                                                    <div class="paa">
                                                        <input type="hidden" class="busid" name="id">
                                                        <button name="generate" type="submit" class="btn btn-primary">Generate</button>
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Clearance -->
                                <div class="modal fade" id="modalClearance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Barangay Clearance Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="generate_brgycle_auto.php" method="post">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="status">Status:</label>
                                                                <select class="form-control" style="text-align:left;" name="status" id="status" placeholder="Enter Status" value="<?= $userdetails['status'] ?>" required>
                                                                    <option value="">Choose your Status</option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="In a relationship">In a relationship</option>
                                                                    <option value="Engaged">Engaged</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Widowed">Widowed</option>
                                                                    <option value="Divorces">Divorced</option>
                                                                </select>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="purposes">Purposes:</label>
                                                                <select class="form-control" style="text-align:left;" name="purpose" id="purposes" placeholder="Enter Status" required>
                                                                    <option value="">Choose your Purpose</option>
                                                                    <option value="Local Employment">Local Employment</option>
                                                                    <option value="Loan">Loan</option>
                                                                    <option value="School/S.S.S Requirements">School/S.S.S Requirements</option>
                                                                    <option value="NBI/Police Clearance">NBI/Police Clearance</option>
                                                                    <option value="Postal ID Application">Postal ID</option>
                                                                    <option value="Bank Requirements">Bank Requirements</option>
                                                                    <option value="Water/Electric service Connection">Water/Electric service Connection</option>
                                                                    <option value="Legal Purpose">Legal Purpose</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer" style="justify-content: flex-start;">
                                                    <div class="paa">
                                                        <input type="hidden" class="clearid" name="id">
                                                        <button name="generate" type="submit" class="btn btn-primary">Generate</button>
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Indigency -->
                                <div class="modal fade" id="modalIndigency" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Certificate of Indigency Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="generate_indigency_auto.php" method="post">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="mtop">Date Needed: </label>
                                                                <input type="date" class="form-control" name="date" style="text-align:left;" required min="<?php echo date('Y-m-d'); ?>" required>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="purposes">Purposes:</label>
                                                                <select class="form-control" style="text-align:left;" name="purpose" id="purposes" required>
                                                                    <option value="">Choose your Purposes</option>
                                                                    <option value="Job/Employment">Job/Employment</option>
                                                                    <option value="Business Establishment">Business Requirement</option>
                                                                    <option value="Financial Transaction">Financial Transaction</option>
                                                                    <option value="Scholarship">Scholarship</option>
                                                                    <option value="Other important transactions.">Other important transactions.</option>
                                                                </select>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Please fill out this field.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer" style="justify-content: flex-start;">
                                                    <div class="paa">
                                                        <input type="hidden" class="indiid" name="id">
                                                        <button name="generate" type="submit" class="btn btn-primary">Generate</button>
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td> <?= $view['email']; ?> </td>
                            <td> <?= $view['lname']; ?> </td>
                            <td> <?= $view['fname']; ?> </td>
                            <td> <?= $view['mi']; ?> </td>
                            <td> <?= $view['age']; ?> </td>
                            <td> <?= $view['sex']; ?> </td>
                            <td> <?= $view['status']; ?> </td>
                            <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?> </td>
                            <td> <?= $view['contact']; ?> </td>

                        </tr>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </tbody>

        </table>

    </div>
    <script>
        function param(w, h) {
            var width = w;
            var height = h;
            var left = (screen.width - width) / 2;
            var top = (screen.height - height) / 2;
            var params = 'width=' + width + ', height=' + height;
            params += ', top=' + top + ', left=' + left;
            params += ', directories=no';
            params += ', location=no';
            params += ', resizable=no';
            params += ', status=no';
            params += ', toolbar=no';
            return params;
        }

        function openWin(url) {
            myWindow = window.open(url, 'mywin', param(800, 500));
            myWindow.focus();
        }

        function openCustom(url, w, h) {
            myWindow = window.open(url, 'mywin', param(w, h));
            myWindow.focus();
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
    <!-- responsive tags for screen compatibility -->
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <!-- custom css -->
    <link href="customcss/regiformstyle.css" rel="stylesheet" type="text/css">
    <!-- bootstrap css -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>

<?php
}
$con = null;
?>