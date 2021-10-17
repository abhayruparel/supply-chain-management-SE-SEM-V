<?php
	include("header.php");
	$conn = mysqli_connect("localhost","root","","admission_process");
?>

<br>

<div id="page-wrapper">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="white-box p-l-20 p-r-20">
    				<div class="row">
    					<div class="col-md-12">
<?php
$qes_stu="Select * from student_query where flag='0';";
// echo $qes_stu;


?>


    						<form class="form-material form-horizontal" method="post">


    									<div class="form-group">
                                            <label class="col-sm-12">Select Counselor</label>
                                            <div class="col-sm-4">
                                            	<select class="form-control" name="con">  

<?php


$qes_stu="Select * from student_query where flag='0';";
echo $qes_stu;
$qry_stu=$conn->query($qes_stu);
while($res_stu=$qry_stu->fetch_assoc())
{

	$qes_couns="Select * from counsellor_alloted where stu_id='".$res_stu['stu_id']."';";
	echo $qes_couns;
	$qry_couns=$conn->query($qes_couns);
	while($res_couns=$qry_couns->fetch_assoc())
	{

		$qes_data="Select * from counsellor_master where couns_id='".$res_couns["couns_id"]."';";
		echo $qes_data;
		$qry_data=$conn->query($qes_data);
		$res_data=$qry_data->fetch_assoc();

		$id = $res_couns["couns_id"];
		$name = $res_data["couns_fname"]." ".$res_data["couns_lname"];

?>


					<option value="<?php echo $id;?>"><?php echo $name;?></option>



<?php
	}

}



?>                                                    

                                              


                                                </select>
                                            </div>
                                            <input type="submit" class="btn btn-outline btn-rounded btn-info" value="Find" name="btn_sub">
                                        </div>

                                        
                                    </form>

<?php


if (isset($_POST["btn_sub"]))
{
	$con_id = $_POST["con"];
?>
<br>
					<div class="col-sm-6">
                        <div class="white-box">
                            <h3>Table</h3>
                            <!-- <p class="text-muted">Add class <code>.table-hover</code></p> -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <!-- <th>Student Name&nbsp;&nbsp;</th> -->
                                            <th>Student Mail&nbsp;&nbsp;</th>
                                            <th>Query Massege&nbsp;&nbsp;</th>
                                            <!-- <th>Pending</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
$qes_stu="Select * from counsellor_alloted where couns_id='".$con_id."';";
// echo $qes_stu;
$qry_stu=$conn->query($qes_stu);
while($res_stu=$qry_stu->fetch_assoc())
{

	$qes_couns="Select * from student_query where flag='0' and stu_id = '".$res_stu["stu_id"]."';";
	// echo $qes_couns;
	$qry_couns=$conn->query($qes_couns);
	while($res_couns=$qry_couns->fetch_assoc())
	{
		// $name=$res_couns["stu_fname"];
		$mail=$res_couns["mail"];
		$msg=$res_couns["msg"];
		// $flag_n = $res_couns["flag"];
		// if ($flag_n == '0')
		// {
		// 	$bool_m = "Pending";
		// }
		// else
		// {
		// 	$bool_m = "Done";
		// }
?>                                        


                                        <tr>
                                            <!-- <td><?php //echo $name;?></td> -->
                                            <td><?php echo $mail;?></td>
                                            <td><?php echo $msg;?></td>
                                            <!-- <td><?php //echo $bool_m;?></td> -->
                                        </tr>
<?php
}
}

?>                                        



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<?php
}
?>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php
	include("footer.php");
?>