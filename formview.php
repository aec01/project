<!DOCTYPE html>

<?php 
	include('connect.php');
	$epr='';
	$msg='';
	$output= '';

	if(isset($_GET['epr']))
		$epr=$_GET['epr'];


	// update
	if ($epr=='saveup'){
		$id = $_POST['txtid'];
		$lname = $_POST['txtlname'];
		$fname = $_POST['txtfname'];
		$mi = $_POST['txtmi'];
		$extname = $_POST['txtextname'];
		$age = $_POST['txtage'];
		$gender = $_POST['txtgender'];
		$address = $_POST['txtaddress'];

		$barrower = $_POST['txtbarrower'];
		$brwdtob = $_POST['txtbrwdtob'];
		$brwdkob = $_POST['txtbrwdkob'];
		$unit = $_POST['txtunit'];
		$brwdbb = $_POST['txtbloodbank'];
		$brwddate = $_POST['txtdatebrwd'];
		$brwradd = $_POST['txtbrwradd'];
		
		$recipient = $_POST['txtrecipient'];
		$rcptage = $_POST['rcptage'];
		$rcptgender = $_POST['rcptgender'];
		$rcptrelation = $_POST['rcptrelation'];
		$admitted = $_POST['rcptadmitted'];


		$a_sql=mysql_query("UPDATE tbl_donorsinfo SET id='$id', lname='$lname', fname='$fname', mi='$mi', xtname='$extname', age='$age', gender='$gender', address='$address', barrower='$barrower', brwdtob='$brwdtob', brwdkob='$brwdkob', brwdunit='$unit', bloodbank='$brwdbb', datebrwd='$brwddate', brweraddress='$brwradd', recipient='$recipient', rcptage='$rcptage', rcptgender='$rcptgender', rcptdnrrelation='$rcptrelation', rcptadmitted='$admitted'  WHERE id='$id'");
		if ($a_sql) {
			header("location:formview.php?epr=update&id=".$id."&fname=".$fname."");
			//$msg = 'You have successfully change "'.$lname.'" account';
		}else{
			$msg='Error:' .mysql_error();
		}
	}

