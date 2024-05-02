<?php

require_once('Connexio.php');

// Verifica si se ha enviat
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenir id
    $id = $_POST['id'];

    // Crear una instancia
    $connexio = new Connexio();
    $conn = $connexio->obtenirConnexio();

    // Preparar la consulta SQL
    $consulta = "DELETE FROM productes WHERE id='$id'";

    // Executar la consulta
    if ($conn->query($consulta) === TRUE) {
        // Redirigir a la pàgina principal
        header('Location: Principal.php');
        exit();
    } else {
        // Missatge d'error
        echo "Error al eliminar el producte: " . $conn->error;
    }

    // Tancar conexió
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producte</title>
</head>
<body>
<h2>Eliminar Producte</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="id">ID del Producte a Eliminar:</label><br>
    <input type="text" id="id" name="id" required><br><br>
    <input type="submit" value="Eliminar Producte">
</form>
</body>
</html>