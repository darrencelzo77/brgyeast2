<?php
    error_reporting(E_ALL ^ E_WARNING);
    require('classes/resident.class.php');
    $userdetails = $bmis->get_userdata();
    //$bmis->validate_admin();
    $view = $staffbmis->view_system();
    $upsystem = $staffbmis->update_system_info();
    $id_system = $_GET['id_system'];
    $system = $residentbmis->get_single_system($id_system);
?>

<?php 
    include('dashboard_sidebar_start.php');
?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="mb-4 text-center">System's Information</h1>

    <hr>
    <br>

    <div class="row">
    <div class="col-md-2"> </div>
    <div class="col-md-8">
        <div class="card"> 
            <div class="card-header bg-primary text-white"> Update System Information </div>
            <div class="card-body"> 
            <form method="post" onsubmit="return handleUpdateFormSubmit()">
                    <div class="row">
                        <div class="col">
                            <label class="form-group">System's Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter System's Name" value="<?= $system['name'];?>">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1.1em;">
                        <div class="col">
                            <label class="form-group">Acronym: </label>
                            <input type="text" class="form-control" name="acronym"  placeholder="Enter Position" value="<?= $system['acronym'];?>">
                        </div>
        
                    </div>
                    <div class="row" style="margin-top: .5em;">
                        <div class="col">
                            <label class="form-group">Powered By: </label>
                            <input type="text" class="form-control" name="poweredBy"  placeholder="Powered By" value="<?= $system['poweredBy'];?>">
                        </div>
                    </div>
                    
                    <input type="hidden" class="form-control" name="role" value="user">
                    <input type="hidden" class="form-control" name="addedby" value="<?= $userdetails['surname']?>, <?= $userdetails['firstname']?>">
                    <br>
                    <hr>
                    <a href="chairmain_modal.php" class="btn btn-danger" style="width: 120px; font-size: 18px; border-radius:5px; margin-left:33%;"> Back </a>
                    <button class="btn btn-primary" type="submit" name="update_system_info" style="width: 120px; font-size: 18px; border-radius:5px;">
                        Update 
                    </button>
                </form>         
            </div>
        </div>
    </div>
    <div class="col-md-2"> </div>
</div>

    
    <br>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->

<!-- Footer -->
        <!-- Footer -->

        <footer id="footer" class="d-flex-column text-center">

            <!--Copyright-->

            <div class="py-3 text-center">
                -
                <script>
                document.write(new Date().getFullYear())
                </script> 
                |BARANGAY EAST MODERN SITE Information System
            </div>

        </footer>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Bootstrap Datepicker CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

        <!-- Bootstrap Datepicker JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>



    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
    <!-- responsive tags for screen compatibility -->
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <!-- bootstrap css --> 
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"> 
    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>

    <script>
    $(document).ready(function(){
        console.log("Document is ready.");
        // Initialize datepicker for termstart
        $('#termstart').datepicker({
            format: 'yyyy-mm-dd', // Set the desired date format
            autoclose: true, // Close the datepicker when a date is selected
            todayHighlight: true // Highlight today's date
        });

        // Initialize datepicker for termend
        $('#termend').datepicker({
            format: 'yyyy-mm-dd', // Set the desired date format
            autoclose: true, // Close the datepicker when a date is selected
            todayHighlight: true // Highlight today's date
        });
    });
</script>

</body>
<script>
function handleUpdateFormSubmit() {
    // Ipakita ang alert box na may mensaheng "Successfully updated!"
    alert("Successfully updated!");
    // Magbalik ng true upang ipagpatuloy ang form submission
    return true;
}
</script>



</html>
