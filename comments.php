<?php

$comments = findComments($_GET['id_post']);

require 'comments.phtml';