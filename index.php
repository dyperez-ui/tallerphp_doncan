<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular Media Mediana Moda</title>
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
    <form action="prom.php" method="post">
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
