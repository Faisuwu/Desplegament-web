<?php

require_once('Connexio.php');

/**
 * Verifica si la petició és un POST i processa les dades del formulari per afegir un nou producte.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obté les dades del formulari
    $nom = $_POST['nom']; /**< string El nom del producte */
    $descripcio = $_POST['descripcio']; /**< string La descripció del producte */
    $preu = $_POST['preu']; /**< float El preu del producte */
    $categoria = $_POST['categoria']; /**< string La categoria del producte */

    // Crea una instància de la classe Connexio
    $connexio = new Connexio();
    $conn = $connexio->obtenirConnexio(); /**< object La connexió a la base de dades */

    // Prepara la consulta SQL per afegir un nou producte
    $consulta = "INSERT INTO productes (nom, descripció, preu, categoria_id) VALUES ('$nom', '$descripcio', '$preu', '$categoria')";

    // Executa la consulta
    if ($conn->query($consulta) === TRUE) {
        // Redirigeix l'usuari a la pàgina principal després d'afegir el producte amb èxit
        header('Location: Principal.php');
        exit();
    } else {
        // Mostra un missatge d'error si hi ha hagut algun problema en afegir el producte
        echo "Error en afegir el producte: " . $conn->error;
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