<?php
// require the database connection
require 'classes/conn.php';
if (isset($_POST['search_clearance'])) {
    $keyword = $_POST['keyword'];
?>
    <?php
    // include('dashboard_sidebar_start.php');
    ?>
    <table class="table table-hover text-center table-bordered table-responsive">
        <thead class="alert-info">

            <tr>
                <th> Resident ID </th>
                <th> Surname </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Purpose </th>
                <th> Address </th>
                <th> Status </th>
                <th> Age </th>
                <th style="width: 8.5%;"> Status</th>
                <th style="width: 20%;"> Actions</th>
                <th style="width: 20%;"> Update Status </th>

            </tr>
        </thead>
        <tbody>
            <?php
            $stmnt = $conn->prepare("SELECT * FROM `tbl_clearance` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  
                    `fname` LIKE '%$keyword%'  ORDER BY id_clearance DESC  ");
            $stmnt->execute();

            while ($view = $stmnt->fetch()) {
            ?>
                <tr>
                    <td> <?= $view['id_resident']; ?> </td>
                    <td> <?= $view['lname']; ?> </td>
                    <td> <?= $view['fname']; ?> </td>
                    <td> <?= $view['mi']; ?> </td>
                    <td> <?= $view['purpose']; ?> </td>
                    <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?></td>
                    <td> <?= $view['status']; ?> </td>
                    <td> <?= $view['age']; ?> </td>
                    <?php include('include_statuses2.php'); ?>
                    <td>
                        <form action="" method="post">



                            <a class="btn btn-success"
                                style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;"
                                href="brgyclearance_form.php?id_clearance=<?= $view['id_clearance']; ?>"
                                onclick="openPopup(this.href); return false;">
                                Generate
                            </a>





                            <input type="hidden" name="id_clearance" value="<?= $view['id_clearance']; ?>">
                            <!-- <button class="btn btn-danger" type="submit" style="width: 80px; font-size: 15px; border-radius:5px;" name="delete_clearance"> Delete </button> -->
                        </form>
                    </td>
                    <td style="width:180px;">
                        <form method="POST" action="update_status.php">

                            <input type="hidden" name="id_clearance" value="<?= $view['id_clearance']; ?>">

                            <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">

                                <option value="PENDING" <?= $view['status2'] == 'PENDING' ? 'selected' : '' ?>>PENDING</option>

                                <option value="APPROVED" <?= $view['status2'] == 'APPROVED' ? 'selected' : '' ?>>APPROVED</option>

                                <option value="REJECTED" <?= $view['status2'] == 'REJECTED' ? 'selected' : '' ?>>REJECTED</option>

                                <option value="READY FOR PICKUP" <?= $view['status2'] == 'READY FOR PICKUP' ? 'selected' : '' ?>>READY FOR PICKUP</option>

                                <option value="CLAIMED" <?= $view['status2'] == 'CLAIMED' ? 'selected' : '' ?>>CLAIMED</option>

                                <option value="DELETED" <?= $view['status2'] == 'DELETED' ? 'selected' : '' ?>>DELETED</option>

                            </select>

                        </form>
                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

<?php
} else {
?>
    <?php include('including_style.php'); ?>
    <div class="table-responsive  table-scroll">
        <table class="table table-hover text-center table-bordered">
            <thead class="alert-info">
                <tr>
                    <th> Resident ID </th>
                    <th> Control # </th>
                    <th style="width: 10%;"> Surname </th>
                    <th style="width: 10%;"> First Name </th>
                    <th style="width: 10%;"> Middle Name </th>
                    <th style="width: 20%;"> Purpose </th>
                    <th style="width: 20%;"> Address </th>
                    <th> Marital Status </th>
                    <th style="width: 8.5%;"> Age </th>
                    <th style="width: 8.5%;"> Status</th>
                    <th style="width: 20%;"> Actions</th>
                    <th style="width: 20%;"> Update Status </th>

                </tr>
            </thead>

            <tbody>
                <?php if (is_array($view)) { ?>
                    <?php foreach ($view as $view) { ?>
                        <tr>
                            <td> <?= $view['id_resident']; ?> </td>
                            <td> <?= $view['control_no']; ?> </td>
                            <td> <?= $view['lname']; ?> </td>
                            <td> <?= $view['fname']; ?> </td>
                            <td> <?= $view['mi']; ?> </td>
                            <td> <?= $view['purpose']; ?> </td>
                            <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?></td>
                            <td> <?= $view['status']; ?> </td>
                            <td> <?= $view['age']; ?> </td>
                            <?php include('include_statuses2.php'); ?>
                            <td>
                                <form action="" method="post">



                                    <a class="btn btn-success"
                                        style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;"
                                        href="brgyclearance_form.php?id_clearance=<?= $view['id_clearance']; ?>"
                                        onclick="openPopup(this.href); return false;">
                                        Generate
                                    </a>





                                    <input type="hidden" name="id_clearance" value="<?= $view['id_clearance']; ?>">
                                    <!-- <button class="btn btn-danger" type="submit" style="width: 80px; font-size: 15px; border-radius:5px;" name="delete_clearance"> Delete </button> -->
                                </form>
                            </td>
                            <td style="width:180px;">
                                <form method="POST" action="update_status.php">

                                    <input type="hidden" name="id_clearance" value="<?= $view['id_clearance']; ?>">

                                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">

                                        <option value="PENDING" <?= $view['status2'] == 'PENDING' ? 'selected' : '' ?>>PENDING</option>

                                        <option value="APPROVED" <?= $view['status2'] == 'APPROVED' ? 'selected' : '' ?>>APPROVED</option>

                                        <option value="REJECTED" <?= $view['status2'] == 'REJECTED' ? 'selected' : '' ?>>REJECTED</option>

                                        <option value="READY FOR PICKUP" <?= $view['status2'] == 'READY FOR PICKUP' ? 'selected' : '' ?>>READY FOR PICKUP</option>

                                        <option value="CLAIMED" <?= $view['status2'] == 'CLAIMED' ? 'selected' : '' ?>>CLAIMED</option>

                                        <option value="DELETED" <?= $view['status2'] == 'DELETED' ? 'selected' : '' ?>>DELETED</option>

                                    </select>

                                </form>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>
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

    <script>
function openPopup(url) {

    const width = 900;
    const height = 700;

    const left = (screen.width / 2) - (width / 2);
    const top = (screen.height / 2) - (height / 2);

    window.open(
        url,
        'generateWindow',
        `width=${width},height=${height},top=${top},left=${left},scrollbars=yes,resizable=yes`
    );
}
</script>
<?php
}
$con = null;
?>