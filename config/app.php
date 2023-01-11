<?php

// Connect To Database
$mysql = new mysqli('localhost','root','','fahad');

// CharSet
$mysql->set_charset("utf8");

// Hide Error 
error_reporting(0);
ini_set('display_errors',0);
?>