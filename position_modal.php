<?php
    ini_set('display_errors',0);
    error_reporting(E_ALL ^ E_WARNING);
    require('classes/staff.class.php');
    $userdetails = $bmis->get_userdata();
    $bmis->validate_admin();
    $staffbmis->create_position();
    $staffbmis->delete_position();
    $view = $staffbmis->view_position();
    $upposition = $staffbmis->update_position();
    $id_position = $_GET['id_position'];
    $position = $staffbmis->get_single_position($id_position);
   
?>

<?php 
    include('dashboard_sidebar_start.php');
?>
<style>
    .input-icons i {
        position: absolute;
    }
        
    .input-icons {
        width: 30%;
        margin-bottom: 10px;
        margin-left: 34%;
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
            <h1> Position List</h1>
        </div>
    </div>

    <hr>
    <br><br>

    <button class="btn btn-success" style="width: 100px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px;" data-toggle="modal" data-target="#modalPosition"><i class="fas fa-plus icon" style="padding-left: 0; padding-top: 0; padding-bottom: 0;"></i>Add</button>
        <br>

        <div class="modal fade" id="modalPosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Barangay Position</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal Body -->

                        <div class="modal-body">
                            <form method="post" class="was-validated">

                                <div class="row"> 

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="position">Position:</label>
                                            <input name="position" type="text" class="form-control" placeholder="Enter Barangay Position" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pos_order">Position Order:</label>
                                            <input name="pos_order" type="text" class="form-control" placeholder="Enter Requirements" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <!-- Modal Footer -->
            
                        <div class="modal-footer">
                            <div class="paa">
                                <input name="id_position" type="hidden" class="form-control" value="<?= $userdetails['id_position']?>">
                                
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                <button name ="add_position" type="submit" class="btn btn-primary">Add Position</button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        <table class="table table-hover text-center table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
            <form action="" method="post">
                <thead class="alert-info"> 
                    <tr>
                        <th style="width: 5%;"> No. </th>
                        <th style="width: 20%;"> Position </th>
                        <th style="width: 20%;"> Position Order </th>
                        <th style="width: 20%;"> Actions </th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(is_array($view)) {?>
                        <?php foreach($view as $view) {?>
                            <tr>
                                <td> <?= $view['id_position'];?> </td>
                                <td> <?= $view['position'];?> </td>
                                <td> <?= $view['pos_order'];?> </td>
                                <td>    
                                    <form action="" method="post">
                                        <a href="update_position_form.php?id_position=<?= $view['id_position'];?>" class="btn btn-success" style="width: 100px; font-size: 15px; border-radius:5px; margin-bottom: 2px;"> Update </a>
                                        <input type="hidden" name="id_position" value="<?= $view['id_position'];?>">
                                        <button class="btn btn-danger" type="submit" name="delete_position" style="width: 100px; font-size: 15px; border-radius:5px;"> Delete </button>
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


<?php 
    include('dashboard_sidebar_end.php');
?>