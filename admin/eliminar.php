<?php

$cod=$_GET['codigo'];
$productos=simplexml_load_file("../xml/productos.xml");

$i=0;
$index=-1;

foreach($productos->producto as $pro) {
    if($cod==$pro->codigo){
        //le damos el valor de cero al que seleccionamos
        $index=$i;
        break;
    }
    $i++;
}
if($index>=0){
    //destruye las variables especificadas
    unset($productos->producto[$index]);

}
file_put_contents("../xml/productos.xml",$productos->asXML());
header('location:index.php');


?>