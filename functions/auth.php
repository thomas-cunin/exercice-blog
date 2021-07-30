<?php

<<<<<<< HEAD
/**
 * Indique si l'utilisateur est connecté
 *
 * @return bool
 */
function isAuthenticated(): bool
=======

function isAuthenticated()
>>>>>>> 7955a96f82ec84472a25bda5e1f6bd60ce587812
{
	// if (isset($_SESSION['auth'])) {
	// 	return true;
	// } else {
	// 	return false;
	// }

	return isset($_SESSION['auth']);
<<<<<<< HEAD
}
=======
}
>>>>>>> 7955a96f82ec84472a25bda5e1f6bd60ce587812
