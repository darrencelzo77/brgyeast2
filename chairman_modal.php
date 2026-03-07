<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL ^ E_WARNING);
    require('classes/resident.class.php');
    $userdetails = $bmis->get_userdata();
    $bmis->validate_admin();
    $view = $residentbmis->view_system();
    $upsystem = $residentbmis->update_system_info();
    $id_system = isset($_GET['id_system']) ? $_GET['id_system'] : null;
    $system = $residentbmis->get_single_system($id_system);
?>

<?php 
    include('dashboard_sidebar_start.php');
?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="mb-4 text-center">System Information</h1>

    <hr>
    <br>

    <div class="row">
        <div class="col-md-2"> </div>
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header bg-primary text-white"> Update System Information </div>
                <div class="card-body"> 
                    <form method="post">
                        <div class="row" style="margin-top: 1.0em;">
                            <div class="col">
                                <label class="form-group"><b>System Name:</b> </label>
                                <input type="text" class="form-control" name="name" value="<?= $system['name'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1.1em;">
                            <div class="col">
                                <label class="form-group"><b>System Acronym:</b> </label>
                                <input type="text" class="form-control" name="acronym" value="<?= $system['acronym'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1.1em;">
                            <div class="col">
                                <label class="form-group"><b>Powered By:</b> </label>
                                <input type="text" class="form-control" name="poweredBy" value="<?= $system['poweredBy'];?>">
                            </div>
                        </div>

                        
                        
                        <hr>
                        <input type="hidden" name="id_system" value="<?= $view['id_system'];?>">
                        
                        <center><button class="btn btn-primary" type="submit" name="update_system_info" style="width: 120px; font-size: 18px; border-radius:30px;"> 
                            Update 
                        </button></center>
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
<br>
<br>
<br>
<br>

<br>
<br>

<br>
<br>
<br>

        <footer id="footer" style="background-color: 073260; color: white;" class="d-flex-column text-center">

            <!--Copyright-->

            <div class="py-3 text-center">
                -
                <script>
                document.write(new Date().getFullYear())
                </script> 
                | East Modern Site Barangay Information System
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

</body>



</html>
