<?php 
    error_reporting(E_ALL ^ E_WARNING);
    include('classes/resident.class.php');

    // User validation
    $userdetails = $bmis->get_userdata();
    $bmis->validate_admin();

    // Fetch Head of Family residents
    // Make sure you have a function inside resident.class.php:
    //   view_resident_headoffamily()
    $view = $residentbmis->view_resident_headoffamily();
?>

<?php 
    include('dashboard_sidebar_start.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Head of Family</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Head of Family List</h6>
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
                                <?php if (!empty($view)) : ?>
                                    <?php foreach ($view as $item) : ?>
                                        <tr>
                                            <td><?= $item['lname'] . ', ' . $item['fname'] . ' ' . $item['mi'] ?></td>
                                            <td><?= $item['age'] ?></td>
                                            <td><?= $item['sex'] ?></td>
                                            <td><?= $item['status'] ?></td>
                                            <td><?= $item['street'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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
