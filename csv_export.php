<?php
	require_once('connection.php');
	// export data for database script
	class csvExport
	{
		public function __construct()
		{
			$conn = connection::getConnection();
			$query = "SELECT * FROM address_book";
			$stmt = $conn->prepare($query); 
			$stmt->execute();
			$line = $stmt->fetchAll(PDO::FETCH_OBJ);

			foreach($line as $key => $value){
				echo('<tr>');
				foreach($value as $key2 => $value2){
					echo('<td>'.$value2.'</td>');
				}
				echo('</tr>');
			}
		}
	}
?>