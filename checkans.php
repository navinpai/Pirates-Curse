<html>
<head>
<title>Pirate's Curse | Technix 6.0</title>
<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />

</head>
<body>
<?php session_start();
include 'vars.php';
date_default_timezone_set('Asia/Calcutta');
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db, $con);


echo '<div id="logout">';
if(isset($_SESSION['id']))
{
echo '<a href="logout.php">I Quit!</a><br/>';
}
else
{
echo '<a href="login.php">Begin Quest</a><br/>';
}
echo '</div>';
echo '<div id="ansdiv">';

$ans="";
$ans= $_POST['ans'];
if(!(strcmp($ans,$cheat)))
{
echo 'Neo, you are here!<br/>You can see the matrix<br/> You have WON!<br/><img src="site/matrix.jpg" /><br/>';
for($i=0;$i<$numq;$i++)
{
$query='insert into answers values('.$_SESSION['id'].','.$i.',NOW())';
$count=mysql_query($query) or die(mysql_error());
$_SESSION['answered'][] = $_SESSION['current'];  
}
echo 'You have only one place left to go! <a href="index.php">Click Here</a> to leave the matrix';
}
else
{
$dbans=strtolower($_SESSION['ans']);
if($ans==$dbans)
{
echo "CORRECT ANSWER<br/>You are one step closer to the treasure!<br/>";
if(!(in_array($_SESSION['current'],$_SESSION['answered'])))
{
$query='insert into answers values('.$_SESSION['id'].','.$_SESSION['order'][$_SESSION['current']].',NOW())';
$count=mysql_query($query) or die(mysql_error());
$_SESSION['answered'][] = $_SESSION['current'];  
}
if($_SESSION['current']>=$numqless)
$_SESSION['current'] =0;
else
$_SESSION['current'] =$_SESSION['current'] +1;
while(in_array($_SESSION['current'],$_SESSION['answered']))
{
if(count($_SESSION['answered'])>=$numq)
break;
else
{
if($_SESSION['current']>=$numqless)
$_SESSION['current'] =0;
else
$_SESSION['current']=$_SESSION['current']+1; 
}
}

echo '<a href="index.php">Next Clue</a>';
}
else
{
echo "Booooo.. WRONG ANSWER!<br/> You thought it would be that easy eh?<br/>";
echo '<a href="index.php">Go back and try again!</a>';
}
}
?>
</div>

</body>
</html>