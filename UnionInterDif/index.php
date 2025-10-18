<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones con Conjuntos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Operaciones con Conjuntos (A y B)</h2>

    <form method="post">
        <label for="conjuntoA">Conjunto A (números separados por comas):</label><br>
        <input type="text" name="conjuntoA" id="conjuntoA" required><br><br>

        <label for="conjuntoB">Conjunto B (números separados por comas):</label><br>
        <input type="text" name="conjuntoB" id="conjuntoB" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Convertir las entradas a arrays de enteros
        $A = array_map('intval', explode(",", $_POST["conjuntoA"]));
        $B = array_map('intval', explode(",", $_POST["conjuntoB"]));

        // Eliminar duplicados
        $A = array_unique($A);
        $B = array_unique($B);

        // Unión (A ∪ B)
        $union = array_unique(array_merge($A, $B));

        // Intersección (A ∩ B)
        $interseccion = array_intersect($A, $B);

        // Diferencia (A - B)
        $diferenciaAB = array_diff($A, $B);

        // Diferencia (B - A)
        $diferenciaBA = array_diff($B, $A);

        // Mostrar resultados
        echo "<h3>Resultados:</h3>";
        echo "A = {" . implode(", ", $A) . "}<br>";
        echo "B = {" . implode(", ", $B) . "}<br><br>";

        echo "Unión (A ∪ B): {" . implode(", ", $union) . "}<br>";
        echo "Intersección (A ∩ B): {" . implode(", ", $interseccion) . "}<br>";
        echo "Diferencia (A - B): {" . implode(", ", $diferenciaAB) . "}<br>";
        echo "Diferencia (B - A): {" . implode(", ", $diferenciaBA) . "}<br>";
    }
    ?>
</body>
</html>