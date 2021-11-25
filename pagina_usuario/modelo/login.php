<?php include('../controlador/db.php');

if(isset($_SESSION['nombre'])){
  header('location: home');
}
$errores = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contraseña'])){

   $nombre = $_POST['nombre'];
   $correo = $_POST['correo'];
   $contraseña = md5($_POST['contraseña']);
  
   $query = "SELECT * from usuario_sesion where (nombre='$nombre' or correo='$correo' or contraseña = '$contraseña')";
  // $resultado = mysqli_query($coon,$query);
   if(mysqli_num_rows($resultado = mysqli_query($coon,$query)) > 0){
           
    foreach($resultado as $row){
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['correo'] = $row['correo'];
         $_SESSION['contraseña'] = $row['contraseña'];

     }  

     header('location: home');
     
   }else{
     $errores .= 'contraseña o correo incorrecto';
   }

  }else{
    $errores .= 'Todos los datos son necesarios';
  }

}

include('../vista/login.view.php');