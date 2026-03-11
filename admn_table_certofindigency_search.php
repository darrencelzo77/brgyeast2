<?php
// require the database connection
require 'classes/conn.php';
$bmis->delete_certofindigency();
if (isset($_POST['search_certofindigency'])) {
    $keyword = $_POST['keyword'];
?>
    <table class="table table-hover text-center table-bordered table-responsive">

        <thead class="alert-info">
            <tr>
                <th style="width: 10%;"> Resident ID </th>
                <th style="width: 10%;"> Surname </th>
                <th style="width: 10%;"> First Name </th>
                <th style="width: 10%;"> Middle Name </th>
                <th style="width: 10%;"> Nationality </th>
                <th style="width: 10%;"> Address </th>
                <th style="width: 10%;"> Purpose </th>
                <th style="width: 10%;"> Date </th>
                <th style="width: 10%;"> Status </th>
                <th style="width: 20%;"> Actions</th>
                <th style="width: 20%;"> Update Status </th>

            </tr>
        </thead>

        <tbody>
            <?php

            $stmnt = $conn->prepare("SELECT * FROM `tbl_indigency` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%'   order by id_indigency DESC");
            $stmnt->execute();

            while ($view = $stmnt->fetch()) {
            ?>
                <tr>

                    <td> <?= $view['id_resident']; ?> </td>
                    <td> <?= $view['lname']; ?> </td>
                    <td> <?= $view['fname']; ?> </td>
                    <td> <?= $view['mi']; ?> </td>
                    <td> <?= $view['nationality']; ?> </td>
                    <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?></td>
                    <td> <?= $view['purpose']; ?> </td>
                    <td> <?= $view['date']; ?> </td>
                    <?php include('include_statuses.php'); ?>
                    <td>
                        <form action="" method="post">



                            <a class="btn btn-success"
                                style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;"
                                href="indigency_form.php?id_indigency=<?= $view['id_indigency']; ?>"
                                onclick="openPopup(this.href); return false;">
                                Generate
                            </a>



                            <input type="hidden" name="id_indigency" value="<?= $view['id_indigency']; ?>">
                            <!-- <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_certofindigency"> Delete </button> -->
                        </form>
                    </td>
                    <td style="width:180px;">
                        <form method="POST" action="update_status.php">

                            <input type="hidden" name="id_indigency" value="<?= $view['id_indigency']; ?>">

                            <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">

                                <option value="PENDING" <?= $view['status'] == 'PENDING' ? 'selected' : '' ?>>PENDING</option>

                                <option value="APPROVED" <?= $view['status'] == 'APPROVED' ? 'selected' : '' ?>>APPROVED</option>

                                <option value="REJECTED" <?= $view['status'] == 'REJECTED' ? 'selected' : '' ?>>REJECTED</option>

                                <option value="READY FOR PICKUP" <?= $view['status'] == 'READY FOR PICKUP' ? 'selected' : '' ?>>READY FOR PICKUP</option>

                                <option value="CLAIMED" <?= $view['status'] == 'CLAIMED' ? 'selected' : '' ?>>CLAIMED</option>

                                <option value="DELETED" <?= $view['status'] == 'DELETED' ? 'selected' : '' ?>>DELETED</option>

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
                    <th style="width: 10%;"> Resident ID </th>
                    <th style="width: 10%;"> Control # </th>
                    <th style="width: 10%;"> Surname </th>
                    <th style="width: 10%;"> First Name </th>
                    <th style="width: 10%;"> Middle Name </th>
                    <th style="width: 10%;"> Nationality </th>
                    <th style="width: 10%;"> Address </th>
                    <th style="width: 10%;"> Purpose </th>
                    <th style="width: 10%;"> Date </th>
                    <th style="width: 10%;"> Status </th>
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
                            <td> <?= $view['nationality']; ?> </td>
                            <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?></td>
                            <td> <?= $view['purpose']; ?> </td>
                            <td> <?= $view['date']; ?> </td>
                            <?php include('include_statuses.php'); ?>
                            <td>
                                <form action="" method="post">



                                    <a class="btn btn-success"
                                        style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;"
                                        href="indigency_form.php?id_indigency=<?= $view['id_indigency']; ?>"
                                        onclick="openPopup(this.href); return false;">
                                        Generate
                                    </a>



                                    <input type="hidden" name="id_indigency" value="<?= $view['id_indigency']; ?>">
                                    <!-- <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_certofindigency"> Delete </button> -->
                                </form>
                            </td>
                            <td style="width:180px;">
                                <form method="POST" action="update_status.php">

                                    <input type="hidden" name="id_indigency" value="<?= $view['id_indigency']; ?>">

                                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">

                                        <option value="PENDING" <?= $view['status'] == 'PENDING' ? 'selected' : '' ?>>PENDING</option>

                                        <option value="APPROVED" <?= $view['status'] == 'APPROVED' ? 'selected' : '' ?>>APPROVED</option>

                                        <option value="REJECTED" <?= $view['status'] == 'REJECTED' ? 'selected' : '' ?>>REJECTED</option>

                                        <option value="READY FOR PICKUP" <?= $view['status'] == 'READY FOR PICKUP' ? 'selected' : '' ?>>READY FOR PICKUP</option>

                                        <option value="CLAIMED" <?= $view['status'] == 'CLAIMED' ? 'selected' : '' ?>>CLAIMED</option>

                                        <option value="DELETED" <?= $view['status'] == 'DELETED' ? 'selected' : '' ?>>DELETED</option>

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
<?php
}
$con = null;
?>

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