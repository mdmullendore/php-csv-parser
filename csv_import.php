<?php
	require_once('connection.php');
	// import csv script
	class csvImport
	{
		public function __construct()
		{
			$conn = connection::getConnection();
			// do on submit
			if (isset($_POST['Submit'])) { 

				// find if file is csv only
				$name = $_FILES['csv']['name'];
				$ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
				$type = $_FILES['csv']['type'];
				$tmpName = $_FILES['csv']['tmp_name']; 
				
				// if csv file only
				if($ext === 'csv'){
					$handle = fopen($tmpName,"r"); 
					fgets($handle);

					// discover if file is empty
					while (!feof($handle) ) {
						$line_of_text = fgetcsv($handle, 1024, ",");

						// define and prepare table values
						$first_name = addslashes($line_of_text[0]);
						$last_name = addslashes($line_of_text[1]);
						$add_line_1 = addslashes($line_of_text[2]);
						$add_line_2 = addslashes($line_of_text[3]);
						$city = addslashes($line_of_text[4]);
						$state = addslashes($line_of_text[5]);
						$postal_code = addslashes($line_of_text[6]);
						
						// handle state name change to abbreviations
						if( $state == "Alabama"){
							$state = "AL";
						}elseif($state == "Alaska"){
							$state = "AK";
						}
						elseif($state == "Arizona"){
							$state = "AZ";
						}
						elseif($state == "Arkansas"){
							$state = "AR";
						}
						elseif($state == "California"){
							$state = "CA";
						}
						elseif($state == "Colorado"){
							$state = "CO";
						}
						elseif($state == "Connecticut"){
							$state = "CT";
						}
						elseif($state == "Delaware"){
							$state = "DE";
						}
						elseif($state == "Florida"){
							$state = "FL";
						}
						elseif($state == "Georgia"){
							$state = "GA";
						}
						elseif($state == "Hawaii"){
							$state = "HI";
						}
						elseif($state == "Idaho"){
							$state = "ID";
						}
						elseif($state == "Illinois"){
							$state = "IL";
						}
						elseif($state == "Indiana"){
							$state = "IN";
						}
						elseif($state == "Iowa"){
							$state = "IA";
						}
						elseif($state == "Kansas"){
							$state = "KS";
						}
						elseif($state == "Kentucky"){
							$state = "KY";
						}
						elseif($state == "Louisana"){
							$state = "LA";
						}
						elseif($state == "Maine"){
							$state = "ME";
						}
						elseif($state == "Maryland"){
							$state = "MD";
						}
						elseif($state == "Massachusetts"){
							$state = "MA";
						}
						elseif($state == "Michigan"){
							$state = "MI";
						}
						elseif($state == "Minnesota"){
							$state = "MN";
						}
						elseif($state == "Mississippi"){
							$state = "MS";
						}
						elseif($state == "Missouri"){
							$state = "MO";
						}
						elseif($state == "Montana"){
							$state = "MT";
						}
						elseif($state == "Nebraska"){
							$state = "NE";
						}
						elseif($state == "Nevada"){
							$state = "NV";
						}
						elseif($state == "New Hampshire"){
							$state = "NH";
						}
						elseif($state == "New Jersey"){
							$state = "NJ";
						}
						elseif($state == "New Mexico"){
							$state = "NM";
						}
						elseif($state == "New York"){
							$state = "NY";
						}
						elseif($state == "North Carolina"){
							$state = "NC";
						}
						elseif($state == "North Dakota"){
							$state = "ND";
						}
						elseif($state == "Ohio"){
							$state = "OH";
						}
						elseif($state == "Oklahoma"){
							$state = "OK";
						}
						elseif($state == "Oregon"){
							$state = "OR";
						}
						elseif($state == "Pennsylvania"){
							$state = "PA";
						}
						elseif($state == "Rhode Island"){
							$state = "RI";
						}
						elseif($state == "South Carolina"){
							$state = "SC";
						}
						elseif($state == "South Dakota"){
							$state = "SD";
						}
						elseif($state == "Tennessee"){
							$state = "TN";
						}
						elseif($state == "Texas"){
							$state = "TX";
						}
						elseif($state == "Utah"){
							$state = "UT";
						}
						elseif($state == "Vermont"){
							$state = "VT";
						}
						elseif($state == "Virginia"){
							$state = "VA";
						}
						elseif($state == "Washington"){
							$state = "WA";
						}
						elseif($state == "Washington D.C."){
							$state = "DC";
						}
						elseif($state == "West Virginia"){
							$state = "WV";
						}
						elseif($state == "Wisconsin"){
							$state = "WI";
						}
						elseif($state == "Wyoming"){
							$state = "WY";
						}

						//check for dublicates
						$sql = "SELECT add_line_1 FROM address_book WHERE (first_name = '$first_name' AND last_name = '$last_name' AND add_line_1 = '$add_line_1')";
						$stmt = $conn->prepare($sql); 
						$stmt->execute();
						$result = $stmt->fetchColumn();
						// if dublicate file and send message
						if($result){
							echo('<div class="alert alert-danger"><strong>Warning!</strong> Duplicate Data.</div>');
							//redirect
							header('Location:');
						}
						else
						{
							// insert into database	
							$sql = "INSERT INTO address_book(first_name, last_name, add_line_1, add_line_2, city, state, postal_code) VALUE ('$first_name','$last_name','$add_line_1','$add_line_2','$city','$state','$postal_code')";
							$stmt = $conn->prepare($sql); 
							$stmt->execute();
							//redirect 
							header('Location: index.php?success=1');
						}
					}
					fclose($handle);
				}
				else{
					// alert if not csv file
					echo('<div class="alert alert-danger"><strong>Warning!</strong> Please upload csv files only.</div>');
				}
			}

		}
	}
?>