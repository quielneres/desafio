<?php
$host = "localhost";
$port = "5432";
$dbname = "desafio";
$user = "postgres";
$password = "";
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);
?>