?>
<html>
	<head>
	
		<title></title>
		<link rel="stylesheet" type="text/css" href="normalize.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		
		<style>
			#dnrid{ width: 100px; }
			#firstcol{ padding-left: 15px; }
			#dnrlname{ border-radius: 5px 0px 0px 5px; }
			#dnrfname{ border-radius: 0px;	}
			#dnrmi{ border-radius: 0px; }
			#dnrxtname{ border-radius: 0px 5px 5px 0px; }
			#formgroup{ margin-bottom: 10px; }
			#fg2col1{ padding-right: 0px; padding-left: 0px; }
			#fg3col1dv1{ margin-top: 10px; padding-left: 0px; }
			#fg3col1dv2{ margin-top: 10px; padding-right: 0px; }
			#brwdtobcol{ padding-left: 0px; }
			#brwdkobcol{ padding-left: 0px; }
			#brwdunitcol{ padding-left: 0px; padding-right: 0px}
			#lbladd{ margin-top: 10px; }
			hr{ margin: auto; border: 0; border-top: 2px solid #ccc; width: 80%; }
			#row1{ width: 80%; margin: auto; }
			#tablegroup{ width: 80%; margin: 10px auto; }
			#form{ margin-bottom: 10px; }
		</style>
	</head>

	<body>
	<div class="container">

		<?php
			 if ($epr=='update'){
			 	$id=$_GET['id'];
			 	$row=mysql_query("SELECT * FROM tbl_donorsinfo WHERE id ='$id'");
			 	$st_row=mysql_fetch_array($row);
		?>
				<form action="formview.php?epr=saveup" method="POST" id="form">

					<div class="row" id="row1">
						<!--+++++++++++++++++++++++++++++++ DONOR ROW +++++++++++++++++++++++++++++++++++++-->
						<div class="col-lg-12" id="firstcol">
							<h4>DONOR PERSONAL INFORMATION</h4>
							<div class="form-group" id="formgroup">
								<label for="dnrid">ID</label>
							    <input  type="text" id="dnrid" class="form-control" name="txtid" value="<?php echo $st_row['id'] ?>" />
							</div>
						
							<div class="form-group">	
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="fg2col1">
									<label for="dnrlname">Surname</label>
									<input type="text" id="dnrlname" class="form-control" name="txtlname" value="<?php echo $st_row['lname'] ?>" />
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="fg2col1">
									<label for="dnrfname">Given Name</label>
									<input type="text" id="dnrfname" class="form-control" name="txtfname" value="<?php echo $st_row['fname'] ?>" />
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="fg2col1">
									<label for="dnrmi">M.I</label>
									<input type="text" id="dnrmi" class="form-control" name="txtmi" value="<?php echo $st_row['mi'] ?>" />
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="fg2col1">
									<label for="dnrxtname">Suffix Name</label>
									<input type="text" id="dnrxtname" class="form-control" name="txtextname" value="<?php echo $st_row['xtname'] ?>" />
								</div>
							</div>

							<div class="from-group">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="fg3col1dv1">
									<label for="dnrage">Age</label>
									<input type="text" id="dnrage" name="txtage" class="form-control" value="<?php echo $st_row['age'] ?>" />
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="fg3col1dv2">
									<label for="dnrgender">Gender</label>
									<input type="text" id="dnrgender" name="txtgender" class="form-control" value="<?php echo $st_row['gender'] ?>" />
								</div>
							</div>
							<div class="form-group" id="">
								<label for="inputadd" id="lbladd">Address</label>
								<textarea class="form-control" rows="3" id="inputadd" name="txtaddress" value=""><?php echo $st_row['address'] ?></textarea>
							</div>
						</div>
						<!--+++++++++++++++++++++++++++++++ BARROWER ROW +++++++++++++++++++++++++++++++++++++-->	
						<div class="col-lg-12" id="2ndcol">
							<h4>BARROWER INFORMATION</h4>
							<div class="form-group" id="formgroup">
								<label for="barrower">Barrower Name</label>
							    <input  type="text" id="barrower" class="form-control" name="txtbarrower" value="<?php echo $st_row['barrower'] ?>" />
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" id="brwdtobcol">
								<label for="brwdtob">Type of Blood</label>
								<input type="text" id="brwdtob" name="txtbrwdtob" class="form-control" value="<?php echo $st_row['brwdtob'] ?>" />
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" id="brwdkobcol">
								<label for="brwdkob">Kind of Blood</label>
								<input type="text" id="brwdkob" name="txtbrwdkob" class="form-control" value="<?php echo $st_row['brwdkob'] ?>" />
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="brwdunitcol">
								<label for="brwdunit">Unit's</label>
								<input type="text" id="brwdunit" name="txtunit" class="form-control" value="<?php echo $st_row['brwdunit'] ?>" />
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="fg3col1dv1">
								<label for="brwdbb">Blood Bank</label>
								<input type="text" id="brwdbb" name="txtbloodbank" class="form-control" value="<?php echo $st_row['bloodbank'] ?>" />
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="fg3col1dv2">
								<label for="brwddate">Date Barrowed</label>
								<input type="text" id="brwddate" name="txtdatebrwd" class="form-control" value="<?php echo $st_row['datebrwd'] ?>" />
							</div>
							<div class="form-group" id="">
								<label for="inputadd" id="lbladd">Address</label>
								<textarea class="form-control" rows="3" id="inputadd" name="txtbrwradd" value=""><?php echo $st_row['brweraddress'] ?>
								</textarea>
							</div>		
						</div>
						<!--+++++++++++++++++++++++++++++++ RECIPIENT ROW +++++++++++++++++++++++++++++++++++++-->
						<div class="col-lg-12">
							<h4>RECIPIENT INFORMATION</h4>
							<div class="form-group" id="formgroup">
								<label for="rcptname">Recipient Name</label>
							    <input  type="text" id="rcptname" class="form-control" name="txtrecipient" value="<?php echo $st_row['recipient'] ?>" />
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="brwdtobcol">
								<label for="rcptage">Age</label>
								<input type="text" id="rcptage" name="rcptage" class="form-control" value="<?php echo $st_row['rcptage'] ?>" />
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="brwdkobcol">
								<label for="rcptgender">Gender</label>
								<input type="text" id="rcptgender" name="rcptgender" class="form-control" value="<?php echo $st_row['rcptgender'] ?>" />
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="brwdunitcol">
								<label for="rcptrelation">Relation to the Donor</label>
								<input type="text" id="rcptrelation" name="rcptrelation" class="form-control" value="<?php echo $st_row['rcptdnrrelation'] ?>" />
							</div>	
							<div class="form-group" id="">
								<label for="inputadd" id="lbladd">Hospital Admitted</label>
								<textarea class="form-control" rows="3" id="inputadd" name="rcptadmitted" value=""><?php echo $st_row['rcptadmitted'] ?></textarea>
							</div>	
							<button class="btn btn-primary btn-md" type="submit">Submit Change's</button>
							
						</div>
					
					</div>
				</form><!--Form End-->
		<?php }?>

		<hr />


				<!-- ++++++++++++++++++++++++TABLE for DATA LIST++++++++++++++++++++++++++++++++++++++++++-->
				<div class="table-responsive" id="tablegroup">
					<table class="table table-bordered table-striped table-hover" >
						<thead>
							<th>NO</th>
							<th>LAST NAME</th>
							<th>FIRST NAME</th>
							<th>M.I.</th>
							<th>AGE</th>
							<th>GENDER</th>
							<th>BLOOD TYPE</th>
							<th>DATE DONATED</th>	
							<th>OPTION</th>
						</thead>
						<!-- +++++++++++++++++++++SHOW DATA from Search form++++++++++++++++++++++++++ -->
						<?php 
						$output = '';
						if ($epr=='update')
						{
							$firstname=$_GET['fname'];
							
							$q=mysql_query("SELECT * FROM tbl_donorsinfo WHERE fname ='$firstname'");
						 	$i=1;
						 	while ($row = mysql_fetch_array($q))
						 		{
										$output .=  "<tr>
														<td>".$i."</td>
														<td>".$row['lname']."</td>
														<td>".$row['fname']."</td>
														<td>".$row['mi']."</td>
														<td>".$row['age']."</td>
														<td>".$row['gender']."</td>
														<td>".$row['bloodtype']."</td>
														<td>".$row['datedonated']."</td>
														<td align='center'>
														    <a href='formview.php?epr=update&id=".$row['id']."&fname=".$row['fname']."'>UPDATE</a> 
														</td>
													</tr>"; 
										$i++;
								}
						}
						?>
						<!-- +++++++++++++++++++++SHOW DATA IN TABLE++++++++++++++++++++++++++ -->
						<?php echo $output; ?>	
					</table><!--End of Table-->
				</div>
	</div><!--End of Container-->


	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>	
	</body>
</html>