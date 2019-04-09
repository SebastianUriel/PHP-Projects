<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario</title>
        
        <!-- Librerias -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
        <!-- Php -->
        <?php
            foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Brackets-php/View/*.php") as $filename)
            {
                include $filename;
            }

            if (isset($_POST['Insertar'])) {
                $v_Libro = new v_Libro();
                echo $v_Libro->viewLibro1($_POST['nombre'], $_POST['autor'], $_POST['edicion']);
            }
        
            if (isset($_POST['Borrar'])) {
                $v_Libro = new v_Libro();
                echo $v_Libro->viewLibro2($_POST['idLibro']);
            }
        ?>
        
        <!-- JavaScript -->
        <script>
            function soloLetras(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toString();
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
                especiales = [8, 37, 39, 46, 6];
                tecla_especial = false
                
                for(var i in especiales) {
                    if(key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }
                
                if(letras.indexOf(tecla)==-1 && !tecla_especial){
                    return false;
                }
                
                if(e.key == "." || e.key == "'"){
                    return false;   
                }
            }
        </script>
        
        
    </head>
    <body>
        
        <div class="container">
        
            <h3>Formulario (Libros)</h3>  

            <form method='post'>
                <table class="table table-bordered">
                    <tr>
                        <td><dt>Nombre libro:</dt></td>
                        <td> <input type='text' name='nombre' required></td>
                    </tr>
                    <tr>
                        <td><dt>Autor:</dt></td>
                        <td><input type='text' name='autor' onkeypress="return soloLetras(event);" required></td>
                    </tr>
                    <tr>
                        <td><dt>Fecha Edición:</dt></td>
                        <td><input type='text' name='edicion' required></td>
                    </tr>
                </table>

                <input type='submit' value='Insertar' name="Insertar" class="btn" />
            </form>
            
            <br />
            <h3>Borrar Libro</h3>  
            
            <form method='post'>
                <table class="table table-bordered">
                    <tr>
                        <td><dt>ID libro:</dt></td>
                        <td> <input type='text' name='idLibro' required></td>
                    </tr>
                </table>

                <input type='submit' value='Borrar' name="Borrar" class="btn" />
            </form>
            
        </div>
        
    </body>
</html>