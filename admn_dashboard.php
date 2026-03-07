<?php
error_reporting(E_ALL ^ E_WARNING);
include('classes/staff.class.php');
include('classes/resident.class.php');
include('classes/services.class.php');

$userdetails = $bmis->get_userdata();
$bmis->validate_admin();

$rescount = $residentbmis->count_resident();
$rescountm = $residentbmis->count_male_resident();
$rescountf = $residentbmis->count_female_resident();
$rescountfh = $residentbmis->count_head_resident();
$rescountfm = $residentbmis->count_member_resident();
$rescountvoter = $residentbmis->count_voters();
$rescountnonvoter = $residentbmis->count_nonvoters();
$rescountsenior = $residentbmis->count_resident_senior();

$reqscount = $residentbmis->count_approval();
$minorcount = $residentbmis->count_minor();
$pwdcount = $residentbmis->count_pwd();
$spcount = $residentbmis->count_single_parent();
$fourpscount = $residentbmis->count_fourps();
$indigentcount = $residentbmis->count_indigent();
$malcount = $residentbmis->count_malnourished();
$vacxcount = $residentbmis->count_vaccinated();
$pregnancycount = $residentbmis->count_pregnancy();
$residencycount = $residentbmis->count_residency();
$count = $residencycount['count'];
$color = $residencycount['color'];

$bspermitcount = $residentbmis->count_bspermit();
$countbs = $bspermitcount['count'];
$colorbs = $bspermitcount['color'];

$clearancecount = $residentbmis->count_clearance();
$countbc = $clearancecount['count'];
$colorbc = $clearancecount['color'];

$indigencycount = $residentbmis->count_indigency();
$countindigency = $indigencycount['count'];
$colorindigency = $indigencycount['color'];

$blottercount = $residentbmis->count_blotter();
$countblotter = $blottercount['count'];
$colorblotter = $blottercount['color'];

$staffcount = $staffbmis->count_staff();
$staffcountm = $staffbmis->count_mstaff();
$staffcountf = $staffbmis->count_fstaff();

$servicescount = $servicesbmis->count_services();

$osycount = $residentbmis->count_out_of_school_youth();
$lgbtqcount = $residentbmis->count_lgbtq();
$ipcommunitycount = $residentbmis->count_ip_community();
$hof = $residentbmis->count_hof();

?>

<style>
    .card-upper-space {
        margin-top: 35px;
    }

    .card-row-gap {
        margin-top: 3em;
    }
</style>


