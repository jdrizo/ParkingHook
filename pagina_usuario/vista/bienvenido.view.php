<?php include('../shared/header.php');?>

<div class="container">
    <div class="row bg-secundario">
        <div class="col-lg-2"></div>
      <div class="col-lg-4 p-5" >
          <h3>Previsualizacion</h3>
          <img src="shared/drop-images.png" id="preview"  width="50%" alt="">
     
    <div ></div>
      </div>
        <div class="col-lg-4 pt-5">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <h4>Ingrese una fotografia</h4>
        <br>
        <div class="input-group">
        <div class="custom-file">
            <input type="file" id="file" class="custom-file-input" name="file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" >
            <label class="custom-file-label" id="text" for="inputGroupFile04">Ingrese imagen</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Subir</button>
        </div>
        </div>
        <?php if (!empty($alerta) )  {?>
                        <div class="alert alert-primary" role="alert">
                        <?php echo $alerta; ?>
                        </div>
                    <?php } ?>
        </form>
        
        
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<script>

        document.getElementById("file").onchange = function(e) { //cuando cambia al seleccionar
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();
             console.log(e.target.files[0].name);
            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);
            

            // Le decimos que cuando este listo ejecute el código interno
           reader.onload = listo;
           
           
           function listo() { //Ejecute un JavaScript inmediatamente después de que se haya cargado una página
                let preview = document.getElementById('preview').src = reader.result;
                let content = document.getElementById('text').textContent = e.target.files[0].name;
               
            }
        }
    </script>



<?php include('../shared/footer.php'); ?>