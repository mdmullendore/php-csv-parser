<?php
	// pdo database connection class
	class connection
	{
		protected static $conn;
		// connect to database
		public function __construct()
		{
			try{
				$config = parse_ini_file('./config.ini');
				self::$conn = new PDO('mysql:dbname=hiring_exercise;host=localhost', $config['username'],$config['password']); 
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $error)
			{
				echo "Connection failed: " . $error->getMessage();
			}
		}
		public static function getConnection() {
			//Guarantees single instance, if no connection object exists then create one.
			if (!self::$conn) {
				//new connection object.
				new connection();
			}
			//return connection.
			return self::$conn;
		}
	}
?>