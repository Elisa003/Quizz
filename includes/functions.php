<?php

function isUserConnected() 
{
    return isset($_SESSION['login']);
}

?>