<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.classless.min.css">
	
    <title>Easter</title>
</head>
<body>

<H1>Date of Easter: Gauss’ Algorithm</H1>
<h3>Enter Year (2023-2123):</h3>
<form action="index.php" method="post">
<input type="text" name="subject" id="subject" value="">
<button type="submit" name="ok">OK</button>
</form>

</body>

<?php

function gaussEaster($Y)
{
    $A;
    $B;
    $C;
    $P;
    $Q;
    $M;
    $N;
    $D;
    $E;
    
    $A = $Y % 19;
    $B = $Y % 4;
    $C = $Y % 7;
    $P = floor($Y / 100);
    $Q = floor((13 + 8 * $P) / 25);
    $M = (15 - $Q + $P - floor($P / 4)) % 30;
    $N = (4 + $P - floor($P / 4)) % 7;
    $D = (19 * $A + $M) % 30;
    $E = (2 * $B + 4 * $C + 6 * $D + $N) % 7;
    $days = 22 + $D + $E;
    
    if (($D == 29) && ($E == 6)) {        
        return array(04, 19);        
    }
    else if (($D == 28) && ($E == 6)) {        
        return array(04, 18);        
    }
    else {
        if ($days > 31) {            
            return array(04, $days - 31);
        }
        else {            
            return array(03, $days);            
        }
    }
}

function showMonth($month, $year, $iday)
{
  $date = mktime(12, 0, 0, $month, 1, $year);
  $daysInMonth = date("t", $date);
  $offset = date("w", $date);
  $rows = 1;
   
  echo "<h3>Calendar for " . date("F Y", $date) . "</h3>\n";
   
  echo "<table border=\"1\">\n";
  echo "\t<tr><th>Su</th><th>M</th><th>Tu</th><th>W</th><th>Th</th><th>F</th><th>Sa</th></tr>";
  echo "\n\t<tr>";
   
  for($i = 1; $i <= $offset; $i++)
  {
    echo "<td></td>";
  }
  
  for($day = 1; $day <= $daysInMonth; $day++)
  {
    if( ($day + $offset - 1) % 7 == 0 && $day != 1)
    {
      echo "</tr>\n\t<tr>";
      $rows++;
    }
    
    if($iday==$day) {    
     echo "<td>" . $day . " Easter </td>";
	}
	else
	{
     echo "<td>" . $day . "</td>";
	} 
  }

  while( ($day + $offset) <= $rows * 7)
  {
    echo "<td></td>";
    $day++;
  }

  echo "</tr>\n";
  echo "</table>\n";
}


if(isset($_POST['ok']))
{
	$value = $_POST['subject'];
	$date = gaussEaster($value);
	showMonth($date[0],$value,$date[1]); 
	
	
	$datelist = array();
	for ($x = 2023; $x <= 2123; $x++) {
		$var = gaussEaster($x);		
		$datelist[] = $var[0].$var[1];		
	} 
	
	//what date is most common	
    $arr_freq = array_count_values($datelist);    
    arsort($arr_freq);
    $new_arr = array_keys($arr_freq);
    echo "Most frequent Month and day is:"." ".$new_arr[0];
}

?>



