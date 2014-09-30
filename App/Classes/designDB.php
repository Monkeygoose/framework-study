<?php

class designDB {

	private $db;
	private $date;
	private $bandname;

	public function __construct($database,$bandname) {
	    $this->db = $database;
	    $this->todays = date("Y-m-d");
	    $this->bandname = $bandname;
	}

	public function createTable($tablename,$post) {

		$query = "CREATE table IF NOT EXISTS $tablename (ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY, SUBDATE DATE NOT NULL, ";

		foreach ($post as $key => $value) {
			$query .= $key." ".checknumber($value)." ,";
		};

		$query .= "bandname TEXT NOT NULL );";

		$dbquery = $this->db->prepare($query);

		try {
			$dbquery->execute();
			echo "Query: ".$query."</br>";
			echo "Successfully Executed</br></br>";
		} catch (PDOException $e){
			die($e->getmessage());
		}		

	}

	public function submit($tablename, $post){

		//CHECK TO SEE IF COLUMN EXISTS BEFORE TRYING TO INSERT INFORMATION INTO IT
		//SHOULD BE INSIDE A FOREACH LOOP WITH POST VARS
		foreach ($post as $key => $value) {
			$type = checknumber($value);
			$query = $this->db->prepare("DESCRIBE $tablename");
			$query->execute();
			$tableFields = $query->fetchAll(PDO::FETCH_COLUMN);
			//check if column exists in array
			if (!in_array($key, $tableFields))
			{
				echo $key." doesn't exist in table </br></br>";
				$colquery = "ALTER TABLE $tablename ADD $key $type ;";
				$dbquery = $this->db->prepare($colquery);

					try {
						$dbquery->execute();
						echo "Query: ".$colquery."</br>";
						echo $key." column created Successfully.</br></br>";
					} catch (PDOException $e){
						die($e->getmessage());
					}

			};

		}

		$dbquery = "INSERT INTO $tablename (ID, SUBDATE, ";
		$dbqueryend = "bandname) VALUES (1, '$this->todays', ";

		foreach ($post as $key => $value) {
			$dbquery .= $key.", ";
			$dbqueryend .= "'".$value."', ";
		}

		$dbqueryend .= " '$this->bandname' );";
		$dbquery .= $dbqueryend;
		echo "</br></br>".$dbquery."</br></br>";
		$query = $this->db->prepare($dbquery);
		try {
			$query->execute();
			echo "Query: ".$dbquery."</br>";
			echo "Successfully executed.</br></br>";
		} catch (PDOException $e){
			die($e->getmessage());
		}

	}

	public function getvars($tablename,$id=1){

		$query = $this->db->prepare("SELECT * FROM $tablename WHERE ID=$id;");

			try {
				$query->execute();
				$row = $query->fetchall(PDO::FETCH_ASSOC);
				return $row;
			} catch (PDOException $e){
				$row = array();
				die($e->getmessage());
			}		

	}

}