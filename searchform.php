<!DOCTYPE html>
<html>

 <?php
 	
 	$output = '';
 	if (isset($_POST['search']) && $_POST['search'] != '') 
 	{
 		$searchq = $_POST['search'];

 		if($_POST['filter'] == "Name"){
 			$sqlCommand = "SELECT * FROM tbl_donorsinfo WHERE lname LIKE '%$searchq%' OR fname LIKE '%$searchq' ";
 		}elseif ($_POST['filter'] == "BloodType") {
 			$sqlCommand = "SELECT * FROM tbl_donorsinfo WHERE bloodtype LIKE '%$searchq%' ";
 		}
 		elseif ($_POST['filter'] == "Address") {
 			$sqlCommand = "SELECT * FROM tbl_donorsinfo WHERE address LIKE '%$searchq%' ";
 		}

 
 		include('connect.php');
 		$q = mysql_query($sqlCommand) OR die(mysql_error());	
 		$c = mysql_num_rows($q);
 		if($c == 0){
 			$output = 'No Result for : <b>"'.$searchq.'"</b> <hr />';
 		}else {
 			
 			$i=1;
 			while ($row = mysql_fetch_array($q)) {
			$output .= 	"<tr>
			        		<td>".$i."</td>
			        		<td>".$row['lname']."</td>
			        		<td>".$row['fname']."</td>
			        		<td>".$row['mi']."</td>
			        		<td>".$row['age']."</td>
			        		<td>".$row['bloodtype']."</td>
			        		<td>".$row['address']."</td>
			        		<td>".$row['recipient']."</td>
			        		<td align='center'>
			        			<a href='formview.php?epr=update&id=".$row['id']."&fname=".$row['fname']."&lname=".$row['lname']."'>VIEW DATA </a> 
			        		</td>
			        	 </tr>"; 
				$i++;
			}     		
 		}	
 	}

 ?><!--PHP End Tag-->

<head>

	<title></title>

	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<style>
		#txtsearch{ height: 30px; }
		#select1{ height: 30px; }
		label{ font-size: 20px; margin-bottom: 0px; margin-top: 0px;}
		.btn { width: 110px; }
		#tableno{ min-width: 10px; }
		#tableln{ min-width: 100px; }
		#tablefn{ min-width: 120px; }
		#tablemi{ min-width: 15px; }
		#tableage{ min-width: 15px; }
		#tablebt{  min-width: 110px;}
		#tableadd{ min-width: 400px; }
		#tablebrwd{ min-width: 130px; }
		th { text-align: center; }	
		hr{ margin: 10px 0px; }		
		.btn{ height: 30px; }		
	</style>

</head>

<body>

	<div class="container-fluid">

		<form class="form-inline" method="POST" action="searchform.php">
			<div class="form-group">
				
				<label >Search For:</label>
				<input id="txtsearch" class="form-control" type="text" name="search" placeholder="">
				
				<label>Within:</label>
				<select id="select1" name="filter" class="form-control">
					<option  value="Name">Surname/Give Name</option>
					<option  value="BloodType" >Blood Type</option>
					<option  value="Address">Barangay</option>
				</select>
				
				<input class="btn btn-md btn-primary" type="submit" name="submit" value="SEARCH">

			</div>	
		</form>

		<hr />

		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th id="tableno">NO</th>
					<th id="tableln">LAST NAME</th>
					<th id="tablefn">FIRST NAME</th>
					<th id="tablemi">M.I.</th>
					<th id="tableage">AGE</th>	
					<th id="tablebt">BLOOD TYPE</th>	
					<th id="tableadd">ADDRESS</th>
					<th id="tablebrwd">BARROWED BY</th>
					<th>OPTION</th>
				</thead>
					<?php echo $output; ?>
			</table>
		</div>
	</div><!--End of Container-->






	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>	
</body>
</html>