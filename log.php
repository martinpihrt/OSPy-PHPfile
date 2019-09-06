<?

	include("connect.php"); 	
	
	$link=Connection();

	$result=mysqli_query($link, "SELECT * FROM ospy ORDER BY `time` DESC LIMIT 1000"); 
?>

<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 <title>OpenSprinkler OSPy</title>
 <meta http-equiv="refresh" content="120">
 </head>
 <body>
 <h1>Z&aacute;znamy automatu</h1>
 <p>(Posledn&iacute;ch 1000 z&aacute;znam&#367;)</p>
            
   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td><b>&nbsp;Datum &#268;as&nbsp;</b></td>
            <td><b>&nbsp;N&aacute;dr&#382; [%]</b></td>
            <td><b>&nbsp;N&aacute;dr&#382; [cm]</b></td>
            <td><b>&nbsp;N&aacute;dr&#382; [ping]</b></td>
            <td><b>&nbsp;N&aacute;dr&#382; [m3]</b></td>
            <td><b>&nbsp;Vlhkost [%RV]</b></td> 
            <td><b>&nbsp;Stanice&nbsp;</b></td> 
			<td><b>&nbsp;B&#283;&#382;ela&nbsp;</b></td>
			<td><b>&nbsp;Trv&aacute;n&iacute;&nbsp;</b></td>
            <td><b>&nbsp;Stav napajen&iacute;&nbsp;</b></td>
            <td><b>&nbsp;&#268;idlo de&#353;t&#283;&nbsp;</b></td>
            <td><b>&nbsp;Teplota&nbsp;[DS1]</b></td>
            <td><b>&nbsp;Teplota&nbsp;[DS2]</b></td>
            <td><b>&nbsp;Teplota&nbsp;[DS3]</b></td>
            <td><b>&nbsp;Teplota&nbsp;[DS4]</b></td>
            <td><b>&nbsp;Teplota&nbsp;[DS5]</b></td>
            <td><b>&nbsp;Teplota&nbsp;[DS6]</b></td>
            <td><b>&nbsp;Teplota&nbsp;[DHT]</b></td>
            <td><b>&nbsp;Vlhkost&nbsp;[DHT]</b></td>
		</tr>

      <?php     
                if($result!==FALSE){
		     while($row = mysqli_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["time"], $row["percent"], $row["tank"], $row["ping"], $row["volume"], $row["humi"], $row["station"], $row["lastrun"], $row["duration"],$row["line"],$row["rain"],$row["temp1"],$row["temp2"],$row["temp3"],$row["temp4"],$row["temp5"],$row["temp6"],$row["tempDHT"],$row["humiDHT"]);
		     }
		     mysqli_free_result($result);
		     mysqli_close();
		  }
      ?>
   </table>
<h2>Zp&#283;t</h2>
 <a href="index.php">
 <img border="0" alt="obrazek zpet na uvod" src="undo.png" width="100" height="100">
 </a>

<p>&copy; <a href="https://www.pihrt.com">Pihrt.com</a> OpenSprinkler OSPy. </p> 
</body>
</html>


 