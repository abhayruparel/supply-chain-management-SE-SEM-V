<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  //  header("location: login.php");
    //exit;
//}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = $username="";
$new_password_err = $confirm_password_err =$username_err= "";
 
// Processing form data when form is submitted
if(!empty($_POST["submit"])){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
     
        // Prepare a select statement
        $sql = "SELECT id, mail, passwd FROM signup_data WHERE mail = ? ";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $username);
            
            // Set parameters
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                   $sql = "UPDATE signup_data SET passwd = ? WHERE mail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_username);
            
            // Set parameters
            $param_password = $new_password;
            $param_username = $username;//$_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                require_once("mail_function.php");
		          $staus=sendOTP($_POST["username"],$new_password);
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
                    
                        } else{
                            // Display an error message if password is not valid
                            $username_err = "The  username you entered was not valid.";
                        }
                    }
                } /*else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }*/
            }   
    }
    
    // Close connection
    mysqli_close($link);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="bootstrap.css">
    <style type="text/css">
        body{ background-image: url("register1.jpg");

 background-repeat: no-repeat;
  background-size: 100% 180%;
            color: black;
            font-size: 17px;
            font-family: sans-serif; }
        .wrapper{ width: 355px; padding-top: 8%; padding-bottom: 8%;  margin: auto}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                <a class="btn btn-link" href="login.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>