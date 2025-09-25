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