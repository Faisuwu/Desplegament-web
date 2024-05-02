<?php

require_once('Connexio.php');

// Verificar l'enviament
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenir les dades
    $nom = $_POST['nom'];
    $descripcio = $_POST['descripcio'];
    $preu = $_POST['preu'];
    $categoria = $_POST['categoria'];

    // Crear una instancia
    $connexio = new Connexio();
    $conn = $connexio->obtenirConnexio();

    // Preparar la consulta SQL
    $consulta = "INSERT INTO productes (nom, descripció, preu, categoria_id) VALUES ('$nom', '$descripcio', '$preu', '$categoria')";

    // Executar la consulta
    if ($conn->query($consulta) === TRUE) {
        // Redirigir a la pàgina principal
        header('Location: Principal.php');
        exit();
    } else {
        // Missatge d'error
        echo "Error al afegir el producte: " . $conn->error;
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
    <title>Afegir nou producte</title>
</head>
<body>
<h2>Afegir nous productes</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom" required><br><br>
    <label for="descripcio">Descripció:</label><br>
    <input type="text" id="descripcio" name="descripcio" required><br><br>
    <label for="preu">Preu:</label><br>
    <input type="number" id="preu" name="preu" required><br><br>
    <label for="categoria">Categoría:</label><br>
    <input type="text" id="categoria" name="categoria" required><br><br>
    <input type="submit" value="Afegir Producte">
</form>
</body>
</html>