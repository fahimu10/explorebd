<?php

require_once 'source/session.php';
session_unset();
session_destroy();
header('location: index.html');

?>
