<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular Media Mediana Moda</title>
    <link rel="stylesheet" href="STYLE.CSS">
</head>
<body>
<form action="index.php" method="post">
    <p>Cantidad de numeros</p>
    <input type="text" name="txtcant">
    <button type="submit">Ingresar Numeros</button>
</form>

<?php 
if ($_POST && isset($_POST["txtcant"])) {
    $cant = intval($_POST["txtcant"]);
    $i = 1;
    ?>
    <form  method="post">
    <input type="hidden" name="txtcant" value="<?php echo $cant; ?>">
    <?php
    while ($i <= $cant) {
        ?>
       <p>Numero <?php echo $i; ?>
       <input type="text" name="txtNum<?php echo $i; ?>"></p> 
        <?php
        $i++;
    }
    ?>
    <button type="submit">Calcular</button>
</form>
<?php
}
?>

<!--Calcular promedio
<?php 
if($_POST && isset($_POST["txtcant"])){
    $cant = intval($_POST["txtcant"]);
    $j = 1;
    $suma = 0;
 
    if ($cant > 0) {
        while($j <= $cant){
            if (isset($_POST["txtNum".$j]) && is_numeric($_POST["txtNum".$j])) {
                $suma += $_POST["txtNum".$j];
            }
            $j++;
        }

        $prom = $suma / $cant;
        echo "EL promedio es: ". $prom;
    } else {
        echo "Cantidad no válida.";
    }

}else{
    echo "NO Permitido";
}

?>