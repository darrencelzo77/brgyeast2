<?php
    
    error_reporting(E_ALL ^ E_WARNING);
    ini_set('display_errors',0);
    require('classes/resident.class.php');
    $userdetails = $bmis->get_userdata();
    $bmis->validate_admin();
    $bmis->create_travel_walkin();
    $bmis->delete_travel();
    $view = $residentbmis->view_travelpermit();
    $id_travel = $_GET['id_travel'];
    $resident = $residentbmis->get_single_travelpermit($id_travel);
   
?>

<?php 
    include('dashboard_sidebar_start.php');
?>

<style>
    .input-icons i {
        position: absolute;
    }
        
    .input-icons {
        width: 80%;
        margin-bottom: 10px;
        margin-left: auto;
        margin-right: auto;
    }
        
    .icon {
        padding: 10px;
        min-width: 40px;
    }
    .form-control{
        text-align: center;
    }
</style>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row"> 
        <div class="col text-center"> 
            <h1> Peace and Order Report Data</h1>
        </div>
    </div>

    <hr>
    <br><br>

    <div class="row"> 
        <div class="col">
            <form method="POST">
                <div class="input-icons">
                    <i class="fa fa-search icon"></i>
                    <input type="search" class="form-control" name="keyword" style="border-radius: 30px;" value="" required=""/>
                </div>
                <button class="btn btn-success" style="width: 70px; font-size: 15px; border-radius:5px; margin-left:42%;" name="search_bspermit">Search</button>
                <a href="admn_travelreport.php" class="btn btn-info" style="width: 70px; font-size: 15px; border-radius:5px;">Reload</a>
            </form>
            <br>
        </div>
    </div>

    <br>
    <button class="btn btn-success" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus icon" style="padding-left: 0; padding-top: 0; padding-bottom: 0;"></i>Add</button>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Complain Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal Body -->

                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data"> 

                                <div class="row"> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="lname">Last name:</label>
                                            <input name="lname" type="text" class="form-control" style="text-align:left;" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="fname">First name:</label>
                                            <input name="fname" type="text" class="form-control"  style="text-align:left;" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>  
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="mname">Middle name:</label>
                                            <input name="mi" type="text" class="form-control"  style="text-align:left;">
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>  
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="age" class="mtop">Age </label>
                                            <input type="number" name="age" id="age" class="form-control" style="text-align:left;" placeholder="Enter your Age" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field with a valid age.</div>

                                                <script>
                                                    // Get the input element
                                                    var ageInput = document.getElementById("age");

                                                    // Add an event listener for input changes
                                                    ageInput.addEventListener("input", function() {
                                                        // Get the entered value
                                                        var age = parseInt(ageInput.value);

                                                        // Check if the value is a number and within the valid range
                                                        if (isNaN(age) || age < 0 || age > 100) {
                                                            // If not valid, set the input as invalid
                                                            ageInput.setCustomValidity("Please enter a valid age between 0 and 150 years.");
                                                        } else {
                                                            // If valid, clear any previous validation message
                                                            ageInput.setCustomValidity("");
                                                        }
                                                    });
                                                </script>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">            
                                            <label for="cno">Contact Number:</label>
                                            <input name="contact"  style="text-align:left;" type="text" maxlength="11" class="form-control" placeholder="0912-345-6789"pattern="[0-9]{11}" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>            

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label> House No: </label>
                                            <input type="text" class="form-control" name="houseno"  
                                            placeholder="Enter House No."  style="text-align:left;" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Street: </label>
                                            <input type="text" class="form-control"  style="text-align:left;" name="street"  
                                            placeholder="Enter Street" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                            <!--<label> Barangay: </label>-->
                                            <input type="hidden" class="form-control" name="brgy"  
                                            placeholder="Enter Barangay" value="East Modern Site" required readonly>

                                            <!--<label> Municipality: </label>-->
                                            <input type="hidden" class="form-control" name="municipal" 
                                            placeholder="Enter Municipality" value="Bagiuo City" required readonly>
                                </div>

                                <hr>

                                <h6>Guidelines for Narrative Report:</h6>

                                <p>
                                    <ul style="font-size: 15px;">
                                        <li>
                                            Use simple, everyday words rather than complex terminology.
                                        </li>
                                        <li>
                                            Be specific on your report
                                        </li>
                                        <li>
                                            Don't use bad words
                                        </li>
                                        <li>
                                            Clear and Easy to read report
                                        </li>
                                        <li>
                                            Don't use Emoji or any kind of Symbols. 
                                        </li>
                                    </ul>
                                </p>
                                
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="report">Narrative Report:</label>
                                            <textarea class="form-control" rows="5"  style="text-align:left;" id="report" name="narrative" placeholder="Enter Message here" required></textarea>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer" style="justify-content: flex-start;">
                                    <div class="paa">
                                        <input name="id_resident" type="hidden" value="<?= $resident['id_resident']?>">
                                        <button type="submit" name="create_travel_walkin" class="btn btn-primary">Submit Report</button>
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div> 
                            
                            </form>
 
                        </div>
                    </div>
                </div>
            </div>  
    <div class="row"> 
        <div class="col"> 
            <?php 
                include('admn_travelreport_search.php');
            ?>
        </div>
    </div>
    
</div>
<br><br><br>
  
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
</body>
