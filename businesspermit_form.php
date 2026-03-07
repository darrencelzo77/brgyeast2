<?php
ini_set('display_errors', 0);
require('classes/resident.class.php');
$userdetails = $residentbmis->get_userdata();
$id_permit = $_GET['id_bspermit'];
$resident = $residentbmis->get_single_bspermit_walkin($id_bspermit);
?>
<!DOCTYPE html>
<html id="clearance">
<!-- Add this <img> tag to include the background image -->
<img src="assets/logos.png" style="padding-top: 50%; position: fixed; opacity: 0.1; z-index: -1; top: 0; left: 0; display: none; background-size: cover; background-repeat: no-repeat; background-position: center; width: 100%; height: 80%; background-blend-mode: overlay;">


<!-- Modify the CSS to show the background image only when printing -->
<style>
    @media screen {
        p.print-padding {
            font-size: 14px;
            padding-left: 30px;
            padding-right: 30px;
            /* Add your desired padding here */
        }
    }

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

    <style>
    #printpagebutton {
        position: fixed;
        top: 15px;
        right: 15px;
        padding: 6px 14px;
        font-size: 13px;
        border-radius: 6px;
        z-index: 99999;
    }

    @media print {
        .noprint {
            display: none !important;
        }
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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->


    <?php

    include "classes/conn.php";

    ?>

    <div class="col-xs-12 col-sm-6 col-md-8">
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
                <image src="assets/logos.png" style="width:110px;height:110px; margin-top:35px; margin-right: 25px;" />
            </div>
            <hr style="border:2px solid green;">
            <div style="background-image: url('assets/logos.png'); background-size: cover;
                background-repeat: no-repeat; background-position: center; background-size: 80%; background-color: rgba(255, 255, 255, 0.9); background-blend-mode: overlay; background-position: center top; height: 800px;">
                <p class="text-center" style="font-size: 30px; font-weight: bold; font-family: 'Copperplate Gothic Bold';">BARANGAY BUSINESS CLEARANCE<br></p><br>
                <p class="print-padding" style="font-size: 14px;">TO WHOM IT MAY CONCERN:</p>
                <p class="print-padding" style="text-indent: 40px;text-align: justify;">This is to certify that:</p>
                <p style="text-align: center; margin-bottom: 0;"><b><u><?= $resident['bsname']; ?></u></b></p>
                <p style="font-size: 12px; text-align: center; margin-top: 0;">Company Name/Trade Name/Applicant Name</p>
                <p style="text-align: center; margin-bottom: 0;"><b><u><?= $resident['fname']; ?> <?= $resident['mi']; ?> <?= $resident['lname']; ?> </u></b></p>
                <p style="font-size: 12px; text-align: center; margin-top: 0;">Owner/Operator/Branch Manager</p>
                <p style="text-align: center; margin-bottom: 0;"><b><u><?= $resident['houseno']; ?> <?= $resident['street']; ?>, <?= $resident['brgy']; ?>, <?= $resident['municipal']; ?> </u></b></p>
                <p style="font-size: 12px; text-align: center; margin-top: 0;">Owner/s Address</p>
                <p class="print-padding" style="text-indent: 40px;text-align: justify;">Applied to operate a <b><u><?= $resident['bsname']; ?></u></b> with business address at <b><u><?= $resident['houseno']; ?> <?= $resident['street']; ?>, Brgy. East Modern Site, Bagiuo City, Benguet</b></u>.</b></p>


                <p class="print-padding" style="text-indent: 40px;text-align: justify;">This further certifies that the said business is not violating any of the provisions of RA 7160 and the Local Revenue Code of the Municipality of Bagiuo City, Benguet. That the said business will not adversely affect public order, health, condition, safety, convenience, comfort, interest and the general, welfare in the area.</p>
                <p class="print-padding" style="text-indent: 40px;text-align: justify;">In view of the aforementioned observation, approval of the subject application is hereby <b>GRANTED.</b></p>


                <?php
                date_default_timezone_set('Asia/Manila');
                ?>
                <p class="print-padding" style="text-indent:40px;text-align: justify;">Given this <ins><?= date('jS'); ?></ins> day of <ins><?= date('F'); ?></ins>, 2024, here at Barangay East Modern Site, Bagiuo City, Benguet, Philippines, for whatever legal purpose it may serve.</p>
                <p class="print-padding" style="text-indent:40px;text-align: justify;">The Business Permit shall be valid for six (6) months effective upon the date of its issuance.</p>
                <div style="display: flex;">
                    <div style="flex: 1;">
                        <p class="print-padding" style="font-size: 12px;">Conformed:</p><br>
                        <p class="print-padding" style="text-align: center; margin-bottom: 0;"><b><u><?= $resident['fname']; ?> <?= $resident['mi']; ?> <?= $resident['lname']; ?> </u></b></p>
                        <p class="print-padding" style="font-size: 12px; text-align: center; margin-top: 0;">Company/Applicant Name</p><br>
                    </div>
                    <div style="flex: 1;"><br>
                        <!-- <image src="icons/signature.png" style="width:100px; margin-left:65px; position: absolute;"/><br> -->
                        <label style="margin-left:1em; margin-top: 10px;"><u>HON. PETER G. BUCASAN</u></label><br>
                        <label style="margin-left:2em;">Punong Barangay</label><br><br>
                        <p style="text-align: center; margin-left: 20px;">O.R. No.: _________</p>
                        <p style="text-align: center; margin-left: 20px;">Date Applied: <b><u><ins><?= date('F'); ?> <ins><?= date('j'); ?>, 2024</ins></ins> </u></b></p>
                    </div>

                </div>
                <div class="col-xs-8 col-md-4">
                    <b style="text-align: center;">Rest. Cert. No. _______</b><br>
                    <b><span style=" text-align: center;">Issued at </b><u>BRGY.East Modern Site</u></span><br>
                    <b><span style=" text-align: center;">Issued on </b>___________</span><br><br><br>
                    <center>
                        <p style="font-size: 12px; opacity: 0.6; margin-left: 18rem; font-weight: bold; font-family: 'Baskerville Old Face';">Not Valid Without Dry Seal<br></p>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- <style>
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
    </style> -->

  <button class="btn btn-primary noprint" id="printpagebutton" onclick="window.print()">
        <i class="fa fa-print"></i> Print
    </button>

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