<?php
   	include("connect.php");
   	
   	$link = Connection();
       
       define("API", "zadejte api heslo sem"); // API heslo pro zapis z get dotazu do SQL
       
       if(!isset($_GET["api"])) die("Nevlozeno API!");
	
	$api = $_GET["api"];
	if($api != API) die("Chybne API!");
      
       $query = "insert into ospy (`tank`, `rain`, `humi`, `line`, `lastrun`, `station`, `duration`) 
	values ('".$_GET["tank"]."','".$_GET["rain"]."','".$_GET["humi"]."','".$_GET["line"]."','".$_GET["lastrun"]."','".$_GET["station"]."','".$_GET["duration"]."')"; 
	mysql_query($query,$link);
       die("OK");
		
	mysql_close($link);
?>

