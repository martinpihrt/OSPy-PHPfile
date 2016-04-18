<?php

	function Connection(){
		$server="zadejte";  // adresa serveru db
		$user="zadejte";    // uzivatel db
		$pass="zadejte";    // heslo db
		$db="ospy";         // nazev databaze db
              
		$connection = mysql_connect($server, $user, $pass);

		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>
