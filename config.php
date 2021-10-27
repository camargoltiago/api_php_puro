<?php

$db_host      = '127.0.0.1';
$db_name      = 'api_php_puro';
$db_user      = 'root';
$db_password  = '';

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);

$array = [
  'error'   => '',
  'success' => []
];
