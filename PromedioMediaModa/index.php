<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular Media, Mediana y Moda</title>
    <link rel="stylesheet" href="style.CSS">
</head>
<body>

<!-- Formulario para ingresar la cantidad de números -->
<form action="index.php" method="post">
    <p>Cantidad de números:</p>
    <input type="text" name="txtcant">
    <button type="submit" name="btnCantidad">Ingresar Números</button>
</form>

<?php 
// Si el usuario ya ingresó la cantidad, mostrar los campos para ingresar los números
if (isset($_POST["btnCantidad"]) && isset($_POST["txtcant"])) {
    $cant = intval($_POST["txtcant"]);
    if ($cant > 0) {
        ?>
        <form method="post">
            <input type="hidden" name="txtcant" value="<?php echo $cant; ?>">
            <?php
            for ($i = 1; $i <= $cant; $i++) {
                ?>
                <p>Número <?php echo $i; ?>:
                    <input type="text" name="txtNum<?php echo $i; ?>">
                </p>
                <?php
            }
            ?>
            <button type="submit" name="btnCalcular">Calcular</button>
        </form>
        <?php
    } else {
        echo "<p>Cantidad no válida.</p>";
    }
}

// Si el usuario ya ingresó los números, calcular el promedio
if (isset($_POST["btnCalcular"]) && isset($_POST["txtcant"])) {
    $cant = intval($_POST["txtcant"]);
    $numeros = [];

    // Recolectar números válidos
    for ($j = 1; $j <= $cant; $j++) {
        if (isset($_POST["txtNum".$j]) && is_numeric($_POST["txtNum".$j])) {
            $numeros[] = floatval($_POST["txtNum".$j]);
        }
    }

    if (count($numeros) === $cant && $cant > 0) {
        // Calcular promedio
        $suma = array_sum($numeros);
        $promedio = $suma / $cant;
        echo "<p><strong>El promedio es:</strong> " . $promedio . "</p>";
    } else {
        echo "<p>Por favor ingrese todos los números correctamente.</p>";
    }
}
?>

</body>
</html>

