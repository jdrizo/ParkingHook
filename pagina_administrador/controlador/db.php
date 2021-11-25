<?php 
session_start();
$coon = mysqli_connect('sql437.main-hosting.eu','u991668360_parkzone','Parkadsi12345','u991668360_parking_zone');

if(!$coon){
    echo 'error';
}