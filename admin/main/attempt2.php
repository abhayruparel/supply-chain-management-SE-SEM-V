<?php
include("header.php");
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Maple Admin - is a responsive bootstrap admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<br>

<div id="page-wrapper">

    <!-- PHP CODE INTEGRATION display_student_query.php-->
    <?php
    $con = mysqli_connect("localhost", "root", "", "admission_process");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $main_stu_qry = mysqli_query($con, "SELECT * FROM student_query");
    while ($row = mysqli_fetch_array($main_stu_qry)) {
        $qry1 = "SELECT couns_id from counsellor_alloted where stu_id = " . $row['stu_id'] . ';';
        echo $qry1;
        $variableForCounsId = mysqli_query($con, $qry1) or die(mysqli_error($con));
        while ($row1 = mysqli_fetch_array($variableForCounsId)) {
            print $row1;
            if (!$variableForCounsId) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
            }
        }
    }
    mysqli_close($con);
    ?>
</div>
</body>
<?php
include("footer.php");
?>