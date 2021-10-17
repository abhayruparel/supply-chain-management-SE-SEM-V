<?php
include("header.php");
?>

<head>
    <link href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/bower_components/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/bower_components/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="enroll_form_style.php" />
    <style>
        table {
            border-collapse: collapse;
        }

        #st {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            align-items: center;
        }

        #st td,
        #st th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #st tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #st tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<br>
<div id="page-wrapper">
            <!-- PHP CODE INTEGRATION display_counsellor_alloted.php-->
            <?php
            $con = mysqli_connect("localhost", "root", "", "admission_process");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $result = mysqli_query($con, "SELECT * FROM enquiry_data");

            echo "<table border='1' id='st'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>mail</th>
                        <th>Contact number</th>
                        <th>Interested Field</th>
                    </tr>";

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['mail'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>" . $row['interested_field'] . "</td>";
                echo "</tr>";
            }   
            echo "</table>";

            mysqli_close($con);
            ?>
            <!-- end of php code-->
    </div>

    <?php
    include("footer.php");
    ?>