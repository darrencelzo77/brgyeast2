<?php
    ini_set('display_errors',0);
    error_reporting(E_ALL ^ E_WARNING);
    require('classes/staff.class.php');
    $userdetails = $bmis->get_userdata();
    $bmis->validate_admin();
    $staffbmis->create_staff();
    $view = $staffbmis->view_staff();
    $upstaff = $staffbmis->update_staff();
    $staffbmis->delete_staff();
    $id_staff = $_GET['id_staff'];
    $staff = $staffbmis->get_single_staff($id_staff);
?>

<?php 
    include('dashboard_sidebar_start.php');
?>

<body>

    <style>
            .input-icons i {
                position: absolute;
            }
                
            .input-icons {
                width: 30%;
                margin-bottom: 20px;
                margin-left: 34%;
            }
                
            .icon {
                padding: 10px;
                min-width: 40px;
            }

            .search{
                text-align: center;
            }
        </style>
<!-- Begin Page Content -->

<div class="container-fluid">

    <h1 class="mb-1 text-center">Barangay Staff Data</h1>

    <hr>
    <br>
    <div class="col-md-12">

                    </div>

        <button class="btn btn-success" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px;" data-toggle="modal" data-target="#modalOfficial"><i class="fas fa-plus icon" style="padding-left: 0; padding-top: 0; padding-bottom: 0;"></i>Add</button>
        <br>

        <div class="modal fade" id="modalOfficial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Adding of  Staff</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal Body -->

                        <div class="modal-body">
                            <form method="post">

                                <div class="row"> 

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Fullname:</label>
                                            <input name="name" type="text" class="form-control" placeholder="Enter Official's name" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                </div>
<hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Term Started: </label>
                                            <input type="date" class="form-control" name="termstart" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Term Ended: </label>
                                            <input type="date" class="form-control" name="termend" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="position">Position:</label>
                                            <input name="position" type="text" class="form-control" placeholder="Enter position" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <!--<div class="col">
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select class="form-control" name="status" id="status" placeholder="Enter Status" required>
                                            <option value="">Choose Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Not Active">Not Active</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>-->
                                    
                                </div>
                           
                        </div>

                        <!-- Modal Footer -->
            
                        <div class="modal-footer">
                            <div class="paa">
                                <input name="id_resident" type="hidden" class="form-control" value="<?= $userdetails['id_resident']?>">
                                
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                <button name ="add_official" type="submit" class="btn btn-primary">Add Official</button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        <table class="table table-hover text-center table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
            <form action="" method="post">
                <thead class="alert-info"> 
                    <tr>
                        <th style="width: 3%;"> No. </th>
                        <th style="width: 17%;"> Full Name </th>
                        <th style="width: 10%;"> Position </th>
                        <th style="width: 8%;"> Term Started </th>
                        <th style="width: 8%;"> Term End </th>
                        <th style="width: 13%;"> Actions </th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(is_array($view)) {?>
                        <?php foreach($view as $view) {?>
                            <tr>
                                <td> <?= $view['id_official'];?> </td>
                                <td> <?= $view['name'];?> </td>
                                <td> <?= $view['position'];?> </td>
                                <td> <?= $view['termstart'];?> </td>
                                <td> <?= $view['termend'];?> </td>
                                <!--<td>    
                                    <form action="" method="post">
                                        <?php if ($view['status'] == 'Active') { ?>
                                            <button class="btn btn-success" type="submit" name="update_status" style="width: 100px; font-size: 15px; border-radius:5px;"> Active </button>
                                        <?php } else { ?>
                                            <button class="btn btn-danger" type="submit" name="update_status" style="width: 100px; font-size: 15px; border-radius:5px;"> Not Active </button>
                                        <?php } ?>
                                        <input type="hidden" name="id_user" value="<?= $view['id_user'];?>">
                                    </form>
                                </td>-->
                                <td>    
                                    <form action="" method="post" style="display: inline;">
                                        <button type="button" class="btn btn-primary btn-sm" 
                                            onclick="window.location.href='admn_resident_view.php?id=<?= $view['id'] ?>'"
                                            style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;">
                                            View
                                        </button>
                                        <input type="hidden" name="resident_id" value="<?= $view['id'] ?>">
                                        <button type="submit" name="delete_resident" class="btn btn-danger btn-sm"
                                            style="width: 80px; font-size: 15px; border-radius:5px;"
                                            onclick="return confirm('Are you sure you want to delete this resident?');">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php }?>
                    <?php } ?>
                </tbody>
            </form>
        </table>
    </div>
</div>

<br><br>

<!-- End of Main Content -->

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

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Resident Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="resident_id" id="resident_id">
                    
                    <div class="form-group">
                        <label>Out of School Youth</label>
                        <select class="form-control" name="out_of_school_youth" id="out_of_school_youth" required>
                            <option value="">Select...</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>LGBTQ+</label>
                        <select class="form-control" name="lgbtq" id="lgbtq" required>
                            <option value="">Select...</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_resident" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openUpdateModal(id, osy, lgbtq, ip) {
    $('#resident_id').val(id);
    $('#out_of_school_youth').val(osy);
    $('#lgbtq').val(lgbtq);
    $('#ip_community').val(ip);
    $('#updateModal').modal('show');
}
</script>
</body>