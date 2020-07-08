<?php

$dsn = "mysql:host=127.0.0.1;dbname=movies_db;port=3306";
$username = "root";
$password = "";
$opcional = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
$db = new PDO($dsn, $username, $password, $opcional);


