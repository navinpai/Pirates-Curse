<html>
<head>
<title>Pirates CURSE</title>
<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />
</head>
<body>
<div id="ansdiv">
<?php session_start();
date_default_timezone_set('Asia/Calcutta');
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
echo '<img src="site/admin.png" /><br/><br/>';  
echo '<form action="admin.php" method="post">';
echo 'Password&nbsp;&nbsp;: <input type="password" name="pass" /><br />';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SHOW STATS" /><br/>';
echo '</form>';

?>
</div>
</body>
</html>