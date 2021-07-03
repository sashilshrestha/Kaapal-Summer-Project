<?php //; 
?>

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    include('includes/head.php');
    $eid = $_GET['delid'];

    function del($con, $eid)
    {
        $query = mysqli_query($con, "delete from  tblservices where ID='$eid'");
        if ($query) {
            $msg = "Deleted";
        } else {
            $msg = "";
        }
        if ($msg) {
            echo "<script>alert('Service has been deleted.');</script>";
            echo "<script>window.location.href = 'manage-services.php'</script>";
        } else {
            echo "<script>alert('Error Occured.');</script>";
            echo "<script>window.location.href = 'manage-services.php'</script>";
        }
    }

    del($con, $eid);
}
?>