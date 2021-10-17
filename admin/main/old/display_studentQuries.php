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
<body>
            <!-- Preloader -->
            <div class="preloader">
                <div class="cssload-speeding-wheel"></div>
            </div>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <!-- PHP CODE INTEGRATION display_student_query.php-->
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "admission_process");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $result = mysqli_query($con, "SELECT * FROM student_query;");

                    echo "<table border='1' id='st'>
    <thead>
    <tr>
    
    <th>Student Mail Id</th>
    <th>Query</th>
    <th>Student ID</th>
    <th>Counsellor ID</th>
    <th>Counselor Response</th>
    </tr>
    </thead>
                                        <tbody>
    ";
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo "Mail : - " . $row["mail"] . " Student_Query : - " . $row["msg"] . " ";
                            echo "<td>" . $row['mail'] . "</td>";
                            echo "<td>" . $row['msg'] . "</td>";
                            $result1 = mysqli_query($con, "SELECT * from admission_data where stu_mail= '" . $row['mail'] . "' ;   ");
                            if (mysqli_num_rows($result1) > 0) {
                                // output data of each row
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    //echo " STU_ID: " . $row1["stu_id"] ;
                                    echo "<td>" . $row1['stu_id'] . "</td>";
                                    $result3 = mysqli_query($con, "Select * from counsellor_alloted where stu_id = '" . $row1['stu_id'] . "' ;");
                                    if (mysqli_num_rows($result3) > 0) {
                                        // output data of each row
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                            // echo " Couns_ID : - ". $row3['couns_id'];
                                            echo "<td>" . $row3['couns_id'] . "</td>";
                                        }
                                    } else {
                                        echo "0 results in $result3 query";
                                    }
                                }
                            } else {
                                echo "0 results in $result1 query";
                            }
                            // echo " Couns resonse: - ".$row['couns_response'] . " <br>" ;
                            echo "<td>" . $row['couns_response'] . "</td> </tr> </tbody>";
                        }
                    } else {
                        echo "0 results in $result query";
                    }
                    echo "</table>";

                    mysqli_close($con);
                    ?>
                </div>
            </div>
        </div></div></div>
        <?php
        include("footer.php");
        ?>