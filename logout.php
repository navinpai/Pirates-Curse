<html>
<head>
<title>Pirate's Curse | Technix 6.0</title>
<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />

</head>
<body>
<div id="ansdiv">
<?php  session_start();

 session_unset(); 
 
 session_destroy(); 
 echo "Successfully logged out!<br/>";
echo '<a href="login.php">Login again?</a><br/>';
 ?> 
</div>
</body>
</html>