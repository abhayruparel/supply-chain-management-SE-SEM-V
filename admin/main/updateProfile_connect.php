<?php
include("header.php");
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "supply_chain");

if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$admin_fname = $_POST['admin_fname'];
echo $admin_fname;
$admin_lname = $_POST['admin_lname'];
$admin_contact_no = $_POST['admin_contact_no'];
$admin_mail = $_POST['admin_mail'];
$admin_passwd = $_POST['admin_passwd'];
// $mail = $_SESSION["username"];
// echo htmlspecialchars($_SESSION["username"]);
$sql = "UPDATE admin_details  SET admin_fname = '$admin_fname',  admin_lname = '$admin_lname', admin_contact_no = '$admin_contact_no' , admin_passwd = '$admin_passwd' where  admin_mail = '$admin_mail'";
// echo $sql;
if ($mysqli->query($sql) === TRUE) {
    echo '<script type="text/javascript">
                window.onload = function () { alert("Profile updated successfully !! Redirecting to home page"); location.replace("index.php") }
                </script>';
    // echo "<script>alert('Enrolled Successfully !!! \n Your temporary id is: $last_id')</script>";
    // echo " success";
} else {
    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
    echo " ";
}

// $stmt->close();
$mysqli->close();
?>
    <?php
    include("footer.php");
    ?>