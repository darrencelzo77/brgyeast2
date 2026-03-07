<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Barangay East Modern Site Information System</title>

<!-- Fonts & Icons -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

<!-- Core CSS -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom Overrides -->
<link href="css/custom.css?v=1" rel="stylesheet">
</head>

<body id="page-top">

<?php include('dashboard_sidebar_start.php'); ?>

<!-- Page Content -->
<div class="container-fluid">
    <h1 class="mb-4 text-center">Barangay Staff</h1>
    <hr><br>

    <div class="col-md-12">
        <table class="table table-hover table-bordered text-center table-responsive">
            <thead class="alert-info">
                <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if(is_array($view)){
                    $i=1;
                    foreach($view as $row){
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['fname'].' '.$row['mi'].' '.$row['lname']; ?></td>
                    <td><?= $row['position'] ?></td>
                </tr>
            <?php $i++; } } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('dashboard_sidebar_end.php'); ?>

<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

<!-- Custom Scripts -->
<script>
$(".toggle-password").click(function(){
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    input.attr("type", input.attr("type") === "password" ? "text" : "password");
});

function calculateAge(){
    var birthdate = document.getElementById('birthdate').value;
    var today = new Date();
    var birthdateObj = new Date(birthdate);
    var age = today.getFullYear() - birthdateObj.getFullYear();
    if(today.getMonth() < birthdateObj.getMonth() || 
       (today.getMonth() === birthdateObj.getMonth() && today.getDate() < birthdateObj.getDate())){
        age--;
    }
    document.getElementById('age').value = age;
}
</script>

</body>
</html>
