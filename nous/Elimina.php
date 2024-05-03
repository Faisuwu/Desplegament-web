<?php

require_once('Connexio.php');

/**
 * Verifica si s'ha enviat una sol·licitud POST i elimina un producte de la base de dades.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenir l'ID del producte a eliminar
    $id = $_POST['id']; /**< int L'ID del producte a eliminar */

    // Crea una instància de la classe Connexio
    $connexio = new Connexio();
    $conn = $connexio->obtenirConnexio(); /**< object La connexió a la base de dades */

    // Prepara la consulta SQL per eliminar el producte
    $consulta = "DELETE FROM productes WHERE id='$id'";

    // Executa la consulta
    if ($conn->query($consulta) === TRUE) {
        // Redirigeix l'usuari a la pàgina principal després d'eliminar el producte amb èxit
        header('Location: Principal.php');
        exit();
    } else {
        // Mostra un missatge d'error si hi ha hagut algun problema en eliminar el producte
        echo "Error en eliminar el producte: " . $conn->error;
    }

    // Tanca la connexió amb la base de dades
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