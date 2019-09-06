<?php

	function Connection(){
		$server="zadejte";  // adresa serveru db
		$user="zadejte";    // uzivatel db
		$pass="zadejte";    // heslo db
		$db="ospy";         // nazev databaze db
              
		$link = mysqli_connect($server, $user, $pass, $db);

		if (!$link) {
                 echo "Error: Unable to connect to MySQL." . PHP_EOL;
                 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                 exit;
                 }

              return $link;
	}

	function API(){
		$api="zadejte";     // pristup k PHP souboru save.php
		return $api;
	}

?>
