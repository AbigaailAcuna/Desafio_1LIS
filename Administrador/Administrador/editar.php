<?php
       
		$productos = simplexml_load_file("productos.xml");
		foreach($productos->producto as $pro){
				$pro->codigo = $_POST['codigo'];
				$pro->nombre = $_POST['nombre'];
				$pro->descripcion = $_POST['descripcion'];
				$pro->img = $_POST['img'];
                $pro->categoria = $_POST['categoria'];
                $pro->precio = $_POST['precio'];
                $pro->existencias = $_POST['existencias'];
				break;
			
        }
 
		file_put_contents("productos.xml", $productos->asXML());
		header('location: index.php');
	
 
?>