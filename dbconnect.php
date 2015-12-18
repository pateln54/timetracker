<?php

class DBConnect
{
	private $user;
	private $pass;
	private $dbname;
	private $host;

	function connectdb($host, $db, $user, $pass)
	{
		try
		{
			$dbh = new PDO('mysql:host='.$host.';dbname='.$db.'', $user, $pass);
			return $dbh;
		} catch(PDOException $e) {
			print "Error!: ". $e->getMessage() . "<br>";
			die();
		}	
	}
}

?>
