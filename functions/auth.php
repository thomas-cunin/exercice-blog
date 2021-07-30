<?php


function isAuthenticated()
{
	// if (isset($_SESSION['auth'])) {
	// 	return true;
	// } else {
	// 	return false;
	// }

	return isset($_SESSION['auth']);
}
