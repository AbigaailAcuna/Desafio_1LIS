<?php

//volver a cargar el contenido del xml
$productos=simplexml_load_file("productos.xml");
$producto=$productos->addChild('producto');
$producto->addChild('codigo', $_POST['codigo']);
$producto->addChild('nombre', $_POST['nombre']);
$producto->addChild('descripcion', $_POST['descripcion']);
$producto->addChild('img', $_POST['img']);
$producto->addChild('categoria', $_POST['categoria']);
$producto->addChild('precio', $_POST['precio']);
$producto->addChild('existencias', $_POST['existencias']);

//que genere el xml
file_put_contents("productos.xml",$productos->asXML());
//redirecion
header('location:index.php');


?>