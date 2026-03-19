<?php
// Turn off warnings but show errors
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_WARNING);

// Include required classes
include('classes/conn.php');
include('classes/staff.class.php');
include('classes/resident.class.php');

// Validate user session and permissions
$userdetails = $bmis->get_userdata();
$bmis->validate_admin();

// Fetch resident statistics
$rescount        = $residentbmis->count_resident();
$rescountm       = $residentbmis->count_male_resident();
$rescountf       = $residentbmis->count_female_resident();
$rescountfh      = $residentbmis->count_head_resident();
$rescountfm      = $residentbmis->count_member_resident();
$rescountvoter   = $residentbmis->count_voters();
$rescountsenior  = $residentbmis->count_resident_senior();

// Fetch staff statistics
$staffcount      = $staffbmis->count_staff();
$staffcountm     = $staffbmis->count_mstaff();
$staffcountf     = $staffbmis->count_fstaff();

// Resident operations
$view            = $residentbmis->view_resident();
$residentbmis->create_resident();
$upstaff         = $residentbmis->update_resident();
$residentbmis->delete_resident();
$residentbmis->create_resident_admin();

// Create temporary family table
$randomStr = $residentbmis->randomStr();
$tmpFamilyTable = 'tmp_add_family' . $randomStr;
$_SESSION['tmp_add_family'] = $tmpFamilyTable;

// Drop table if exists
$conn->exec("DROP TABLE IF EXISTS `$tmpFamilyTable`");

// Create temporary family table
$createTableSQL = "
    CREATE TABLE `$tmpFamilyTable` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `family_lastname` VARCHAR(128) DEFAULT '',
        `family_firstname` VARCHAR(128) DEFAULT '',
        `family_middleinitial` VARCHAR(128) DEFAULT '',
        `relationshipid` VARCHAR(128) DEFAULT '0',
        `family_age` VARCHAR(128) DEFAULT '',
        `familycivilid` VARCHAR(128) DEFAULT '0',
        `occupation` VARCHAR(128) DEFAULT '',
        `income` VARCHAR(128) DEFAULT '',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";
$conn->exec($createTableSQL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barangay East Modern Site Information System</title>

    <!-- Fonts & Icons -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>

    <style>
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 1;
        }
    </style>
</head>

