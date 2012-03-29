<html>
<head>
<title>Pirates Curse | Technix 6.0</title>
<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />
</head>
<body>
<div class="headerpic" id="headerpic">
				<a href="#home"><img src="site/header.png" /></a>
</div>
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
echo '<div id="piratediv">';
if(isset($_SESSION['id']))
{
if(count($_SESSION['answered'])=== $numq)
{
$query = 'INSERT INTO winner VALUES ('.$_SESSION['id'].', NOW() )';
mysql_query($query) or die(mysql_error());

echo "YOU HAVE SOLVED ALL THE CLUES! HURRAH MATEY!<br/>The Treasure is yours!<br/>";
echo '<img src="site/treasure.png" /><br/>';
//var_dump($_SESSION['answered']);
}
else
{
if(isset($_GET['a'])){
if($_SESSION['current']>=$numqless)
{
$_SESSION['current'] =0;
}
else
$_SESSION['current'] =$_SESSION['current'] +1;
if(!(is_null($_SESSION['answered'])))
{
while(in_array($_SESSION['current'],$_SESSION['answered']	))
{
if($_SESSION['current']>=$numqless)
$_SESSION['current'] =0;
else
$_SESSION['current']=$_SESSION['current']+1; 
}
}
else
$_SESSION['current']=$_SESSION['current']+1; 
}

//var_dump($_SESSION['order']);
//echo $_SESSION['current'];
$query='select * from questions where questions.id="'.$_SESSION['order'][$_SESSION['current']].'"';
$count=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($count); 
echo '<img src="images/'.$row['pic'].'.png" /><br/>';
$_SESSION['ans']=$row['answer'];
echo '<br/><form action="checkans.php" method="post">';
echo 'Answer: <input type="text" name="ans" />';
echo '<input type="submit" value="SUBMIT" />';
echo '</form>';
echo'<a href="index.php?a=1">Skip this question</a><br/>';
//var_dump($_SESSION['answered']);
echo "You have answered ".count($_SESSION['answered'])." so far...";
}
}
else
{
echo '<img src="site/home.png" /><br/>';
}
?>
</div>
</body>
</html>