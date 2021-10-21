<?php

    $link = mysqli_connect("localhost", "root", "", "supply_chain");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    
    $p_name = mysqli_real_escape_string($link, $_REQUEST['pname']);
    $p_price= mysqli_real_escape_string($link, $_REQUEST['pprice']);
    $p_color = mysqli_real_escape_string($link, $_REQUEST['pcolor']);
    
    $p_quantity= mysqli_real_escape_string($link, $_REQUEST['pquantity']);



    $sql = "INSERT INTO products_prutha ( p_name, p_price, p_color, p_quantity) VALUES
     ( '$p_name', '$p_price',  '$p_color', '$p_quantity')";
    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
        echo '<script type="text/javascript">
                    window.onload = function () { alert("Account Created Successfully !!!"); }
            </script>';
        header("location: create.php");
        exit;
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);

?>