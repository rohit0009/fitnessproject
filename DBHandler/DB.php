<?php
	class DTB
	{
		var $connection;

		function __construct()
		{
			$this->connection = new mysqli('localhost','root','','fic');
			if(! $this->connection)
			{
				die("Failed to connect to database " . 	$this->connection->mysqli_error());
			}
		}

		function close()
		{
			$this->connection->close();
		}
		
		function display($obj)
		{
			while ($row = $obj->fetch_assoc()) 
			{
				# code...
				echo $row['cust_id'].'</br>'.$row['f_name'];
			}
		}

		function getParam($obj,$param)
		{
			if($obj->num_rows == 1)
			{
				while ($row = $obj->fetch_assoc()) {
					# code...
					return $row[$param];
				}
			}
		}
		
		function processQuery($query)
		{
			$result = $this->connection->query($query);	
			return $result;
		}


	}
?>