<?php
// Usando método GET en lugar de POST
if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];
    
    if (is_numeric($numero) && $numero >= 0) {
        $binario = decbin((int)$numero);
        echo "El número $numero en binario es: $binario";
    }
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de entero a binario</title>
    <link rel="stylesheet" href="EnteroBinario.css">
</head>
<body>
 <div class="contenedor">
        <h1>Conversor de entero a binario</h1>
        <form method="post" action="">
            <label for="numero">Ingrese un numero entero para transformarlo en binario:</label><br>
            <input type="number" id="ente" name="ente" required>
            <button type="submit">Generar</button>
        </form>

        <?php if ($acronimo): ?>
            <p><?php echo $acronimo; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>