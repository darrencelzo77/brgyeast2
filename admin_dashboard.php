<?php
// Ensure errors are displayed for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_WARNING);

// Include required classes
include('classes/staff.class.php');
include('classes/resident.class.php');
include('classes/services.class.php');

// Get user data and validate admin status
$userdetails = $bmis->get_userdata();
$bmis->validate_admin();

// Count different types of residents
$rescount = $residentbmis->count_resident();
$rescountm = $residentbmis->count_male_resident();
$rescountf = $residentbmis->count_female_resident();
$rescountfh = $residentbmis->count_head_resident();
$rescountfm = $residentbmis->count_member_resident();
$rescountvoter = $residentbmis->count_voters();
$rescountsenior = $residentbmis->count_resident_senior();

// Count different requests and approvals
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

// Count different types of permits and clearances
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

// Add these lines after your existing count declarations
$osycount = $residentbmis->count_out_of_school_youth();
$lgbtqcount = $residentbmis->count_lgbtq();
$ipcommunitycount = $residentbmis->count_ip_community();
$count_hof = $residentbmis->count_hof();
?>

<style>
    /* Custom styles */
    .container-fluid {
        min-height: 80%;
    }

    .chart-container {
        display: flex;
        width: 100%;
        overflow-x: auto;
        /* Allow horizontal scrolling if charts overflow */
    }

    .chart-container canvas {
        max-width: 50%;
        /* Limit the width of each chart to 50% of the container */
        flex-shrink: 0;
        /* Prevent charts from shrinking */
    }

    .btn {
        margin-left: 10px;
    }

    @media (max-width: 768px) {
        .chart-container {
            flex-wrap: wrap;
        }

        .chart-container canvas {
            max-width: 100%;
            margin-bottom: 20px;
        }
    }
</style>

<?php
include('dashboard_sidebar_start.php');
?>
<br>









