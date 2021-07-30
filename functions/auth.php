<?php
/**
 * Indique si l'utilisateur est connecté
 *
 * @return bool
 */
function isAuthenticated(): bool

{
	// if (isset($_SESSION['auth'])) {
	// 	return true;
	// } else {
	// 	return false;
	// }

	return isset($_SESSION['auth']);
}