<body id="page-top">
    <?php include('dashboard_sidebar_start.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="text-center text-black">Registration Form</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">

                            <!-- Name & Contact -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Last Name</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="lname" placeholder="Enter Last Name" title="At least 2 letters" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">First Name</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="fname" placeholder="Enter First Name" title="At least 2 letters" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Middle Name</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="mi" placeholder="Enter Middle Name" title="At least 2 letters">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Contact Number</label><span style="color:red;">*</span>
                                    <input type="tel" style="text-transform: uppercase;" class="form-control" name="contact" maxlength="11" placeholder="Enter Contact Number">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label><span style="color:red;">*</span>
                                    <input type="email" class="form-control" name="email" placeholder="ENTER EMAIL" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Password</label><span style="color:red;">*</span>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password-field" name="password" placeholder="ENTER PASSWORD" minlength="8" maxlength="16" required>
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">House Number</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="houseno" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Purok & Street</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="street" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Barangay</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="brgy" value="East Modern Site" readonly required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Municipality</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="municipal" value="Bagiuo City" readonly required>
                                </div>
                            </div>

                            <!-- PSA / National ID / Head of Family -->
                            <div class="row g-3 mb-3">
                                <?php
                                $radioOptions = ['Yes', 'No'];
                                function renderRadio($name, $options)
                                {
                                    foreach ($options as $option) {
                                        echo '<div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="' . $name . '" value="' . $option . '">
                                            <label class="form-check-label">' . $option . '</label>
                                          </div>';
                                    }
                                }
                                ?>
                                <div class="col-md-3">
                                    <h6>PSA Birth Certificate?</h6><span style="color:red;">*</span>
                                    <?php renderRadio('psa', $radioOptions); ?>
                                </div>
                                <div class="col-md-3">
                                    <h6>Correction in PSA?</h6><span style="color:red;">*</span>
                                    <?php renderRadio('psa_correction', $radioOptions); ?>
                                    <input type="text" id="psa_c" name="psa_c" class="form-control mt-1" placeholder="If yes, specify" style="display:none;">
                                </div>
                                <div class="col-md-3">
                                    <h6>National ID?</h6><span style="color:red;">*</span>
                                    <?php renderRadio('ntnlid', $radioOptions); ?>
                                    <input type="text" id="ntlid_input" name="ntlid_" class="form-control mt-1" placeholder="National ID Number" style="display:none;">
                                </div>
                                <div class="col-md-3">
                                    <h6>Head of Family?</h6><span style="color:red;">*</span>
                                    <?php renderRadio('hof', $radioOptions); ?>
                                </div>
                            </div>

                            <!-- Animals, Trees, Farmer, Vegetables -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-3">
                                    <h6>Domesticated Animals?</h6><span style="color:red;">*</span><?php renderRadio('d_a', $radioOptions); ?>
                                </div>
                                <div class="col-md-3">
                                    <h6>Trees in Yard?</h6><span style="color:red;">*</span><?php renderRadio('trees', $radioOptions); ?>
                                </div>
                                <div class="col-md-3">
                                    <h6>Farmer?</h6><span style="color:red;">*</span><?php renderRadio('farmer', $radioOptions); ?>
                                </div>
                                <div class="col-md-3">
                                    <h6>Grow Vegetables?</h6><span style="color:red;">*</span><?php renderRadio('veges', $radioOptions); ?>
                                </div>
                            </div>

                            <!-- Birth Info -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Birth Date</label><span style="color:red;">*</span>
                                    <input type="date" class="form-control" name="bdate" id="birthdate" oninput="calculateAge()" required max="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Birth Place</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="bplace" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nationality</label><span style="color:red;">*</span>
                                    <!-- <select class="form-control" name="nationality" required>
                                        <option value="Filipino" selected>Filipino</option>
                                    </select> -->
                                    <input class="form-control" name="nationality" value="Filipino" required readonly />
                                </div>
                            </div>

                            <!-- Civil Status, Age, Sex -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Civil Status</label><span style="color:red;">*</span>
                                    <select class="form-control" name="status" required>
                                        <option value="">Choose your Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Live-in">Live-in partner</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Age</label><span style="color:red;">*</span>
                                    <input type="text" class="form-control" name="age" id="age" readonly required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sex</label><span style="color:red;">*</span>
                                    <select class="form-control" name="sex" required>
                                        <option value="">Choose your Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Income & Occupation -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label>Source of Income</label><span style="color: red;">*</span>
                                    <input
                                        type="text"
                                        id="soi"
                                        name="soi"
                                        class="form-control"
                                        list="incomeSuggestions"
                                        placeholder="Type a number (e.g. 1 → 10,000)"
                                        autocomplete="off">

                                    <datalist id="incomeSuggestions"></datalist>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Occupation</label><span style="color:red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="occupation">
                                </div>
                            </div>




                            <div class="row">

                                <div class="col rb">
                                    <div class="form-group">
                                        <label>Are you a registered voter? </label>
                                        <select class="form-control" name="voter" id="regvote">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>

                                <div class="col rb">
                                    <div class="form-group">
                                        <label>PWD? </label>
                                        <select class="form-control" name="pwd" id="pwd">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col rb">
                                    <div class="form-group">
                                        <label>Indigent? </label>
                                        <select class="form-control" name="indigent" id="indigent">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="col rb">
                                    <div class="form-group">
                                        <label>Single Parent? </label>
                                        <select class="form-control" name="single_parent" id="single_parent">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="col rb">
                                    <div class="form-group">
                                        <label>Pregnant? </label>
                                        <select class="form-control" name="pregnant" id="pregnant">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div hidden class="col rb">
                                    <div class="form-group">
                                        <label>Malnourished? </label>
                                        <select class="form-control" name="malnourished" id="malnourished">
                                            <option selected value="N/A">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="col rb">
                                    <div class="form-group">
                                        <label>Member of 4Ps? </label>
                                        <select class="form-control" name="four_ps" id="four_ps">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="col rb">
                                    <div class="form-group">
                                        <label>Member of Senior Citizen? </label>
                                        <select class="form-control" name="senior_citizen" id="senior_citizen">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>

                                <!-- Out of School Youth dropdown -->
                                <div class="col rb">
                                    <div class="form-group">
                                        <label>Out of School Youth? </label>
                                        <select class="form-control" name="out_of_school_youth" id="out_of_school_youth">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>

                                <!-- New LGBTQ+ dropdown -->
                                <div class="col rb">
                                    <div class="form-group">
                                        <label>LGBTQ+? </label>
                                        <select class="form-control" name="lgbtq" id="lgbtq">
                                            <option value="">...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>


                                <br>
                            </div>













                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Valid ID Type #1:</label><span style="color: red;">*</span>
                                    <select class="form-control" name="valid1" required>
                                        <option value="">-- Select Valid ID --</option>
                                        <option>PhilSys ID (National ID)</option>
                                        <option>Passport</option>
                                        <option>Driver’s License</option>
                                        <option>UMID</option>
                                        <option>SSS ID</option>
                                        <option>PhilHealth ID</option>
                                        <option>Pag-IBIG ID</option>
                                        <option>Voter’s ID / Voter’s Certification</option>
                                        <option>Postal ID</option>
                                        <option>PRC ID</option>
                                        <option>Company ID</option>
                                        <option>School ID</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Valid ID Type #2:</label><span style="color: red;">*</span>
                                    <select class="form-control" name="valid2" required>
                                        <option value="">-- Select Valid ID --</option>
                                        <option>PhilSys ID (National ID)</option>
                                        <option>Passport</option>
                                        <option>Driver’s License</option>
                                        <option>UMID</option>
                                        <option>SSS ID</option>
                                        <option>PhilHealth ID</option>
                                        <option>Pag-IBIG ID</option>
                                        <option>Voter’s ID / Voter’s Certification</option>
                                        <option>Postal ID</option>
                                        <option>PRC ID</option>
                                        <option>Company ID</option>
                                        <option>School ID</option>
                                    </select>
                                </div>
                            </div>


                            <script>
                                function updateValidIDs() {
                                    let valid1 = document.getElementById("valid1");
                                    let valid2 = document.getElementById("valid2");

                                    let value1 = valid1.value;
                                    let value2 = valid2.value;

                                    // Reset all options first
                                    for (let opt of valid1.options) opt.disabled = false;
                                    for (let opt of valid2.options) opt.disabled = false;

                                    // Disable selected in the other dropdown
                                    for (let opt of valid2.options) {
                                        if (opt.value === value1 && value1 !== "") {
                                            opt.disabled = true;
                                        }
                                    }

                                    for (let opt of valid1.options) {
                                        if (opt.value === value2 && value2 !== "") {
                                            opt.disabled = true;
                                        }
                                    }
                                }

                                document.getElementById("valid1").addEventListener("change", updateValidIDs);
                                document.getElementById("valid2").addEventListener("change", updateValidIDs);
                            </script>



                            <!-- Valid IDs -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Valid ID #1 (Front Only)</label><span style="color:red;">*</span>
                                    <input type="file" class="form-control" name="valid_id_front1" accept="image/*" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Valid ID #2 (Front Only)</label><span style="color:red;">*</span>
                                    <input type="file" class="form-control" name="valid_id_front2" accept="image/*" required>
                                </div>
                            </div>

                            <input type="hidden" name="role" value="resident">

                            <div class="d-flex justify-content-center gap-3">
                                <button type="submit" name="add_resident_admin" class="btn btn-primary px-4">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-4">
        <?= date("Y"); ?> | East Modern Site Barangay Information System
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const soiInput = document.getElementById('soi');
        const datalist = document.getElementById('incomeSuggestions');

        soiInput.addEventListener('input', function() {
            const raw = this.value.replace(/\D/g, '');
            datalist.innerHTML = '';

            if (!raw) return;

            const base = parseInt(raw) * 10000;

            // Small increments (₱1,000 – ₱3,000)
            const increments = [0, 1000, 2000, 3000];

            // Shuffle increments
            increments.sort(() => Math.random() - 0.5);

            // Take first 3 suggestions
            increments.slice(0, 3).forEach(add => {
                const option = document.createElement('option');
                option.value = (base + add).toLocaleString();
                datalist.appendChild(option);
            });
        });
    </script>

    <script>
        // Toggle password visibility
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            input.attr("type", input.attr("type") === "password" ? "text" : "password");
        });

        // Calculate age
        function calculateAge() {
            var birthdate = document.getElementById('birthdate').value;
            if (!birthdate) return;
            var today = new Date();
            var birthdateObj = new Date(birthdate);
            var age = today.getFullYear() - birthdateObj.getFullYear();
            var m = today.getMonth() - birthdateObj.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthdateObj.getDate())) age--;
            document.getElementById('age').value = age;
        }
    </script>
</body>

</html>