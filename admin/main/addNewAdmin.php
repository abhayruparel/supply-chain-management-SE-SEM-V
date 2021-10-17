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
  
</head>

<body>

    <!-- <br> -->

    <div id="page-wrapper">
        <!-- PHP CODE INTEGRATION addNewAdmin.php-->
        <?php
        $con = mysqli_connect("localhost", "root", "", "admission_process");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        // $result = mysqli_query($con, "SELECT * FROM counsellor_alloted");

        // echo "<table border='1' id='st'>
        //         <tr>
        //             <!--th>ID</th-->
        //             <th>couns_alloted_id</th>
        //             <th>stu_id</th>
        //             <th>couns_id</th>
        //             <!--th>couns_alloted_date</th>
        //             <th>couns_alloted_time</th-->
        //         </tr>";

        // while ($row = mysqli_fetch_array($result)) {
        //     echo "<tr>";
        //     // echo "<td>" . $row['id'] . "</td>";
        //     echo "<td>" . $row['couns_alloted_id'] . "</td>";
        //     echo "<td>" . $row['stu_id'] . "</td>";
        //     echo "<td>" . $row['couns_id'] . "</td>";
        //     // echo "<td>" . $row['couns_alloted_date'] . "</td>";
        //     // echo "<td>" . $row['couns_alloted_time'] . "</td>";
        //     echo "</tr>";
        // }
        // echo "</table>";

        mysqli_close($con);
        ?>

        <div class="col-md-12">
            <hr>
            <h3>Admin Registration Page</h3>
            <p class="text-muted m-b-30 font-13"> Add admin details</p>
            <form class="form-horizontal" action="addNewAdmin_connect.php" method="POST">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="First name" pattern="[a-zA-Z\s]+" name="admin_fname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Last name" pattern="[a-zA-Z\s]+" name="admin_lname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Contact Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Contact Number" pattern="[6-9]{1}[0-9]{9}" name="admin_contact_no" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-3 control-label">E-Mail Address</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword4" placeholder="Valid E-mail address" name="admin_mail" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="admin_passwd" required>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Add Admin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




</body>
<?php
include("footer.php");
?>