<?php 
session_start();
$coon = mysqli_connect('localhost','root','','parking_zone');

if(!$coon){
    echo 'error';
}