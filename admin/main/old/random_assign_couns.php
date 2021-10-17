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
	<!-- PHP CODE INTEGRATION random_assign_couns.php-->
	<?php
	$con = mysqli_connect("localhost", "root", "", "admission_process");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (array_key_exists('allocateCounsellor', $_POST)) {
		@allocateCounsellor($con);
	}
	function allocateCounsellor($con)
	{
		//echo "This is allocateCounsellor that is selected";
		$result1 = mysqli_query($con, "SELECT * FROM counsellor_master");
		$count = mysqli_num_rows($result1);
		#echo "$count" . "<br>";

		#$myrandomID = 2;
		#echo $myrandomID;
		$query1 = "SELECT * FROM admission_data where isAllocated = 'no'";

		$result1 = mysqli_query($con, $query1);
		while ($row1 = mysqli_fetch_array($result1)) {
			$studentID = $row1['stu_id'];
			$myrandomID = rand(1, $count);
			//echo "hello";
			$insertquery =  "INSERT INTO counsellor_alloted (couns_alloted_id, stu_id, couns_id) values ('$myrandomID', '$studentID', '$myrandomID')";
			if (mysqli_query($con, $insertquery)) {
				$insertquery2 = "UPDATE admission_data  SET isAllocated = 'yes' where stu_id = '$studentID' ";
				if (mysqli_query($con, $insertquery2)) {
					echo "<h1>Successfully allocated STU_ID = " . $studentID . " to counsellor_id " . $myrandomID . "</h1>";
				}
			} else {
				echo "Error: " . $insertquery . "<br>" . mysqli_error($con);
			}
		}
		echo " <h3> Every Student is allocated to a counsellor.</h3>";
	}
	function displayUnallocatedStudents($con)
	{
		$query1 = mysqli_query($con, "SELECT * FROM admission_data where isAllocated = 'no'");
		$count = mysqli_num_rows($query1);
		if ($count != 0) {
			echo "<table border='1' id='st'>
			<tr>
				<th>Student Name</th>
				<th>Email id</th>
				<th>Student ID</th>
			</tr>";

			while ($row = mysqli_fetch_array($query1)) {
				echo "<tr>";
				echo "<td>" . $row['stu_fname'] . " " . $row['stu_lname'] . "</td>";
				echo "<td>" . $row['stu_mail'] . "</td>";
				echo "<td>" . $row['stu_id'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "	<form method='post'>
			<input type='submit' name='allocateCounsellor' class='button' value='Allocate Counsellor' />
		</form>";
		} else {
			//$query1 = "SELECT * FROM admission_data where isAllocated = 'no'";
			//$count = mysqli_num_rows($query1);
			//echo $count . "Abhay ";
			echo "<h3> All students are already allocated to a counsellor </h3>";
		}
	}
	// function generateCounsIdRandom($con)
	// {
	// 	$result1 = mysqli_query($con, "SELECT * FROM counsellor_master");
	// 	$count = mysqli_num_rows($result1);
	// 	#echo "$count" . "<br>";

	// 	#$myrandomID = 2;
	// 	#echo $myrandomID;
	// 	$query1 = "SELECT * FROM admission_data where isAllocated = 'no'";

	// 	$result1 = mysqli_query($con, $query1);
	// 	while ($row1 = mysqli_fetch_array($result1)) {
	// 		$studentID = $row1['stu_id'];
	// 		$myrandomID = rand(1, $count);
	// 		//echo "hello";
	// 		$insertquery =  "INSERT INTO counsellor_alloted (couns_alloted_id, stu_id, couns_id) values ('$myrandomID', '$studentID', '$myrandomID')";
	// 		if (mysqli_query($con, $insertquery)) {
	// 			$insertquery2 = "UPDATE admission_data  SET isAllocated = 'yes' where stu_id = '$studentID' ";
	// 			if (mysqli_query($con, $insertquery2)) {
	// 				echo "<h1>Successfully allocated STU_ID = " . $studentID . " to counsellor_id " . $myrandomID . "</h1>";
	// 			}
	// 		} else {
	// 			echo "Error: " . $insertquery . "<br>" . mysqli_error($con);
	// 		}
	// 	}
	// 	echo "Every Student is allocated to a counsellor.";
	// }

	@displayUnallocatedStudents($con);
	//generateCounsIdRandom($con);

	mysqli_close($con);
	?>


</div>

<?php
include("footer.php");
?>