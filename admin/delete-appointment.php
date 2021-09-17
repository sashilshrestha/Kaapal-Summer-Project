<?php
include('../includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'])) {
    header('location:logout.php');
    // echo "Admin_Id";
} else {
    $did = $_GET['deleteid'];
    // $sql = mysqli_query($conn, "DELETE from tblappointment where `ID`='$did'");

    $sql = "DELETE from tblappointment WHERE ID='$did'";
    mysqli_query($con, $sql);
    header('location:all-appoinments.php');
}
