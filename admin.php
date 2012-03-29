<html>
<head>
<title>Pirate's Curse | Technix 6.0</title>
<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<meta http-equiv="refresh" content="60">
</head>
<body>
<div id="ansdiv">
<table border="1">
<?php session_start();
include 'vars.php';
date_default_timezone_set('Asia/Calcutta');
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
mysql_select_db($db, $con);
for($i=1;$i<=$numteams;$i++)
{
echo '<tr>';
$query = 'select * from users where id='.$i;
$count=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($count); 
echo '<td>'.$row['username'].'</td>';

$query = 'select count(*) as cnt from answers where username='.$i;
$count=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($count);
if($row['cnt'] == 0)
{echo "<td>&nbsp;&nbsp;&nbsp;Yet to even start!&nbsp;&nbsp;&nbsp;</td>";
}
else
{
echo '<td>'.$row['cnt'].'</td>';
}
echo '</tr>';
}
?>
</table>
</div>
</body>
</html>