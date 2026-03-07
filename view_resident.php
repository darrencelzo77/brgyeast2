<?php
include_once 'dbcon.php';

if (!isset($_GET['id_resident'])) {
    die("No resident ID provided.");
}

$id_resident = mysqli_real_escape_string($db_connection, $_GET['id_resident']);

$query = "SELECT * FROM tbl_resident WHERE id_resident = '$id_resident'";
$result = mysqli_query($db_connection, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Resident not found.");
}

$resident = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Resident Profile</title>

<style>
body {
    background-color: #f4f7fb;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.profile-container {
    max-width: 900px;
    margin: 40px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.profile-header {
    background: #07325f;
    color: #fff;
    padding: 25px;
}

.profile-header h3 {
    margin: 0;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.section {
    padding: 25px;
}

.section-title {
    color: #07325f;
    font-weight: 600;
    margin-bottom: 15px;
    border-left: 5px solid #07325f;
    padding-left: 10px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
}

.info-box {
    background: #f9fbfd;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    padding: 12px 15px;
}

.info-label {
    font-size: 13px;
    color: #6c757d;
    margin-bottom: 3px;
}

.info-value {
    font-weight: 600;
    color: #212529;
}

.action-buttons {
    padding: 20px 25px;
    text-align: right;
    background: #f4f7fb;
}

.btn {
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    display: inline-block;
}

.btn-dark {
    background: #07325f;
    color: #fff;
}

.btn-dark:hover {
    background: #052747;
}
</style>
</head>

<body>

<div class="profile-container">

    <!-- HEADER -->
    <div class="profile-header">
        <h3>Resident Information</h3>
    </div>

    <!-- BASIC INFO -->
    <div class="section">
        <div class="section-title">Personal Details</div>

        <div class="info-grid">
            <div class="info-box">
                <div class="info-label">Full Name</div>
                <div class="info-value">
                    <?= $resident['fname'].' '.$resident['mi'].' '.$resident['lname']; ?>
                </div>
            </div>

            <div class="info-box">
                <div class="info-label">Email</div>
                <div class="info-value"><?= $resident['email']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">Age</div>
                <div class="info-value"><?= $resident['age']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">Sex</div>
                <div class="info-value"><?= $resident['sex']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">Civil Status</div>
                <div class="info-value"><?= $resident['status']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">Nationality</div>
                <div class="info-value"><?= $resident['nationality']; ?></div>
            </div>
        </div>
    </div>

    <!-- ADDRESS & CONTACT -->
    <div class="section">
        <div class="section-title">Address & Contact</div>

        <div class="info-grid">
            <div class="info-box">
                <div class="info-label">Complete Address</div>
                <div class="info-value">
                    <?= $resident['houseno'].', '.$resident['street'].', '.$resident['brgy']; ?>
                </div>
            </div>

            <div class="info-box">
                <div class="info-label">Contact Number</div>
                <div class="info-value"><?= $resident['contact']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">Birth Date</div>
                <div class="info-value"><?= $resident['bdate']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">Birth Place</div>
                <div class="info-value"><?= $resident['bplace']; ?></div>
            </div>
        </div>
    </div>

    <!-- SOCIAL INFO -->
    <div class="section">
        <div class="section-title">Social Classification</div>

        <div class="info-grid">
            <div class="info-box">
                <div class="info-label">Registered Voter</div>
                <div class="info-value"><?= $resident['voter']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">PWD</div>
                <div class="info-value"><?= $resident['pwd']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">Indigent</div>
                <div class="info-value"><?= $resident['indigent']; ?></div>
            </div>

            <div class="info-box">
                <div class="info-label">4Ps Beneficiary</div>
                <div class="info-value"><?= $resident['four_ps']; ?></div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
