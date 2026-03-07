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
                <th> Actions</th>
                <th> Resident ID </th>
                <th> Surname </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Nationality </th>
                <th> Address </th>
                <th> Purpose </th>
                <th> Date </th>
            </tr>
        </thead>

        <tbody>
            <?php

            $stmnt = $conn->prepare("SELECT * FROM `tbl_rescert` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%' 
                or  `id_resident` LIKE '%$keyword%' or  `nationality` LIKE '%$keyword%' or  `houseno` LIKE '%$keyword%'
            or `street` LIKE '%$keyword%' or `brgy` LIKE '%$keyword%' or `municipal` LIKE '%$keyword%' or `date` LIKE '%$keyword%' or `purpose` LIKE '%$keyword%'");
            $stmnt->execute();

            while ($view = $stmnt->fetch()) {
            ?>
                <tr>
                    <td>
                        <form action="" method="post">
                            <a class="btn btn-success" target="blank" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="indigency_form.php?id_indigency=<?= $view['id_indigency']; ?>">Generate</a>
                            <input type="hidden" name="id_indigency" value="<?= $view['id_indigency']; ?>">
                            <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_certofindigency"> Delete </button>
                        </form>
                    </td>
                    <td> <?= $view['id_resident']; ?> </td>
                    <td> <?= $view['lname']; ?> </td>
                    <td> <?= $view['fname']; ?> </td>
                    <td> <?= $view['mi']; ?> </td>
                    <td> <?= $view['nationality']; ?> </td>
                    <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?></td>
                    <td> <?= $view['purpose']; ?> </td>
                    <td> <?= $view['date']; ?> </td>
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
                    <th style="width: 10%;"> Resident ID </th>
                    <th style="width: 10%;"> Surname </th>
                    <th style="width: 10%;"> First Name </th>
                    <th style="width: 10%;"> Middle Name </th>
                    <th style="width: 10%;"> Nationality </th>
                    <th style="width: 10%;"> Address </th>
                    <th style="width: 10%;"> Purpose </th>
                    <th style="width: 10%;"> Date </th>
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
                            <td> <?= $view['nationality']; ?> </td>
                            <td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?></td>
                            <td> <?= $view['purpose']; ?> </td>
                            <td> <?= $view['date']; ?> </td>
                            <td>
                                <form action="" method="post">
                                 
                                
                                
  <a class="btn btn-success"
   style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;"
   href="indigency_form.php?id_indigency=<?= $view['id_indigency']; ?>"
   onclick="openPopup(this.href); return false;">
   Generate
</a>
                                
                                

                                    <input type="hidden" name="id_indigency" value="<?= $view['id_indigency']; ?>">
                                    <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_certofindigency"> Delete </button>
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
    window.open(
        url,
        'generateWindow',
        'width=900,height=700,scrollbars=yes,resizable=yes'
    );
}
</script>