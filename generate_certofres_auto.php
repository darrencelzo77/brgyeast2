<?php

include './classes/conn.php';

if (isset($_POST['generate'])) {
    $certNo = str_pad(mt_rand(0, 99999999999), 11, '0', STR_PAD_LEFT);

    $idcertofres = $_POST['id'];

    // Prepare the select statement
    $select = "SELECT * FROM `tbl_certofres` WHERE id_certofres = :idcertofres";
    $stmt = $conn->prepare($select);
    $stmt->bindParam(':idcertofres', $idResident);

    try {
        // Execute the statement
        $stmt->execute();

        // Fetch the resident data
        $residentData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($residentData) {
            // Extract the resident data for use
            $lname = $residentData['lname'] ?? '';
            $fname = $residentData['fname'] ?? '';
            $mi = $residentData['mi'] ?? '';
            $age = $residentData['age'] ?? '';
            $nationality = $residentData['nationality'] ?? '';
            $houseno = $residentData['houseno'] ?? '';
            $street = $residentData['street'] ?? '';
            $brgy = $residentData['brgy'] ?? '';
            $municipal = $residentData['municipal'] ?? '';
            $date = $_POST['date'] ?? '';
            $purpose = $_POST['purpose'] ?? '';
        } else {
            // Handle the case where no resident was found
            echo "No resident found with that ID.";
            // You can also set default values for the output if needed
            $lname = $fname = $mi = $houseno = $street = ''; // Set defaults to avoid warnings
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO tbl_rescert (cert_no, id_resident, lname, fname, mi, age, nationality, houseno, street, brgy, municipal, date, purpose) 
            VALUES (:cert_no, :id_resident, :lname, :fname, :mi, :age, :nationality, :houseno, :street, :brgy, :municipal, :date, :purpose)";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':cert_no', $certNo);
    $stmt->bindParam(':id_resident', $idResident);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':mi', $mi);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':nationality', $nationality);
    $stmt->bindParam(':houseno', $houseno);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':brgy', $brgy);
    $stmt->bindParam(':municipal', $municipal);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':purpose', $purpose);

    // Execute the statement
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html id="clearance">
<!-- Add this <img> tag to include the background image -->
<img src="assets/logos1.png" style="padding-top: 50%; position: fixed; opacity: 0.1; z-index: -1; top: 0; left: 0; display: none; background-size: cover; background-repeat: no-repeat; background-position: center; width: 100%; height: 80%; background-blend-mode: overlay;">


