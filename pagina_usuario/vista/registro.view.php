<?php include('../shared/header.php'); ?>
<link rel="stylesheet" href="../estilos/registro.css">
<body>
<div class="container">
    <section id="content">
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="bg-light p-5">
            <h1>Registrate Aqui</h1>
            <div>
                <input type="text" placeholder="Escriba Un Usuario" required="true" name="nombre" />
            </div>
            <div>
                <input type="text" placeholder="Escriba Un Correo Electronico" required="true" name="correo" />
            </div>
            <div>
                <input type="password" placeholder="Escriba Una Contraseña" required="true" name="contraseña" />
            </div>
             <div>
                <input type="password" placeholder="Repita La Contraseña Anterior" required="true" name="contraseña1" />
            </div>
            <div>
                <input type="submit" value="Registrarse" />
                <a href="../modelo/login">Regresar</a>
            </div>
        </form><!-- form -->
    </section><!-- content -->
</div><!-- container -->
</body>
                    <?php if (!empty($errores))  {?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $errores; ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php } ?>
                
<?php include('../shared/footer.php'); ?>

