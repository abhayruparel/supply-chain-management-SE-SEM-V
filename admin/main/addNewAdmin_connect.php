<?php
$mysqli = new mysqli("localhost", "root", "", "supply_chain");

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$admin_fname = $_POST['admin_fname'];
// echo $admin_fname;
$admin_lname = $_POST['admin_lname'];
$admin_contact_no = $_POST['admin_contact_no'];
$admin_mail = $_POST['admin_mail'];
$admin_passwd = $_POST['admin_passwd'];

$sql = "INSERT INTO admin_details ( admin_fname, admin_lname, admin_contact_no, admin_mail, admin_passwd) 
VALUES ( '$admin_fname', '$admin_lname', '$admin_contact_no', '$admin_mail' , '$admin_passwd')";
// echo $sql;
if ($mysqli->query($sql) === TRUE) {
        echo '<script type="text/javascript">
                window.onload = function () { alert("Added Successfully !!"); location.replace("index.php") }
                </script>';
        //echo "<script>alert('Enrolled Successfully !!! \n Your temporary id is: $last_id')</script>";
    } else {
    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
} 

// $stmt->close();
$mysqli->close();
