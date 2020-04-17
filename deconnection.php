<?php
session_start();
session_destroy();

require_once "includes/functions.php";

redirige('index.php');
?>