<?php
// Establece la conexión a la base de datos
$host = "http://38.7.30.178/"; // Por ejemplo, localhost
$dbname = "censo_jovenes";
$username = "postgres";
$password = "Jefazo2024";

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname;user=$username;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica si la solicitud es de tipo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtén los datos del formulario
        $nombreCompleto = $_POST["nombreCompleto"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];

        // Calcular la edad a partir de la fecha de nacimiento
        $fechaNacimientoObj = new DateTime($fechaNacimiento);
        $hoy = new DateTime();
        $edad = $hoy->diff($fechaNacimientoObj)->y;

        // Prepara la consulta SQL para la inserción
        $sql = "INSERT INTO jovenes (nombre, fecha_nacimiento, edad, direccion, numero_telefono) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Ejecuta la consulta con los parámetros
        $stmt->execute([$nombreCompleto, $fechaNacimiento, $edad, $direccion, $telefono]);

        echo "Datos almacenados correctamente en la base de datos.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cierra la conexión a la base de datos
$conn = null;
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
        <h2>Censo Jóvenes de Santidad</h2>
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