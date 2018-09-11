<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
	//These below codes are from:
	//http://php.net/session_destroy
	//To logout. 
	
	// Initialize the session.
	// If you are using session_name("something"), don't forget it now!
	session_start();
	
	// Unset all of the session variables.
	$_SESSION = array();
	
	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}
	
	// Finally, destroy the session.
	session_destroy();
	header("Location: login.php");

?>

</body>
</html>