<?php
include('dashboard_sidebar_start.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>East Modern Site Barangay Information System</title>

    <!-- Font Awesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom fonts and Tailwind -->
    <?php include('include/font.php'); ?>

    <!-- Your other styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css?v=1" rel="stylesheet">
</head>



    <div class="row">
        <div class="col-md-4">
            <h4> Document's Request </h4>
            <br>
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Certificate of Residency</div>
                            <div class="h5 mb-0 font-weight-bold" style="color: <?= $color ?>;"><?= $count ?></div>
                            <br>
                            <a href="admn_certofres.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <span style="color: #4e73df;">
                                <i class="fas fa-file-word fa-2x text-dark "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div><!---col-md-4-->
        <div class="col-md-4" style="margin-top: 13px;">
            <br><br>
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Business Clearance</div>
                            <div class="h5 mb-0 font-weight-bold" style="color: <?= $colorbs ?>;"><?= $countbs ?></div>
                            <br>
                            <a href="admn_bspermit.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <span style="color: #4e73df;">
                                <i class="fas fa-file-contract fa-2x text-dark "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!---col-md-4-->
        <div class="col-md-4" style="margin-top: 13px;">
            <br><br>
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Barangay Clearance</div>
                            <div class="h5 mb-0 font-weight-bold" style="color: <?= $colorbc ?>;"><?= $countbc ?></div>
                            <br>
                            <a href="admn_brgyclearance.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <span style="color: #4e73df;">
                                <i class="fas fa-file fa-2x text-dark "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!---col-md-4-->
        <div class="col-md-4" style="margin-top: 13px;">
            <br><br>
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Certificate of Indigency</div>
                            <div class="h5 mb-0 font-weight-bold" style="color: <?= $colorindigency ?>;"><?= $countindigency ?></div>
                            <br>
                            <a href="admn_certofindigency.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <span style="color: #4e73df;">
                                <i class="fas fa-fw fa-table fa-2x text-dark "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!---col-md-4-->
        <div class="col-md-4" style="margin-top: 13px;">
            <br><br>
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Blotter Reports</div>
                            <div class="h5 mb-0 font-weight-bold" style="color: <?= $colorblotter ?>;"><?= $countblotter ?></div>
                            <br>
                            <a href="admn_blotterreport.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <span style="color: #4e73df;">
                                <i class="fas fa-user-shield fa-2x text-dark "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!---col-md-4-->
    </div><!--row-->
    <br>
    <hr>
    <br>

    <!-- <div class="row">
        <div class="col-md-4">
            <h4> Barangay Resident Data </h4>
            <br>
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Barangay Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $rescount ?></div>
                            <br>
                            <a href="admn_table_totalres.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <span style="color: #4e73df;">
                                <i class="fas fa-user-friends fa-2x text-dark "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <br>
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Request for Approval</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $reqscount ?></div>
                            <br>
                            <a href="admn_resident_request.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <br>
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Registered Voters </div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $rescountvoter ?></div>
                            <br>
                            <a href="admn_table_voters.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Unregistered Voters</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $rescountnonvoter ?></div>
                            <br>
                            <a href="admn_table_nonvoters.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ban fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Male Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $rescountm ?></div>
                            <br>
                            <a href="admn_table_maleres.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Female Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $rescountf ?></div>
                            <br>
                            <a href="admn_table_femaleres.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Head of the Family</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $hof ?></div>
                            <br>
                            <a href="admn_hof.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h4> Other Residents Data </h4>
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Minor Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $minorcount ?></div>
                            <br>
                            <a href="admn_resident_minor.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <br>
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Senior Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $rescountsenior ?></div>
                            <br>
                            <a href="admn_table_senior.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-blind fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <br>
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total PWD Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $pwdcount ?></div>
                            <br>
                            <a href="admn_resident_pwd.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wheelchair fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total of Single Parents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $spcount ?></div>
                            <br>
                            <a href="admn_resident_single.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total 4Ps Members</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $fourpscount ?></div>
                            <br>
                            <a href="admn_resident_4ps.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Indigent Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $indigentcount ?></div>
                            <br>
                            <a href="admn_resident_indigent.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-house-damage fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Malnourished Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $malcount ?></div>
                            <br>
                            <a href="admn_resident_Mal.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Vaccinated Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $vacxcount ?></div>
                            <br>
                            <a href="admn_resident_vaccinated.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-syringe fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pregnant Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $pregnancycount ?></div>
                            <br>
                            <a href="admn_resident_pregnant.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-baby fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Out of School Youth</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $osycount ?></div>
                            <br>
                            <a href="admn_resident_osy.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-primary shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total LGBTQIA+ Residents</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $lgbtqcount ?></div>
                            <br>
                            <a href="admn_resident_lgbtq.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-rainbow fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <hr>
        <br>

        <!-- <div class="row">
            <div class="col-md-4">
                <h4> Barangay Staff Data </h4>
                <br>
                <div class="card border-left-info shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Barangay Staffs</div>
                                <div class="h5 mb-0 font-weight-bold text-dark"><?= $staffcount ?></div>
                                <br>
                                <a href="admn_table_staff.php"> View Records </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card border-left-info shadow card-upper-space">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Barangay Male Staff
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-dark"><?= $staffcountm ?></div>
                                <br>
                                <a href="admn_table_malestaff.php"> View Records </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-2x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <br>
                <div class="card border-left-info shadow card-upper-space">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Barangay Female Staffs</div>
                                <div class="h5 mb-0 font-weight-bold text-dark"><?= $staffcountf ?></div>
                                <br>
                                <a href="admn_table_femalestaff.php"> View Records </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-female fa-2x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /.container-fluid -->

    </div>
    <br><br>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h4> Barangay Staff Data </h4>
            <div class="card border-left-info shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Barangay Staffs</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $staffcount ?></div>
                            <br>
                            <a href="admn_table_staff.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <br>
            <div class="card border-left-info shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Barangay Male Staff
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $staffcountm ?></div>
                            <br>
                            <a href="admn_table_malestaff.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <br>
            <div class="card border-left-info shadow card-upper-space">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Barangay Female Staffs</div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?= $staffcountf ?></div>
                            <br>
                            <a href="admn_table_femalestaff.php"> View Records </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <br>
    <br>
    <br>
    <br>
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
    include('dashboard_sidebar_end.php');
    ?>