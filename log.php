<?

	include("connect.php"); 	
	
	$link=Connection();

	$result=mysql_query("SELECT * FROM ospy ORDER BY `time` DESC LIMIT 1000",$link); 
?>

<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 <title>AUTOMAT OSPy</title>
 <meta http-equiv="refresh" content="120">
 </head>
 <body>
 <h1>Z&aacute;znamy automatu</h1>
 <p>(Posledn&iacute;ch 1000 z&aacute;znam&#367;)</p>
            
   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td><b>&nbsp;Datum &#268;as&nbsp;</b></td>
            <td><b>&nbsp;N&aacute;dr&#382; [%]</b></td>
            <td><b>&nbsp;Vlhkost [%RV]</b></td> 
            <td><b>&nbsp;Stanice&nbsp;</b></td> 
			<td><b>&nbsp;B&#283;&#382;ela&nbsp;</b></td>
			<td><b>&nbsp;Trv&aacute;n&iacute;&nbsp;</b></td>
            <td><b>&nbsp;Stav napajen&iacute;&nbsp;</b></td>
            <td><b>&nbsp;&#268;idlo de&#353;t&#283;&nbsp;</b></td>
		</tr>

      <?php     
                if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["time"], $row["tank"], $row["humi"], $row["station"], $row["lastrun"], $row["duration"], $row["line"], $row["rain"]);
		     }
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>
   </table>
<h2>Zp&#283;t</h2>
 <a href="index.php">
 <img border="0" alt="obrazek zpet na uvod" src="undo.png" width="200" height="200">
 </a>

<p>&copy; <a href="https://www.pihrt.com">Pihrt.com</a> AUTOMAT OSPy. </p> 
</body>
</html>


 