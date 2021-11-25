<?php session_start();
if(!isset($_SESSION['nombre'])){
   header('location: login');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  session_destroy();
  header('location: login');
}
 ?>

<?php include('../vista/home.view.php');?>