<html>
<head>
<title>Pirates Curse | Technix 6.0</title>
<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />

</head>
<body>
<div id="ansdiv">
<?php session_start();
include 'vars.php';

date_default_timezone_set('Asia/Calcutta');
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db, $con);

$uname= $_POST['uname'];
$pass = $_POST['pass'];
$query='select id from users where username="'.$uname.'" and password="'.$pass.'"';
$count=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($count); 
$type = mysql_num_rows($count); 
if(type === 0)
{
echo '<a href="login.php">LOGIN</a><br/>';
echo "INCORRECT LOGIN";
}
else
{
$_SESSION['id']=$row['id'];
echo "You have logged in successfully! Time to begin the treasure hunt!<br/>";
$query = mysql_query("SELECT * FROM questions"); 
$number=mysql_num_rows($query); 

$result = mysql_query ("SELECT id FROM questions ORDER BY RAND() LIMIT $number");
$order='';
$orderarray = array();
while ($row = mysql_fetch_assoc($result)) {
$order=$order.','.$row["id"];
$orderarray[] = $row["id"];
}
$query='update users set users.order="'.$order.'" where users.id="'.$_SESSION['id'].'"';
$count=mysql_query($query) or die(mysql_error());	
$_SESSION['order']=$orderarray;
$_SESSION['current']=0;
$_SESSION['answered']=array();
//var_dump($orderarray);
echo '<br/><br/><a href="index.php">Click Here</a> TO BEGIN<br/>';
}
?>
</div>
</body>
</html>