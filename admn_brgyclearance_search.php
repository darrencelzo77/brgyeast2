<?php
// require the database connection
require 'classes/conn.php';
if (isset($_POST['search_bspermit'])) {
    $keyword = $_POST['keyword'];
?>
    <?php
    include('dashboard_sidebar_start.php');
    ?>
    <table class="table table-hover text-center table-bordered table-responsive">
        <thead class="alert-info">

            <tr>
                <th> Actions</th>
                <th> Resident ID </th>
                <th> Surname </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Purpose </th>
                <th> Address </th>
                <th> Status </th>
                <th> Age </th>
            </tr>
        </thead>

        <tbody>
            <?php
            $stmnt = $conn->prepare("SELECT * FROM `tbl_bspermit` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%' 
            or `bsname` LIKE '%$keyword%' or  `id_resident` LIKE '%$keyword%' or  `houseno` LIKE '%$keyword%' or  `street` LIKE '%$keyword%'
            or `brgy` LIKE '%$keyword%' or `municipal` LIKE '%$keyword%' or `bsindustry` LIKE '%$keyword%' or `age` LIKE '%$keyword%' ");
            $stmnt->execute();

            while ($view = $stmnt->fetch()) {
            ?>
                <tr>
                    <td>
                        <form action="" method="post">
                            <a class="btn btn-success" target="blank" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="brgyclearance_form.php?id_clearance=<?= $view['id_clearance']; ?>"></a>
                            <input type="hidden" name="id_clearance" value="<?= $view['id_clearance']; ?>">
                            <button class="btn btn-danger" type="submit" style="width: 80px; font-size: 15px; border-radius:5px;" name="delete_clearance"> Delete </button>
                        </form>
                    </td>
                    <td> <?= $view['id_resident']; ?> </td>
                    <td> <?= $view['lname']; ?> </td>
                    <td> <?= $view['fname']; ?> </td>
                    <td> <?= $view['mi']; ?> </td>
                    <td> <?= $view['purpose']; ?> </td>
                    <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?></td>
                    <td> <?= $view['status']; ?> </td>
                    <td> <?= $view['age']; ?> </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

<?php
} else {
?>
    <div class="table-responsive">
        <table class="table table-hover text-center table-bordered table-responsive">
            <thead class="alert-info">
                <tr>
                    <th> Resident ID </th>
                    <th style="width: 10%;"> Surname </th>
                    <th style="width: 10%;"> First Name </th>
                    <th style="width: 10%;"> Middle Name </th>
                    <th style="width: 20%;"> Purpose </th>
                    <th style="width: 20%;"> Address </th>
                    <th> Status </th>
                    <th style="width: 8.5%;"> Age </th>
                    <th style="width: 20%;"> Actions</th>

                </tr>
            </thead>

            <tbody>
                <?php if (is_array($view)) { ?>
                    <?php foreach ($view as $view) { ?>
                        <tr>
                            <td> <?= $view['id_resident']; ?> </td>
                            <td> <?= $view['lname']; ?> </td>
                            <td> <?= $view['fname']; ?> </td>
                            <td> <?= $view['mi']; ?> </td>
                            <td> <?= $view['purpose']; ?> </td>
                            <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?></td>
                            <td> <?= $view['status']; ?> </td>
                            <td> <?= $view['age']; ?> </td>
                            <td>
                                <form action="" method="post">
                                  

                                
  <a class="btn btn-success"
   style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;"
   href="brgyclearance_form.php?id_clearance=<?= $view['id_clearance']; ?>"
   onclick="openPopup(this.href); return false;">
   Generate
</a>
                                
                                



                                    <input type="hidden" name="id_clearance" value="<?= $view['id_clearance']; ?>">
                                    <button class="btn btn-danger" type="submit" style="width: 80px; font-size: 15px; border-radius:5px;" name="delete_clearance"> Delete </button>
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
    window.open(
        url,
        'generateWindow',
        'width=900,height=700,scrollbars=yes,resizable=yes'
    );
}
</script>
<?php
}
$con = null;
?>