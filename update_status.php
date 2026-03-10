<?php
include('dbcon.php');

if (isset($_POST['status']) && isset($_POST['id_rescert'])) {

    $status = $_POST['status'];
    $id = $_POST['id_rescert'];

    $query = "UPDATE tbl_rescert SET status='$status' WHERE id_rescert='$id'";

    if (mysqli_query($db_connection, $query)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating status.";
    }
}
if (isset($_POST['status']) && isset($_POST['id_bspermit'])) {

    $status = $_POST['status'];
    $id = $_POST['id_bspermit'];

    $query = "UPDATE tbl_bspermit SET status='$status' WHERE id_bspermit='$id'";

    if (mysqli_query($db_connection, $query)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating status.";
    }
}
if (isset($_POST['status']) && isset($_POST['id_clearance'])) {

    $status = $_POST['status'];
    $id = $_POST['id_clearance'];

    $query = "UPDATE tbl_clearance SET status2='$status' WHERE id_clearance='$id'";

    if (mysqli_query($db_connection, $query)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating status.";
    }
}
if (isset($_POST['status']) && isset($_POST['id_indigency'])) {

    $status = $_POST['status'];
    $id = $_POST['id_indigency'];

    $query = "UPDATE tbl_indigency SET status='$status' WHERE id_indigency='$id'";

    if (mysqli_query($db_connection, $query)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating status.";
    }
}
if (isset($_POST['status']) && isset($_POST['id_blotter'])) {

    $status = $_POST['status'];
    $id = $_POST['id_blotter'];

    $query = "UPDATE tbl_blotter SET status='$status' WHERE id_blotter='$id'";

    if (mysqli_query($db_connection, $query)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating status.";
    }
}