<!-- Modify the CSS to show the background image only when printing -->
<style>
    @media print {
        body {
            overflow: hidden;
        }

        img {
            display: block !important;
        }

        .noprint {
            display: none !important;
        }
    }

    @page {
        size: A4;
        margin-top: 0.15in;
        margin-bottom: 0.15in;
        margin-left: 1in;
        margin-right: 1in;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>East Modern Site Barangay Information System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="bootstrap/css/morris-0.4.3.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="bootstrap/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="bootstrap/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="bootstrap/css/select2.css" rel="stylesheet" type="text/css" />
    <script src="bootstrap/css/jquery-1.12.3.js" type="text/javascript"></script>

</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->


    <?php

    include "classes/conn.php";

    ?>

    <div class="col-xs-12 col-sm-6 col-md-8" style="background-color: white;">

        <div style="width: 100%; height:100%; max-height: 1000px;">
            <div style="margin-top:30px; opacity: 0.6; display: flex; justify-content: space-between;">
                <image src="assets/LGUbagiuo.png" style="width: auto; height: 100px; margin-top: 35px; margin-left: 25px;" />
                <center>
                    <p style="margin-top: 20px;">Republic of the Philippines<br>
                        Province of Benguet<br>
                        City of Bagiuo<br>
                        <b>BARANGAY EAST MODERN SITE</b><br>
                        <b style="font-size:20px;">Office of Punong Barangay</b><br>
                        Email Address: barangayeastmodernsite@gmail.com
                    </p>
                </center>
                <image src="assets/logos1.png" style="width: auto; height: 110px; margin-top: 35px; margin-right: 25px;" />
            </div>
            <hr style="border:2px solid blue;">
            <div style="background-image: url('assets/logos1.png'); background-size: cover; background-repeat: no-repeat; background-position: center; background-size: 80%; background-color: rgba(255, 255, 255, 0.9); background-blend-mode: overlay; background-position: center top; height: 800px;">
                <p class="text-center" style="font-size: 30px; font-weight: bold; font-family: 'Copperplate Gothic Bold';"><u>CERTIFICATE OF RESIDENCY</u><br></p><br><br>
                <p style="text-indent:40px;text-align: justify;">This is to certify that <u><b><?= $lname; ?>, <?= $fname; ?> <?= $mi; ?></b></u>, is a bonafide resident of <u><b><?= $houseno ?>, <?= $street; ?>, BRGY. EAST MODERN SITE, Baguio City, Benguet</b></u>

                <p style="text-indent:40px;text-align: justify;">This certification is issued upon request of a forenamed person for whatever legal purposes it may serve.
                    <?php
                    date_default_timezone_set('Asia/Manila');
                    ?>
                <p style="text-indent:40px;text-align: justify;">Given this <ins><?= date('jS'); ?></ins> day of <ins><?= date('F'); ?></ins>, 2024, here at East Modern Site Barangay, Baguio City, Benguet</p> <br><br>

                <div style="display: flex;">
                    <div style="flex: 1;">

                        <br><br><br><br>
                        <!-- <image src="icons/signature.png" style="width:100px; margin-left:65px; position: absolute;" /><br> -->
                        <label style="font-size:18px;margin-left:1em; margin-top: 10px;"><u>HON. PETER G. BUCASAN</u></label><br>
                        <label style="font-size:18px; margin-left:2em;">Punong Barangay</label>
                    </div>
                    <div style="flex: 1;">
                        <!-- Second column for table -->
                        <!--<table border="1" style="width: 300px;">
                                    <tr style="height: 25px;">
                                        <td colspan="2" style="padding-left: 10px;">Thumbmarks</td>
                                    </tr>
                                    <tr style="height: 80px; vertical-align: bottom;">
                                        <td style="width: 150px; padding-left: 10px;">Left</td>
                                        <td style="width: 150px; padding-left: 10px;">Right</td>
                                    </tr>
                                    <tr style="height: 50px; opacity: 0.0;">
                                        <td colspan="2" style="padding-left: 10px;">No</td>
                                    </tr>
                                    <tr style="height: 25px;">
                                        <td colspan="2" style="padding-left: 10px;">Applicant Signature</td>
                                    </tr>
                                </table>-->
                    </div>
                </div>

                <div class="col-xs-8 col-md-4" style="margin-top: 2em;"><br><br><br><br><br><br><br><br>
                    <b style="text-align: center;">Rest. Cert. No. <?= $certNo ?></b><br>
                    <b><span style=" text-align: center;">Issued at </b><u>BRGY. EAST MODERN SITE</u></span><br>
                    <b><span style=" text-align: center;">Issued on </b>___________</span><br><br><br>
                    <center>
                        <p style="font-size: 15px; opacity: 0.6; margin-left: 18rem; font-weight: bold; font-family: 'Baskerville Old Face';">Not Valid Without Dry Seal<br></p>
                    </center>
                </div><!--col-xs-8-->
            </div>
        </div>
    </div>

    <style>
        .btn {
            /* Button base styles */
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            width: 300px;
            height: 170px;
            background-image: url('prints.png');
        }

        .btn-primary {
            /* Primary button styles */
            background-color: 073260;
            color: #fff;
        }

        /* Additional styles for the print button */
        #printpagebutton {
            /* Your custom styles here */
            /* For example: */
            margin-top: 30%;
            margin-left: 200px;
        }
    </style>

    <button class="btn btn-primary noprint" id="printpagebutton" onclick="PrintElem('#clearance')">Print</button>
</body>
<?php

?>


<script>
    function PrintElem(elem) {
        window.print();
    }

    function Popup(data) {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        //mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        //mywindow.document.write('</head><body class="skin-black" >');
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        mywindow.document.write(data);
        //mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();

        printButton.style.visibility = 'visible';
        mywindow.close();

        return true;
    }
</script>

</html>