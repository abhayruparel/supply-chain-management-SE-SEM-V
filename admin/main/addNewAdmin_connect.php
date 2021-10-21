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
    <title>Admin | SCMS</title>
</head>
<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$admin_mail = $password = $confirm_password = $name = "";
$username_err = $password_err = $confirm_password_err = $name_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate admin_mail
    if (empty(trim($_POST["admin_mail"]))) {
        $username_err = "Please enter a admin_mail.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM admin_details WHERE admin_mail = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["admin_mail"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This admin_mail is already taken.";
                } else {
                    $admin_mail = trim($_POST["admin_mail"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }


    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO admin_details (admin_fname, admin_mail, admin_passwd) VALUES (?,?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_username, $param_password);
            echo "Success";
            // Set parameters
            $param_username = $admin_mail;
            $param_password = $password;
            $param_name = $name;
            //$param_password=password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to view admins page
                echo "Success";
                echo '<script type="text/javascript">
                window.onload = function () { alert("added Successfully !!"); location.replace("display_admins.php") }
                </script>';
                // header("location: display_admins.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<body>
    <div id="page-wrapper">
        <div class="col-md-12">
            <hr>
            <h3>Admin Registration Page</h3>
            <p class="text-muted m-b-30 font-13"> Add admin details</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal">
                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                    <label for="inputEmail3" class="col-sm-3 control-label">First Name <span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="<?php echo $admin_mail; ?>">
                        <span class="help-block"><?php echo $name_err; ?></span>
                    </div>
                </div>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label for="inputEmail3" class="col-sm-3 control-label">E-Mail ID <span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="email" name="admin_mail" class="form-control" value="<?php echo $admin_mail; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label for="inputEmail3" class="col-sm-3 control-label">Password <span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password <span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Add Admin</button>
                    </div>
                </div>
        </div>
        </form>

    </div>
    </div>
</body>

<?php
include("footer.php");
?>