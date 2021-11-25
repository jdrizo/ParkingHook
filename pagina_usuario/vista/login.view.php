<?php include('../shared/header.php'); ?>
<link rel="stylesheet" href="../estilos/inicio.css">
<body>
<div class="container">
    <section id="content">
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="bg-light p-5">
            <h1>Inicio De Sesion Usuario</h1>
            <div>
                <input type="text" placeholder="Digite Su Usuario" required="true" name="nombre" />
            </div>
            <div>
                <input type="text" placeholder="Digite Su Correo Electronico" required="true" name="correo" />
            </div>
            <div>
                <input type="password" placeholder="Digite Su Contraseña" required="true" name="contraseña" />
            </div>
            <div>
                 <input type="submit" value="Iniciar Sesion" /><a href="../../pagina_principal">Regresar</a>
                <a href="#">Perdiste tu contraseña?</a>
                <a href="../modelo/registro">Registrate Aqui</a>
                 <?php if (!empty($errores) )  {?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $errores; ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php } ?>

               
                
            </div>
        </form><!-- form -->
    </section><!-- content -->
</div><!-- container -->
</body>

                   
<?php include('../shared/footer.php'); ?>