<!-- Begin Page Content -->
<div class="container-fluid">



    <?php include('admin_dashboard2.php'); ?>


    <br>
    <!-- Page Heading -->
    <div class="row">
        <canvas id="numberOfRecordsChart" width="2000" height="300"></canvas>
    </div>
    <br>
    <div class="row">
        <canvas id="otherChart" width="2000" height="400"></canvas>
    </div>

    <br>
    <hr>
    <br>

    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Ensure the chart objects are correctly defined
    const ctxNumberOfRecords = document.getElementById('numberOfRecordsChart').getContext('2d');
    const ctxOther = document.getElementById('otherChart').getContext('2d');

    // Data for the charts (assuming these variables are correctly defined earlier in your code)
    const documentData = [{
            documentType: 'Request for Approval',
            count: <?= $reqscount ?>
        },
        {
            documentType: 'Certificate of Residency',
            count: <?= $count ?>
        },
        {
            documentType: 'Business Clearance',
            count: <?= $countbs ?>
        },
        {
            documentType: 'Barangay Clearance',
            count: <?= $countbc ?>
        },
        {
            documentType: 'Certificate of Indigency',
            count: <?= $countindigency ?>
        },
        {
            documentType: 'Blotter Reports',
            count: <?= $countblotter ?>
        }
    ];

    // URL mapping for document types
    const documentUrlMapping = {
        'Request for Approval': 'admn_resident_request.php',
        'Certificate of Residency': 'admn_certofres.php',
        'Business Clearance': 'admn_bspermit.php',
        'Barangay Clearance': 'admn_brgyclearance.php',
        'Certificate of Indigency': 'admn_certofindigency.php',
        'Blotter Reports': 'admn_blotterreport.php'
    };

    // Event handler for clicks on the "Number of Records" chart
    function handleNumberOfRecordsChartClick(event) {
        // Get the clicked element (data point) on the chart
        const activePoint = numberOfRecordsChart.getElementsAtEventForMode(event, 'nearest', {
            intersect: true
        }, false)[0];

        if (activePoint) {
            // Get the index of the clicked data point
            const index = activePoint.index;

            // Get the label (document type) of the clicked data point
            const clickedLabel = numberOfRecordsChart.data.labels[index];

            // Check if the label has a corresponding URL in the mapping
            if (documentUrlMapping[clickedLabel]) {
                // Redirect the user to the corresponding URL
                window.location.href = documentUrlMapping[clickedLabel];
            }
        }
    }

    // Add click event listener to the "Number of Records" chart
    ctxNumberOfRecords.canvas.addEventListener('click', handleNumberOfRecordsChartClick);

    // Function to extract labels and counts from the data
    function extractData(data) {
        var labels = data.map(function(item) {
            return item.documentType;
        });

        var counts = data.map(function(item) {
            return item.count;
        });

        return {
            labels: labels,
            counts: counts
        };
    }

    // Data for the charts
    var chartData = extractData(documentData);

    // Define the options for the number of records chart
    var numberOfRecordsOptions = {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1 // Display only whole numbers on the y-axis
                }
            }
        }
    };

    // Create the number of records chart
    var numberOfRecordsChart = new Chart(ctxNumberOfRecords, {
        type: 'bar',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Request',
                data: chartData.counts,
                backgroundColor: [
                    'rgb(94, 129, 211)',

                ],
                borderColor: [
                    'rgb(38, 36, 99)',

                ],
                borderWidth: 1
            }]
        },
        options: numberOfRecordsOptions
    });

    // Other chart data
    var otherChartData = [{
            label: 'Barangay Residents',
            value: <?= $rescount ?>
        },
        {
            label: 'Head of the family',
            value: <?= $count_hof ?>
        },
        {
            label: 'Registered Voters',
            value: <?= $rescountvoter ?>
        },
        {
            label: 'Unregistered Voters',
            value: <?= $rescountm ?>
        },
        {
            label: 'Male Residents',
            value: <?= $rescountm ?>
        },
        {
            label: 'Female Residents',
            value: <?= $rescountf ?>
        },
        {
            label: 'Minor Residents',
            value: <?= $minorcount ?>
        },
        {
            label: 'Senior Residents',
            value: <?= $rescountsenior ?>
        },
        {
            label: 'PWD Residents',
            value: <?= $pwdcount ?>
        },
        {
            label: 'Single Parents',
            value: <?= $spcount ?>
        },
        {
            label: '4Ps Members',
            value: <?= $fourpscount ?>
        },
        {
            label: 'Indigent Residents',
            value: <?= $indigentcount ?>
        },
        {
            label: 'Malnourished Residents',
            value: <?= $malcount ?>
        },
        {
            label: 'Out of School Youth',
            value: <?= $osycount ?>
        },
        {
            label: 'LGBTQIA+',
            value: <?= $lgbtqcount ?>
        },
    ];

    // Define the options for the other chart
    var otherChartOptions = {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1 // Display only whole numbers on the y-axis
                }
            }
        }
    };

    // Extract data for the other chart
    var otherChartLabels = otherChartData.map(item => item.label);
    var otherChartValues = otherChartData.map(item => item.value);

    // Create the other chart
    var otherChart = new Chart(ctxOther, {
        type: 'bar',
        data: {
            labels: otherChartLabels,
            datasets: [{
                label: 'Resident Data',
                data: otherChartValues,
                backgroundColor: [
                    'rgba(54, 162, 235, 1)', // Blue

                ],

                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: otherChartOptions
    });

    // Define a mapping between the chart labels and the corresponding PHP page URLs
    var chartUrlMapping = {
        'Barangay Residents': 'admn_resident.php',
        'Head of the family': 'admn_hof.php',
        'Registered Voters': 'admn_resident_registered.php',
        'Unregistered Voters': 'admn_resident_unregistered.php',
        'Male Residents': 'admn_resident_Male.php',
        'Female Residents': 'admn_resident_female.php',
        'Minor Residents': 'admn_resident_minor.php',
        'Senior Residents': 'admn_resident_senior.php',
        'PWD Residents': 'admn_resident_pwd.php',
        'Single Parents': 'admn_resident_single.php',
        '4Ps Members': 'admn_resident_4ps.php',
        'Malnourished Residents': 'admn_resident_Mal.php',
        'Out of School Youth': 'admn_resident_osy.php',
        'LGBTQ+': 'admn_resident_lgbtq.php',
    };

    // Add click event listener to the other chart
    ctxOther.canvas.onclick = function(event) {
        var activePoint = otherChart.getElementsAtEventForMode(event, 'nearest', {
            intersect: true
        }, false)[0];
        if (activePoint) {
            var index = activePoint.index;
            var clickedLabel = otherChart.data.labels[index];

            // Check if the clicked label exists in the URL mapping
            if (chartUrlMapping[clickedLabel]) {
                // Redirect user to the corresponding URL
                window.location.href = chartUrlMapping[clickedLabel];
            }
        }
    };

    // Add click event listener to the number of records chart
    ctxNumberOfRecords.canvas.onclick = function(event) {
        var activePoint = numberOfRecordsChart.getElementsAtEventForMode(event, 'nearest', {
            intersect: true
        }, false)[0];
        if (activePoint) {
            var index = activePoint.index;
            var clickedLabel = numberOfRecordsChart.data.labels[index];

            // Check if the clicked label exists in the URL mapping
            if (chartUrlMapping[clickedLabel]) {
                // Redirect user to the corresponding URL
                window.location.href = chartUrlMapping[clickedLabel];
            }
        }
    };
</script>

<?php
include('dashboard_sidebar_end.php');
?>

</html>