<?php
	require_once('csv_import.php');
	$import = new csvImport();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hiring Exercise | studentsfirst.org</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Hiring Exercise For studentsfirst.org, csv import application">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<section id="wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">CSV Address Import</h1>
						<p>Please upload a csv file.</p>
						<form method="post" enctype="multipart/form-data" name="csv_import" id="csv_import">
							<input name="csv" type="file" id="csv" /><br>
							<input type="submit" name="Submit" value="Upload CSV" class="btn btn-primary"/>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<br>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Address Line 1</th>
										<th>Address Line 2</th>
										<th>City</th>
										<th>State</th>
										<th>Postal Code</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									require_once('csv_export.php');
									$export = new csvExport();
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript" src="javascript/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="javascript/alert.js"></script>
	</body>
</html>