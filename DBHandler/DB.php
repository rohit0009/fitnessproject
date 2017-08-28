<?php
	class DTB
	{
		var $connection;

		function __construct()
		{
			$this->connection = mysqli_connect('localhost','root','','fic');
			if(! $this->connection)
			{
				die("Failed to connect to database " . 	mysqli_connect_error());
			}
		}

		function close()
		{
			mysqli_close($this->connection);
		}
		
		function display($obj)
		{
			while ($row = mysqli_fetch_assoc($obj)) 
			{
				# code...
				echo $row['cust_id'].'</br>'.$row['f_name'];
			}
		}

		function getParam($obj,$param)
		{
			if(mysqli_num_rows($obj) == 1)
			{
				while ($row = mysqli_fetch_assoc($obj)) {
					# code...
					return $row[$param];
				}
			}
		}
		
		function processQuery($query)
		{
			$result = mysqli_query($this->connection,$query);	
			return $result;
		}


	}
?>