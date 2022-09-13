<?php

if(empty($_SESSION)){
    session_start();
}
$user=$_ENV["USER"];
$host=$_ENV["HOST"];
$password=$_ENV["PASSWORD"];
$db=$_ENV["DBNAME"];

$db = mysqli_connect($host,$user,$password,$db);

if($db === false){
    die("Cannot connect to database.");
}

