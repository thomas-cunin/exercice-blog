<?php

/** Fichiers contenants les fonctions utilitaires */

/**
 * Redirige vers l'url spécifiée
 *
 * @param string $url
 * @return void
 */
function redirect(string $url): void
{
	header("Location: $url");
	exit();
}
