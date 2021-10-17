<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wrappixel.com/demos/admin-templates/maple-admin/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Jan 2019 04:45:28 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <!--script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-85622565-1', 'auto');
    ga('send', 'pageview');
    </script-->
</head>




<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">
                    <a class="logo" href="index.php"><b><img src="../assets/images/maple-icon.png" alt="Home"></b><span class="hidden-xs">
                            <font>Admin</font>
                        </span></a>
                </div>
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>

                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../assets/images/users/hritik.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></b> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="login/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <div class="navbar-default sidebar nicescroll" role="navigation">
            <div class="sidebar-nav navbar-collapse ">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!--  <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div> -->
                        <!-- /input-group -->
                    </li>
                    <li class="nav-small-cap">
                        <!-- <b>Main Menu</b> -->
                    </li>
                    <li class="active">
                        <a href="index.php" class="waves-effect"><b>Dashbord</b></a>
                    </li>
                    <li class="active">
                        <a href="addNewAdmin.php" class="waves-effect"><b>Add new admin</b></a>
                    </li>
                    <li>
                        <a href="display_admins.php" class="waves-effect"><b>View Admins</b></a>
                    </li>

                    <!-- <li>
                        <a href="display_counsellor.php" class="waves-effect"><b>Display counsellor</b></a>
                    </li>
                    <li>
                        <a href="display_studentQuries.php" class="waves-effect"><b>Student Quries</b></a>
                    </li>
                    <li>
                        <a href="random_assign_couns.php" class="waves-effect"><b>Assign Counsellor To Students Randomly</b></a>
                    </li>
                    <li>
                        <a href="panding_qry.php" class="waves-effect"><b>Pending Query</b></a> -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- Page Content -->