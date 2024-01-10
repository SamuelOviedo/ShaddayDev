// Establece la conexión a la base de datos
$host = "http://38.7.30.178/"; // Por ejemplo, localhost
$dbname = "censo_jovenes";
$username = "postgres";
$password = "Jefazo2024";

try {
$conn = new PDO("pgsql:host=$host;dbname=$dbname;user=$username;password=$password");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}