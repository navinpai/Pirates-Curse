<html>
<head>
<title>Pirate's Curse | Technix 6.0</title>
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
echo '<img src="site/login.png" /><br/>';  
echo '<form action="checklogin.php" method="post">';
echo 'Username&nbsp;&nbsp;	: <input type="text" name="uname" /><br />';
echo 'Password&nbsp;&nbsp;: <input type="password" name="pass" /><br />';
echo '<input type="submit" value="LOGIN" /><br/>';
echo '</form>';

?>
</div>
</body>
</html>