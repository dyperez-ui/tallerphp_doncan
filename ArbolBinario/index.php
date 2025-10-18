<?php
function construirArbolPreIn($preorden, $inorden){
    if(!$preorden || !$inorden) return;

    $raiz = $preorden[0];
    $pos = array_search($raiz, $inorden);
    if($pos === false) return;

    $izq = array_slice($inorden,0,$pos);
    $der = array_slice($inorden,$pos+1);

    $preIzq = array_slice($preorden,1,count($izq));
    $preDer = array_slice($preorden,1+count($izq));

    return ["valor"=>$raiz,"izquierda"=>construirArbolPreIn($preIzq,$izq),"derecha"=>construirArbolPreIn($preDer,$der)];
}

function construirArbolPostIn($postorden, $inorden){
    if(!$postorden || !$inorden) return;

    $raiz = $postorden[count($postorden)-1];
    $pos = array_search($raiz, $inorden);
    if($pos === false) return;

    $izq = array_slice($inorden,0,$pos);
    $der = array_slice($inorden,$pos+1);

    $postorden = array_slice($postorden,0,count($postorden)-1);
    $postIzq = array_slice($postorden,0,count($izq));
    $postDer = array_slice($postorden,count($izq));

    return ["valor"=>$raiz,"izquierda"=>construirArbolPostIn($postIzq,$izq),"derecha"=>construirArbolPostIn($postDer,$der)];
}

function construirArbolPrePost($preorden, $postorden){
    if(!$preorden || !$postorden) return;

    $raiz = $preorden[0];
    if(count($preorden) == 1) return ["valor"=>$raiz,"izquierda"=>null,"derecha"=>null];

    // Encontrar la raíz del subárbol izquierdo
    $izqRaiz = $preorden[1];
    $pos = array_search($izqRaiz, $postorden);
    if($pos === false) return ["valor"=>$raiz,"izquierda"=>null,"derecha"=>null];

    $postIzq = array_slice($postorden,0,$pos+1);
    $postDer = array_slice($postorden,$pos+1,count($postorden)-$pos-1);

    $preIzq = array_slice($preorden,1,count($postIzq));
    $preDer = array_slice($preorden,1+count($postIzq));

    return [
        "valor"=>$raiz,
        "izquierda"=>construirArbolPrePost($preIzq,$postIzq),
        "derecha"=>construirArbolPrePost($preDer,$postDer)
    ];
}

function mostrarArbolTexto($nodoActual, $nivel=0){
    if(!$nodoActual) return;
    if($nodoActual["izquierda"]) mostrarArbolTexto($nodoActual["izquierda"], $nivel+1);
    echo str_repeat("--", $nivel) . $nodoActual["valor"] . "<br>";
    if($nodoActual["derecha"]) mostrarArbolTexto($nodoActual["derecha"], $nivel+1);
}

$opcion = $_POST["opc"] ?? "";
$preorden = !empty($_POST["preord"]) ? explode(" ",$_POST["preord"]) : [];
$inorden = !empty($_POST["inor"]) ? explode(" ",$_POST["inor"]) : [];
$postorden = !empty($_POST["postord"]) ? explode(" ",$_POST["postord"]) : [];

$arbol = null;

// Verificar mínimo dos recorridos
$recorridos = 0;
if($preorden) $recorridos++;
if($inorden) $recorridos++;
if($postorden) $recorridos++;

if($recorridos < 2){
    $mensaje = "Debes ingresar al menos dos recorridos.";
} else {
    if($opcion=="pre_in" && $preorden && $inorden){
        $arbol = construirArbolPreIn($preorden,$inorden);
    } else if($opcion=="post_in" && $postorden && $inorden){
        $arbol = construirArbolPostIn($postorden,$inorden);
    } else if($opcion=="pre_post" && $preorden && $postorden){
        $arbol = construirArbolPrePost($preorden,$postorden);
    } else if($preorden && $inorden && $postorden){ 
        $arbol = construirArbolPreIn($preorden,$inorden);
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="arbolbinario.css">
</head>
<body>
<h3>Arbolito Binario</h3>
<form method="post">
  <select name="opc">
    <option value="pre_in" <?= $opcion=="pre_in"?"selected":"" ?>>pre+in</option>
    <option value="post_in" <?= $opcion=="post_in"?"selected":"" ?>>post+in</option>
    <option value="pre_post" <?= $opcion=="pre_post"?"selected":"" ?>>pre+post</option>
  </select>
  <br>
preorden: <input name="preord" value="<?= $_POST['preord'] ?? '' ?>"><br>
inorden: <input name="inor" value="<?= $_POST['inor'] ?? '' ?>"><br>
postorden: <input name="postord" value="<?= $_POST['postord'] ?? '' ?>"><br>
<button>crear arbol</button>
</form>

<?php 
 if(!empty($arbol)){
   echo "arbol=  ";
   mostrarArbolTexto($arbol);
 } else if(isset($mensaje)){
   echo $mensaje;
 } else if($_POST){
   echo "te falto poner algo :(";
 }
?>
</body>
</html>
