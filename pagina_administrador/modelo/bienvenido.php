<?php include('../controlador/db.php');
$alerta = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name']; //ruta
        $num_contrato = $_SESSION['num_contrato'];
        $nombre = $_SESSION['nombre'];
        $correo = $_SESSION['correo'];
        $contraseña = $_SESSION['contraseña'];

        try {
         $query = "INSERT INTO administrador_sesion(num_contrato,nombre,correo,contraseña) values('$num_contrato','$nombre','$correo','$contraseña')";
        if(mysqli_query($coon,$query)){
            move_uploaded_file($temp, 'shared/images/'.$name);
            session_destroy();

           
            echo '<script>
            setTimeout(function() {
                swal({
                    title: "Wow!",
                    text: "Message!",
                    type: "success"
                }, function() {
                    window.location = "redirectURL";
                });
            }, 1000);
        </script>';
        }

       } catch (\Throwable $th) {
           
            throw $th;
        }
        
       
    }
    

}
require('../vista/bienvenido.view.php');