<?php
$mysqli = new mysqli("localhost", "root", "", "supply_chain");

if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$id = $_GET['id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];
$sql = "DELETE FROM admin_details WHERE id='" . $id . "'";

if ($mysqli->query($sql) === TRUE) {
    echo '<script type="text/javascript">
                window.onload = function () { alert("Deleted Successfully !!"); location.replace("display_admins.php") }
                </script>';
} else {
    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
}
$mysqli->close();
// header("Location: index.php");
