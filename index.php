<?php

/* 
 * Include database connection file 
 */

include_once('dbconnect.php');

$conn 	= new DBConnect();
$dbh 	= $conn->connectdb('localhost', 'tasktimer', 'root', ''); 

$stmt	= $dbh->prepare("INSERT INTO users (user_name, user_pass, user_role) VALUES (:name, :pass, :role) ");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':pass', $pass);
$stmt->bindParam(':role', $role);

//Insert one row
$name 	= 'Jack Sparrow';
$pass 	= md5('sparrow');
$role 	= 1;

$stmt->execute();

$query 	= $dbh->prepare("SELECT * FROM users where user_id = ? ");
if( $query->execute(array(1)) ) 
{
	while( $row = $query->fetch() )
	{
		print_r($row);
	}
}

?>
