<?php 
    error_reporting(E_ALL ^ E_WARNING);
    include('classes/resident.class.php');
    $userdetails = $bmis->get_userdata();
    $bmis->validate_admin();
    $view = $residentbmis->view_resident_lgbtq();
?>

<?php 
    include('dashboard_sidebar_start.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">LGBTQ+ Residents</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">LGBTQ+ Residents List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Civil Status</th>
                                    <th>Street</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($view)){ ?>
                                    <?php foreach($view as $item){ ?>
                                        <tr>
                                            <td><?= $item['lname'] . ', ' . $item['fname'] . ' ' . $item['mi']?></td>
                                            <td><?= $item['age'] ?></td>
                                            <td><?= $item['sex'] ?></td>
                                            <td><?= $item['status'] ?></td>
                                            <td><?= $item['street'] ?></td>
                                        
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include('dashboard_sidebar_end.php');
?> 