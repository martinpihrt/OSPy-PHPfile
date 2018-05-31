<?php
   	include("connect.php");
   	
   	$link = Connection();
       
       define("API", "m1sdretrds"); // API heslo pro zapis z get dotazu do SQL
       
       if(!isset($_GET["api"])) die("Nevlozeno API!");
	
	$api = $_GET["api"];
	if($api != API) die("Chybne API!");
      
       $query = "insert into ospy (`tank`, `rain`, `humi`, `line`, `lastrun`, `station`, `duration`, `temper`) 
	values ('".$_GET["tank"]."','".$_GET["rain"]."','".$_GET["humi"]."','".$_GET["line"]."','".$_GET["lastrun"]."','".$_GET["station"]."','".$_GET["duration"]."','".$_GET["temper"]."')"; 
	mysqli_query($link, $query);
       die("OK");
		
	mysqli_close($link);
?>

