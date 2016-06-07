<html>
<body>
<?php
session_start();
if(isset($_SESSION['Username'])) {
	echo $_SESSION['Username'];
	unset($_SESSION['Username']);
}

if(isset($_SESSION['Specificatie'])) {
	echo $_SESSION['Specificatie'];
	unset($_SESSION['Specificatie']);
}
?>
</body>
</html>