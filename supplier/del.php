<?php
    $link = mysqli_connect("localhost", "root", "", "supply_chain");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($link, $_REQUEST['id']);

    $sql = "DELETE FROM products_prutha WHERE p_id='$id'";
    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
        echo '<script type="text/javascript">
                    window.onload = function () { alert("User Updated Successfully !!!"); }
            </script>';
        header("location: delete.php");
        exit;
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);

?>