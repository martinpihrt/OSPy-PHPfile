<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>AUTOMAT OSPy</title>
<meta http-equiv="refresh" content="60">
</head>
<body>
<h1>Stav automatu</h1>
<p id="cas"></p>
<?
 function map($value, $fromLow, $fromHigh, $toLow, $toHigh) { // konverze rozsahu na jiny rozsah
    $fromRange = $fromHigh - $fromLow;
    $toRange = $toHigh - $toLow;
    $scaleFactor = $toRange / $fromRange;

    // Re-zero the value within the from range
    $tmpValue = $value - $fromLow;
    // Rescale the value to the to range
    $tmpValue *= $scaleFactor;
    // Re-zero back to the to range
    return $tmpValue + $toLow;
    }

 include("connect.php"); 	
 $link=Connection();

 $query = mysqli_query($link, "SELECT * FROM ospy WHERE time = (SELECT MAX( time ) FROM ospy) "); 

 if($row = mysqli_fetch_array($query)){ 
    $time= $row["time"];
    $tank=$row['tank'];
    $rain=$row['rain'];
    $humi=$row['humi'];
    $line=$row['line'];
    $lastrun=$row['lastrun'];
    $station=$row['station'];
    $duration=$row['duration'];
    }
 else {
    $time= "Chyba SQL";
    $tank=" ";
    $rain=" ";
    $humi=" ";
    $line=" ";
    $lastrun=" ";
    $station=" ";
    $duration=" ";
    }
 echo ("<b>Z&#225;znam ze dne:</b> $time");

if ($tank!=""){
 echo ("<h2>N&#225;dr&#382; s vodou</h2>");
 if ($tank < 20){ 
    echo ("<span style=\"color:red;font-size:60px;text-align:center;\">$tank %</span>"); 
    }
 if ($tank >= 20 && $tank < 50){
    echo ("<span style=\"color:orange;font-size:60px;text-align:center;\">$tank %</span>"); 
    }
 if ($tank >= 50){
    echo ("<span style=\"color:green;font-size:60px;text-align:center;\">$tank %</span>");  
    }
 // ctverec 50x50 
 $im = imagecreatetruecolor(55, 30);
 $modra = imagecolorallocate($im, 0, 0, 255);
 $bila = imagecolorallocate($im, 255, 255, 255);
 
 // modry ctverec
 imagefilledrectangle($im, 5, 3, 49, 26, $modra);

 // bily ctverec
 imagefilledrectangle($im, 5, 3, 49, map($tank,0,100,26,3), $bila); // y musi byt 3 pro max 100%  a 26 pro min 0%

 // ulozime jako obrazek
 imagepng($im, './bar.png');
 imagedestroy($im);
 // vytiskneme
 echo ("<br><img border=\"0\" alt=\"bargraph\" src=\"bar.png\" width=\"200\" height=\"200\">");
 }

if ($rain!=""){
 echo ("<h2>&#268;idlo de&#353;t&#283;</h2>");
 if ($rain==1){
    echo ("<img border=\"0\" alt=\"obrazek prsi\" src=\"rain.png\" width=\"200\" height=\"200\">");
    }
 if ($rain==0){
    echo ("<img border=\"0\" alt=\"obrazek slunce\" src=\"norain.png\" width=\"200\" height=\"200\">");
    }
  }

if ($line!=""){
 echo ("<h2>Nap&#225;jen&iacute;</h2>");
 if ($line==1){
    echo ("<img border=\"0\" alt=\"obrazek pro power on\" src=\"on.png\" width=\"200\" height=\"200\">");
    }
 if ($line==0){
    echo ("<img border=\"0\" alt=\"obrazek pro power off\" src=\"off.png\" width=\"200\" height=\"200\">");
    }
  }

if ($lastrun){
 echo ("<h2>Naposledy b&#283;&#382;ela stanice</h2>");
 if ($lastrun!=0){
    echo ("<p><b>Stanice:</b> $station<br>");
    echo ("<b>po dobu:</b> $duration [min:sec]<br>"); 
    echo ("<b>dne:</b> $lastrun<br>");
    if ($humi!=""){
      echo ("<b>vlhkost:</b> $humi [%RV]</p>");
      }
    }
  }

 echo ("<h2>Z&aacute;znamy</h2>");
 echo ("<a href=\"log.php\"><img border=\"0\" alt=\"obrazek pro vstup do logu\" src=\"log.png\" width=\"200\" height=\"200\"></a>");
 mysqli_close($link);
?>

<script type="text/javascript">
// cas
function nactiCas (){
var datum = new Date(); 
var m = "";
var s = "";
var mon = "";
if (datum.getMinutes()< 10) m = "0"; 
else m = "";
if (datum.getSeconds()< 10) s = "0"; 
else s = "";
if ((1 + datum.getMonth())< 10) mon = "0"; 
else mon = "";
aktualniCas = datum.getFullYear() + "-" + mon +(1 + datum.getMonth()) + "-" + datum.getDate() + " " + datum.getHours() + ":" + m + datum.getMinutes() + ":" + s + datum.getSeconds();
window.document.getElementById("cas").innerHTML = aktualniCas;
}

nactiCas(); //naplneni na zacatku
window.setInterval("nactiCas()", 1000); //pravidelna zmena, sekunda
</script>

<h2>Foto</h2>
<p><a href="camfoto/foto.jpg" target="_blank"><img src="camfoto/foto.jpg" alt="snapshot" width="320" height="240"></a></p>
 
<p>&copy; <a href="https://pihrt.com">Pihrt.com</a> AUTOMAT OSPy. </p> 
<p>Pro plugin <a href="https://pihrt.com/elektronika/248-moje-rapsberry-pi-zavlazovani-zahrady">Remote Notifications</a> automatu <a href="https://github.com/martinpihrt/OSPy">OpenSprinkler</a> OSPy. </p> 
</body>
</html>
