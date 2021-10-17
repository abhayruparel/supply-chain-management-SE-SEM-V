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

    <div id="page-wrapper">
        <!-- PHP CODE INTEGRATION display_counsellor_alloted.php-->
        <?php
        $con = mysqli_connect("localhost", "root", "", "supply_chain");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con, "SELECT * FROM admin_details where admin_mail = " . "'" . $_SESSION["username"] . "'");
        $row = mysqli_fetch_array($result);
        ?>
        <div class="col-md-12">
            <hr>
            <h3>Update Profile Page</h3>
            <p class="text-muted m-b-30 font-13"> Update your details</p>
            <form class="form-horizontal" action="updateProfile_connect.php" method="POST">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="First name" pattern="[a-zA-Z\s]+" name="admin_fname" value="<?php echo $row['admin_fname']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Last name" pattern="[a-zA-Z\s]+" name="admin_lname" value="<?php echo $row['admin_lname']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Contact Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Contact Number" pattern="[6-9]{1}[0-9]{9}" name="admin_contact_no" value="<?php echo $row['admin_contact_no']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-3 control-label">E-Mail Address</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword4" placeholder="Valid E-mail address" name="admin_mail" value="<?php echo $row['admin_mail']; ?>" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="admin_passwd" value="<?php echo $row['admin_passwd']; ?>" required>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $admin_fname = $_POST['admin_fname'];
        $admin_lname = $_POST['admin_lname'];
        $admin_contact_no = $_POST['admin_contact_no'];
        $admin_mail = $_POST['admin_mail'];
        $admin_passwd = $_POST['admin_passwd'];
        $sql = "UPDATE admin_details  SET ( admin_fname, admin_lname, admin_contact_no, admin_mail, admin_passwd) 
VALUES ( '$admin_fname', '$admin_lname', '$admin_contact_no', '$admin_mail' , '$admin_passwd') where admin_mail = " . "'" . $_SESSION["username"] . "'";
        echo $sql;
        if ($mysqli->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                window.onload = function () { alert("Registered Successfully !!"); location.replace("index.php") }
                </script>';
            //echo "<script>alert('Enrolled Successfully !!! \n Your temporary id is: $last_id')</script>";
        } else {
            echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
            echo '<script type="text/javascript">
                window.onload = function () { alert("Registered Successfully !!"); location.replace("index.php") }
                </script>';
        }
    }
    ?>


    <?php
    mysqli_close($con);
    ?>
    </div>

    <?php
    include("footer.php");
    ?>