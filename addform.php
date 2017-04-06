<!DOCTYPE html>
<?php
	include('connect.php');
	$epr='';
	$msg='';

	if(isset($_GET['epr']))
	$epr=$_GET['epr'];

	// save
	if ($epr=='save'){
		$lname = $_POST['txtlname'];
		$fname = $_POST['txtfname'];
		$mi = $_POST['txtmi'];
		$xtname = $_POST['txtextname'];
		$gender = $_POST['txtgender'];
		$age = $_POST['txtage'];
		$address = $_POST['txtaddress'];
		$bloodtype = $_POST['txtbloodtype'];
		$datedonated = $_POST['txtdatedonated'];
		$bbfacilitated = $_POST['txtbb'];

		$s_sql=mysql_query("INSERT INTO tbl_donorsinfo (lname, fname, mi, xtname, age, gender, address, bloodtype, datedonated, bbfacilitated) VALUES('$lname','$fname','$mi','$xtname','$gender','$age','$address','$bloodtype','$datedonated', '$bbfacilitated')");
		if($s_sql){
			header("location:addform.php");
		}else{
			$msg='SAVE ERROR :'.mysql_error();

		}
	}
	
?>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style>
		input{ margin-bottom: 15px; }
		textarea{ margin-bottom: 15px; }
		#dnrlname{ margin-bottom: 3px; }
		#dnrfname{ margin-bottom: 3px; }
		#dnrmi{ margin-bottom: 3px; }
		#btnsubmit{ width: 100px; }
		#msgalert{ background-color: red; border-radius: 5px; text-align: center; color: #fff; font-weight: 800px; }

	</style>
</head>
<body>	
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xm-12 ">
			<?php  echo'<div id="msgalert">'.$msg.'</div>'; ?>
			<form action="addform.php?epr=save" method="POST">
						
				<div class="form-group" id="dnrgrpinput">
					
									
					<label for="dnrlname">Name</label>
					<input id="dnrlname" class="form-control" type="text" name="txtlname" placeholder="Surname" />
					<input id="dnrfname" class="form-control" type="text" name="txtfname"  placeholder="Given Name" />
					<input id="dnrmi" class="form-control" type="text" name="txtmi"  placeholder="M.I." />
					<input id="dnrextname" class="form-control" type="text" name="txtextname"  placeholder="Extension Name" />
											
					<label for="dnrage">Age</label>
					<input id="dnrage" class="form-control" type="text" name="txtage"  placeholder="Age" />
								
					<div class="form-group">
						<label for="sel1">Gender</label>
						<select class="form-control" id="sel1" name="txtgender">
							 <option>Select Gender</option>
							 <option>Male</option>
							 <option>Female</option>
						</select>
					</div>
									
					<label for="dnradd" id="lbladd">Address</label>
					<textarea class="form-control" rows="3" id="dnradd" name="txtaddress" value=""></textarea>		

					<label for="dnrage">Blood Type</label>
					<input id="dnrage" class="form-control" type="text" name="txtbloodtype"  placeholder="Blood Type" />	

					<label for="dnrgender">Date Donated</label>
					<input id="dnrgender" class="form-control" type="date" name="txtdatedonated"  placeholder="Donation Date" />	

					<div class="form-group">
						<label for="sel1">Blood Bank</label>
						<select class="form-control" id="sel1" name="txtbb">
							 <option>Select BB</option>
							 <option>Red Cross</option>
							 <option>Negros First</option>
						</select>
					</div>

					<input class="btn btn-primary btn-md" type="submit" value="submit" id="btnsubmit" />
				</div>			
							
			</form>

			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-4 col-xm-12 ">
		</div>
						
			
	</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>	
</body>
</html>