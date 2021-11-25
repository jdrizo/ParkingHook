<?php
 include('../controlador/db.php');
 if(isset($_SESSION['nombre'])){
   header('location: home');
}
 $errores = '';
 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $num_contrato = $_POST['num_contrato'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $contraseña1 = $_POST['contraseña1'];
    
    if(!empty($num_contrato) && !empty($nombre) && !empty($correo) && !empty($contraseña) && !empty($contraseña1)){

      $num_contrato = filter_var(trim($num_contrato),FILTER_SANITIZE_STRING);
      $nombre = filter_var(trim($nombre),FILTER_SANITIZE_STRING);
      $correo = filter_var(trim($correo),FILTER_SANITIZE_EMAIL);
      $contraseña = trim($contraseña);
      $contraseña1 = trim($contraseña1);
      
      //validar que el gmail no exista en la db
      $query = "SELECT * from administrador_sesion where correo='$correo' limit 1";
      $resultado = mysqli_query($coon,$query);

      if(mysqli_num_rows($resultado) > 0){
         $errores .= 'EL correo ya existe </br>';
      }

      if($contraseña != $contraseña1){
         $errores .= 'las contrase;as no coinciden';
      }

      //si no exixte ningun error
      if(!$errores){
         $password = md5($password);
         $query = "INSERT INTO administrador_sesion(num_contrato,nombre,correo,contraseña) values('$num_contrato','$nombre','$correo','$contraseña')";
         if(mysqli_query($coon,$query)){
           $_SESSION['num_contrato'] = $nombre;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['correo'] = $correo;
            $_SESSION['contraseña'] = $contraseña;
            header('location: home');
        }
       

      }
      
           
      }else{
         $errores .= 'Todos los datos son obligatorios';
      }

        
            
 }





include('../vista/registro.view.php');