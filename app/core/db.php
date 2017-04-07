<?php
/**
* 
*/
class Db
{
	public function db_connect($host = DB_HOST,$user = DB_USERNAME,$pass = DB_PASSWORD,$db = DB_NAME)
	{
		$con = mysqli_connect($host,$user,$pass,$db);

		// Check connection
		if (mysqli_connect_errno())
		{
		  echo "Failed to connect to MySQLi: " . mysqli_connect_error();
		}else{
			return $con;
		}

	}

	public function get_data($sql)
	{
		$query = mysqli_query($this->db_connect(), $sql);
		$rows = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function set_data($sql)
	{
		return mysqli_query($this->db_connect(), $sql);
	}
}