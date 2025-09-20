<?php
$acronimo = '';

if (!empty($_POST['frase'])) {
    $palabras = preg_split('/\s+/', trim(preg_replace('/[^a-zA-Z\s-]/', '', $_POST['frase'])));
    
    foreach ($palabras as $palabra) {
        if (!empty($palabra)) {
            $acronimo .= $palabra[0];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Acrónimos</title>
    <link rel="stylesheet" href="Acronimo.css">
</head>
<body>
    <div class="contenedor">
        <h1>Generador de Acrónimos</h1>
        <form method="post" action="">
            <label for="frase">Ingrese una frase:</label><br>
            <input type="text" id="frase" name="frase" required>
            <button type="submit">Generar</button>
        </form>

        <?php if ($acronimo): ?>
            <p><?php echo $acronimo; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>