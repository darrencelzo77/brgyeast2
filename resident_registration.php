<?php
session_start(); // Start session

require('classes/conn.php');
require('classes/resident.class.php');

// Call create_resident function
$residentbmis->create_resident();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>East Modern Site Barangay Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap & CSS -->
    <link href="design.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>

    <style>
        .field-icon {
            margin-left: 74%;
            margin-top: -8%;
            position: absolute;
            z-index: 2;
            cursor: pointer;
        }

        html,
        body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        #footer {
            background-color: 073260;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary sticky-top">
        <a class="navbar-brand" style="color:white;">East Modern Site Barangay Information System</a>
    </nav>

    <div class="container-fluid" style="margin-top:4em;">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Registration Form</h1><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <!-- Name & Contact -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Last Name:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="lname" placeholder="Enter Last Name" title="Please enter at least 2 letters, letters only." required>
                                </div>
                                <div class="col-md-4">
                                    <label>First Name:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="fname" placeholder="Enter First Name" title="Please enter at least 2 letters, letters only." required>
                                </div>
                                <div class="col-md-4">
                                    <label>Middle Name:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="mi" placeholder="Enter Middle Name" title="Please enter at least 2 letters.">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Contact Number:</label><span style="color: red;">*</span>
                                    <input type="tel" style="text-transform: uppercase;" class="form-control" name="contact" maxlength="11" placeholder="Enter Contact Number">
                                </div>
                                <div class="col-md-4">
                                    <label>Email:</label><span style="color: red;">*</span>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Password:</label><span style="color: red;">*</span>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password-field" name="password" placeholder="ENTER PASSWORD" minlength="8" maxlength="16" required>
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label>House Number:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="houseno" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Purok & Street:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="street" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Barangay:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="brgy" value="East Modern Site" readonly required>
                                </div>
                                <div class="col-md-3">
                                    <label>Municipality:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="municipal" value="Bagiuo City" readonly required>
                                </div>
                            </div>

                            <!-- PSA / National ID / Family Head / Animals / Trees / Farmer / Vegetables -->
                            <div class="row mb-3">
                                <!-- PSA -->
                                <div class="col-md-3">
                                    <h6>Do you have PSA birth certificate?</h6><span style="color: red;">*</span>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="psa" value="Yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="psa" value="No">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <h6>Correction in your PSA?</h6><span style="color: red;">*</span>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="psa_correction" value="Yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="psa_correction" value="No">
                                        <label class="form-check-label">No</label>
                                    </div>
                                    <input type="text" id="psa_c" name="psa_c" class="form-control mt-1" placeholder="If yes, specify" style="display:none;">
                                </div>

                                <!-- National ID -->
                                <div class="col-md-3">
                                    <h6>Do you have National ID?</h6><span style="color: red;">*</span>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ntnlid" value="Yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ntnlid" value="No">
                                        <label class="form-check-label">No</label>
                                    </div>
                                    <input type="text" id="ntlid_input" name="ntlid_" class="form-control mt-1" placeholder="National ID Number" style="display:none;">
                                </div>

                                <!-- Head of family -->
                                <div class="col-md-3">
                                    <h6>Are you the head of the family?</h6><span style="color: red;">*</span>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hof" value="Yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hof" value="No">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Domesticated animals, trees, farmer, vegetables -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <h6>Do you have domesticated animals?</h6><span style="color: red;">*</span>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="d_a" value="Yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="d_a" value="No">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <h6>Do you have trees in your yard?</h6><span style="color: red;">*</span>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="trees" value="Yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="trees" value="No">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <h6>Are you a farmer?</h6><span style="color: red;">*</span>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="farmer" value="Yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="farmer" value="No">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <h6>Do you grow vegetables in your yard?</h6><span style="color: red;">*</span>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="veges" value="Yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="veges" value="No">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Birthdate, Age, Birthplace, Nationality, Civil Status, Sex -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Birth Date:</label><span style="color: red;">*</span>
                                    <input type="date" class="form-control" name="bdate" id="birthdate" oninput="calculateAge()" required max="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Birth Place:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="bplace" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Nationality:</label><span style="color: red;">*</span>
                                    <select class="form-control" name="nationality" required>
                                        <option value="Filipino" selected>Filipino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Civil Status:</label><span style="color: red;">*</span>
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
                                    <label>Age:</label><span style="color: red;">*</span>
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="age" id="age" readonly required>
                                </div>
                                <div class="col-md-4">
                                    <label>Sex:</label><span style="color: red;">*</span>
                                    <select class="form-control" name="sex" required>
                                        <option value="">Choose your Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Source of Income and Occupation -->
                            <div class="row mb-3">
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
                                    <label>Occupation</label><span style="color: red;">*</span>
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
                                    <select class="form-control" name="valid1" id="valid1" required>
                                        <option value="">-- Select Valid ID --</option>
                                        <option>PhilSys ID (National ID)</option>
                                        <option>Passport</option>
                                        <option>Driver’s License</option>
                                        <option>SSS ID</option>
                                        <option>UMID</option>
                                        <option>PhilHealth ID</option>
                                        <option>Pag-IBIG ID</option>
                                        <option>Voter’s ID / Voter’s Certification</option>
                                        <option>Postal ID</option>
                                        <option>PRC ID</option>
                                        <option>Senior Citizen ID</option>
                                        <option>PWD ID</option>
                                        <option>Barangay ID</option>
                                        <option>Police Clearance ID</option>
                                        <option>NBI Clearance</option>
                                        <option>Company ID</option>
                                        <option>School ID</option>
                                        <option>OFW ID (OWWA ID)</option>
                                        <option>Seaman’s Book</option>
                                        <option>GSIS ID</option>
                                        <option>Firearms License ID</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Valid ID Type #2:</label><span style="color: red;">*</span>
                                    <select class="form-control" name="valid2" id="valid2" required>
                                        <option value="">-- Select Valid ID --</option>
                                        <option>PhilSys ID (National ID)</option>
                                        <option>Passport</option>
                                        <option>Driver’s License</option>
                                        <option>SSS ID</option>
                                        <option>UMID</option>
                                        <option>PhilHealth ID</option>
                                        <option>Pag-IBIG ID</option>
                                        <option>Voter’s ID / Voter’s Certification</option>
                                        <option>Postal ID</option>
                                        <option>PRC ID</option>
                                        <option>Senior Citizen ID</option>
                                        <option>PWD ID</option>
                                        <option>Barangay ID</option>
                                        <option>Police Clearance ID</option>
                                        <option>NBI Clearance</option>
                                        <option>Company ID</option>
                                        <option>School ID</option>
                                        <option>OFW ID (OWWA ID)</option>
                                        <option>Seaman’s Book</option>
                                        <option>GSIS ID</option>
                                        <option>Firearms License ID</option>
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
                            <!-- Valid ID Upload Fields -->
                            <div class="row mb-3" id="idFields" style="display:none;">
                                <div class="col-md-6" id="id1">
                                    <label>Valid ID #1 (Front Only):</label><span style="color: red;">*</span>
                                    <input type="file" class="form-control" name="valid_id_front1" accept="image/*">
                                </div>

                                <div class="col-md-6" id="id2">
                                    <label>Valid ID #2 (Front Only):</label><span style="color: red;">*</span>
                                    <input type="file" class="form-control" name="valid_id_front2" accept="image/*">
                                </div>
                            </div>




                            <!-- Valid IDs -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Valid ID #1 (Front Only):</label><span style="color: red;">*</span>
                                    <input type="file" class="form-control" name="valid_id_front1" accept="image/*" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Valid ID #2 (Front Only):</label><span style="color: red;">*</span>
                                    <input type="file" class="form-control" name="valid_id_front2" accept="image/*" required>
                                </div>
                            </div>

                            <input type="hidden" name="role" value="resident">
                            <center>
                                <button type="submit" name="add_resident" class="btn btn-secondary" style="width:130px;">Submit</button>
                                <a href="index_login.php" class="btn btn-danger" style="width:130px;">Back to Login</a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer" class="bg-primary text-white text-center">
        <div class="py-3">
            <?= date("Y"); ?> | East Modern Site Barangay Information System
        </div>
    </footer>
    <script>
        // const soiInput = document.getElementById('soi');
        // const datalist = document.getElementById('incomeSuggestions');

        // soiInput.addEventListener('input', function () {
        //     const value = this.value.replace(/\D/g, '');

        //     // Clear suggestions
        //     datalist.innerHTML = '';

        //     if (!value) return;

        //     const base = parseInt(value) * 10000;

        //     // Generate suggestions
        //     const suggestions = [
        //         base,
        //         base * 2,
        //         base * 5
        //     ];

        //     suggestions.forEach(amount => {
        //         const option = document.createElement('option');
        //         option.value = amount.toLocaleString();
        //         datalist.appendChild(option);
        //     });
        // });
    </script>
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
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            input.attr("type", input.attr("type") === "password" ? "text" : "password");
        });

        // Age calculation
        function calculateAge() {
            var birthdate = document.getElementById('birthdate').value;
            if (!birthdate) return;
            var today = new Date();
            var birthdateObj = new Date(birthdate);
            var age = today.getFullYear() - birthdateObj.getFullYear();
            var m = today.getMonth() - birthdateObj.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthdateObj.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }
    </script>

</body>

</html>