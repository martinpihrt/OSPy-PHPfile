<?php
   	include("connect.php");
   	
   	$link = Connection();

   	/* sql vytvoreni tabulky */
      $sql = "CREATE TABLE IF NOT EXISTS ospy (
      id int NOT NULL AUTO_INCREMENT,
      time TIMESTAMP,
      tank varchar(5),
      percent varchar(5),
      ping varchar(5),
      volume varchar(5),
      rain varchar(2),
      humi varchar(5),
      line varchar(2),
      lastrun varchar(30),
      station varchar(30),
      duration varchar(30),
      temp1 varchar(5),
      temp2 varchar(5),
      temp3 varchar(5),
      temp4 varchar(5),
      temp5 varchar(5),
      temp6 varchar(5),
      tempDHT varchar(5),
      humiDHT varchar(5),
      PRIMARY KEY (id)
      )"; 

    if ($link->query($sql) === TRUE) {
        echo "TABLE OK";
        if(!isset($_GET["api"])) {
            mysqli_close($link);
            die(", API not insert!");
        }
	
        $in_api = $_GET["api"];
        $api = API();

        if($in_api != $api){
          die(", ERROR: API fault!");
        }
 
        echo ", API OK";

        $tank = $_GET["tank"];
        $percent = $_GET["percent"];
        $ping = $_GET["ping"];
        $volume = $_GET["volume"];
        $rain = $_GET["rain"];
        $humi = $_GET["humi"];
        $line = $_GET["line"];
        $lastrun = $_GET["lastrun"];
        $station = $_GET["station"];
        $duration = $_GET["duration"];
        $temp1 = $_GET["temp1"];
        $temp2 = $_GET["temp2"];
        $temp3 = $_GET["temp3"];
        $temp4 = $_GET["temp4"];
        $temp5 = $_GET["temp5"];
        $temp6 = $_GET["temp6"];    
        $tempDHT = $_GET["tempDHT"];  
        $humiDHT = $_GET["humiDHT"];  

        if($link) {   
            $query = "INSERT INTO ospy (`tank`,`percent`,`ping`,`volume`,`rain`,`humi`,`line`,`lastrun`,`station`,`duration`,`temp1`,`temp2`,`temp3`,`temp4`,`temp5`,`temp6`,`tempDHT`,`humiDHT`)
                  VALUES ('{$tank}','{$percent}','{$ping}','{$volume}','{$rain}','{$humi}','{$line}','{$lastrun}','{$station}','{$duration}','{$temp1}','{$temp2}','{$temp3}','{$temp4}','{$temp5}','{$temp6}','{$tempDHT}','{$humiDHT}')
                  ";

	     mysqli_query($link, $query);
            die(", SAVE OK");
            mysqli_close($link);
       }
    }
    else {
        echo "ERROR: " . $conn->error;
        mysqli_close($link);
    }
	
?>

