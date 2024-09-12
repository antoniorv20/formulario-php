<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <!-------------------Archivos de bootstrap css----------------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container">
    <h1>Formulario</h1>
    <!-- enctype
        Esta propiedad define como tienen que ser codificados los datos cuando se envian al servidor
        Valores que puede tomar:
        1 - application/x-www-form-urlencoded (valor por defecto)
            Todos los datos son codificados antes de ser enviados
            Es el valor predeterminado si no se especifica nada
            Los espacios se convierten en +
            Los caracteres especiales se convierten en valores ASCII HEX
        2 - multipart/form-data
            Los datos no son codificados y se envian como están
            Es necesario cuando el formulario incluye elementos <input type="file"> para enviar archivos
            Permite enviar archivos
        3 - text/plain
            Los datos se envían sin ningún tipo de codificación
            Raramente se usa
     -->
    <form action="validar.php" method="POST" enctype="multipart/form-data">
         <!-- Elemento mensajeError -->
         <div class="alert alert-danger d-none" id="mensajeError" role="alert">
        </div>

            <div class="form-group">
                <label for="nombre">Nombre*</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calle y ciudad">
            </div>
            <div class="form-group">
                <label for="correo">Dirección de correo*</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
                <small id="emailHelp" class="form-text text-muted">Nunca compartas tu correo con nadie</small>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña*</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
            <div class="form-group">
                <label for="fecha">Antiguedad*</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <p>Elige el color</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="eligeColor" id="eligeRojo" value="Rojo">
                <label class="form-check-label" for="eligeRojo">
                  Rojo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="eligeColor" id="eligeAzul" value="Azul">
                <label class="form-check-label" for="eligeAzul">
                  Azúl
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="eligeColor" id="eligeVerde" value="Verde">
                <label class="form-check-label" for="eligeVerde">
                  Verde
                </label>
            </div>


            <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea class="form-control" id="comentarios" name="comentarios" rows="4"></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="aceptoPoliticas" required>
                <label class="form-check-label" for="aceptoPoliticas">Acepto las políticas de privacidad*</label>
            </div>
            <div class="alert alert-danger oculto" id="mensajeError" role="alert">
                Error
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-success">Limpiar formulario</button>
            <p>Los campos con asterisco * son obligatorios</p>
    </form>
</div>
    <script src="funciones.js"></script>
     <!-------------------Archivos de bootstrap js----------------------------->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>