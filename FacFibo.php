<?php
function Fibonacci($numero) {
    $serie = [0, 1]; 

    for ($i = 2; $i <= $numero; $i++) {
        $serie[$i] = $serie[$i - 1] + $serie[$i - 2];
    }

    return implode(", ", $serie);
}

function Factorial($numero) {
    $resultado = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $resultado *= $i;
    }
    return $resultado;
}

$resultado = "";
$titulo = "";

if (isset($_POST["numo"]) && isset($_POST["operacion"])) {
    $numero = (int) $_POST["numero"];
    $operacion = $_POST["operacion"];

    if ($operacion == "fibonacci") {
        $resultado = Fibonacci($numero);
        $titulo = "Sucesión de Fibonacci hasta $numero = ";
    } elseif ($operacion == "factorial") {
        $resultado = Factorial($numero);
        $titulo = "Factorial de $numero = ";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Fibonacci y Factorial</title>
</head>
<body>
    <div class="contenedor">
        <h1>Calculadora Fibonacci y Factorial</h1>
        
        <form action="" method="POST">
            <label for="numero">Ingresa un número:</label>
            <input type="number" id="numero" name="numero" placeholder="Ej: 10" >

            <label for="operacion">Selecciona la operación:</label>
            <select id="operacion" name="operacion" >
                <option value="">-- Elige una opcion --</option>
                <option value="fibonacci">Sucesión de Fibonacci</option>
                <option value="factorial">Factorial</option>
            </select>

            <button type="submit">Calcular</button>
        </form>

        <?php
        
        if ($resultado){
          echo $titulo;
          echo $resultado;
            
        }?>
          
        
    </div>
</body>
</html>
