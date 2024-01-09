<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreCompleto = $_POST["nombreCompleto"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    // Calcular la edad a partir de la fecha de nacimiento
    $fechaNacimientoObj = new DateTime($fechaNacimiento);
    $hoy = new DateTime();
    $edad = $hoy->diff($fechaNacimientoObj)->y;

    // Crear una fila de datos separada por comas
    $lineaDatos = "$nombreCompleto, $fechaNacimiento, $direccion, $telefono, $edad";

    // URL del archivo CSV en línea vinculado a Google Sheets
    $urlArchivoCSV = "https://docs.google.com/spreadsheets/d/1tgpmj4zpEcdHLGtMlAHjMwWSjtInBs1vTX1AcsE4GN8/gviz/tq?tqx=out:csv";

    // Enviar los datos al archivo CSV usando cURL
    $ch = curl_init($urlArchivoCSV);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['entry' => $lineaDatos]));
    $response = curl_exec($ch);
    curl_close($ch);

    // Verificar la respuesta de Google Sheets
    if ($response === "ok") {
        echo "Datos enviados correctamente.";
    } else {
        echo "Error al enviar los datos al archivo.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Formulario</title>
</head>

<body>

    <div class="container mt-5">
        <h2>Jóvenes Shadday</h2>
        <form action="form.php" method="post">
            <div class="form-group">
                <label for="nombreCompleto">Nombre Completo:</label>
                <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" required>
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>