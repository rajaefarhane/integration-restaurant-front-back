<?php
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=restaurant","root","");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}


?>
