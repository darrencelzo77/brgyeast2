<?php
ini_set('display_errors',0);
require('classes/resident.class.php');
$userdetails = $residentbmis->get_userdata();
$id_resident = $_GET['id_resident'];
$id_indigency = $_GET['id_indigency'];
$resident = $residentbmis->get_single_certofindigency_walkin($id_indigency);
$age = $residentbmis->get_single_resident($id_resident);
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
                padding-right: 30px; /* Add your desired padding here */
            }
    }
    @media print {
        body{
            overflow: hidden;
        }
        img{
            display: block !important;
        }
        .noprint{
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
                            <b>East Modern Site Barangay</b><br>
                            <b style="font-size:20px;">Office of Punong Barangay</b><br>
                            Email Address: barangayeastmodernsite@gmail.com
                        </p>
                    </center>
                        <image src="assets/logos.png" style="width:110px;height:110px; margin-top:35px; margin-right: 25px;"/>
                    </div>  <hr style="border:2px solid green;">
                    <div style="background-image: url('assets/logos.png'); background-size: cover;
                background-repeat: no-repeat; background-position: center; background-size: 80%; background-color: rgba(255, 255, 255, 0.9); background-blend-mode: overlay; background-position: center top; height: 800px;">
                        <p class="text-center" style="font-size: 30px; font-weight: bold; font-family: 'Copperplate Gothic Bold';">CERTIFICATE OF INDIGENCY<br></p><br>
                        <p class="print-padding" style="font-size: 14px;">TO WHOM IT MAY CONCERN:</p> 
                       

                        <p class="print-padding" style="text-indent:40px;text-align: justify;">This is to certify that <b><?= $resident['lname'];?>, <?= $resident['fname'];?> <?= $resident['mi'];?></b>, <b><?= $age['age'];?></b> years old belongs to indigent family of <b><?= $resident['houseno'];?> <?= $resident['street'];?></b>, Barangay East Modern Site, City of Bagiuo, Benguet.</p> 


                        <p class="print-padding" style="text-indent:40px;text-align: justify;">This certification is issued upon the request of the above-mentioned name for <b><?= $resident['purpose'];?></b>/whatever legal purpose it may serve him/her best.</p>

                        <?php
                        date_default_timezone_set('Asia/Manila');
                        ?>
                        <p class="print-padding" style="text-indent:40px;text-align: justify;">Issued this <ins><?= date('jS');?></ins> day of <ins><?= date('F');?></ins>, 2024, at East Modern Site Barangay, City of Bagiuo, BENGUET.</p> <br>
                       <div style="display: flex; flex-direction: column;">
                        <div style="flex: 1;"><br><br><br><br><br><br>
                                <!-- <image src="icons/signature.png" style="width:100px; margin-left:65px; position: absolute;"/><br> -->
                            <label style="font-size:18px;margin-left:1em; margin-top: 10px;"><u>HON. PETER G. BUCASAN </u></label>
                        </div>
                        <div>
                            <label style="font-size:18px; margin-left:2em;">Punong Barangay</label>
                        </div>
                    </div>
                <div class="col-xs-8 col-md-4" style="margin-top: 2em;"><br><br><br><br><br><br><br><br>
                    <b style="text-align: center;">Rest. Cert. No. _______</b><br>
                    <b><span style=" text-align: center;">Issued at </b><u>BRGY. EAST MODERN SITE</u></span><br>
                    <b><span style=" text-align: center;">Issued on </b>___________</span></br><br><br><br>
                    <center><p style="font-size: 15px; opacity: 0.6; margin-left: 18rem; font-weight: bold; font-family: 'Baskerville Old Face';">Not Valid Without Dry Seal<br></p></center>
                </div>
                </div>
            </div>
        </div>


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

  <button class="btn btn-primary noprint" id="printpagebutton" onclick="window.print()">
        <i class="fa fa-print"></i> Print
    </button>

    </body>

</html>