<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba PHP con Bootstrap</title>
    <!-- Incluimos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Prueba PHP con Bootstrap</h1>
        <div class="row">
            <div class="col-md-6">
                <?php
                // Este es un archivo de prueba PHP

                // Definimos algunas variables
                $nombre = "Juan";
                $edad = 25;

                // Imprimimos un mensaje usando las variables
                echo "<p>Hola, mi nombre es $nombre y tengo $edad años.</p>";

                // Realizamos una operación matemática simple
                $numero1 = 10;
                $numero2 = 5;
                $suma = $numero1 + $numero2;
                echo "<p>La suma de $numero1 y $numero2 es $suma.</p>";

                // Aquí puedes agregar más código para probar diferentes funcionalidades de PHP
                ?>
            </div>
        </div>
    </div>

    <!-- Incluimos el script de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>