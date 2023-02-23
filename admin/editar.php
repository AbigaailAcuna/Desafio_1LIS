<?php
		
		if(isset($_POST['editar'])){
		$productos = simplexml_load_file("../xml/productos.xml");
		foreach($productos->producto as $pro){
			if($pro->codigo == $_POST['codigo']){
			//$pro->codigo = ($_POST['codigo']);
			$pro->nombre = validarCampoRequerido($_POST['nombre']);
			$pro->descripcion =validarCampoRequerido($_POST['descripcion']);
			$pro->img = validarImagen($_POST['img']);
            $pro->categoria = validarCategoria($_POST['categoria']);
            $pro->precio = validarNum($_POST['precio']);
            $pro->existencias = validarNum($_POST['existencias']);
			break;
			
        }
	}
		file_put_contents("../xml/productos.xml", $productos->asXML());
		header('location: index.php');
}
		


	
	//funciones para validar
	//valida número positivo
	function validarNum($variable){
		if(is_numeric($variable)){
			if($variable > 0){
				return $variable;
			} else {
				echo "<div class='alert alert-danger'>Error con datos ingresados</div>";
				header('location:index.php');
				exit(0);
			}

		} else {
			echo '<script>alert(No ha ingresado valor numerico);</script>';
			header('location:index.php');
			exit(0);
		}
	}

	//valida no vacío
	function validarCampoRequerido($variable){
		if($variable!=""){
			return $variable;
		} else {
			echo '<script>alert(El campo es requerido);</script>';
			header('location:index.php');
			exit(0);
		}
	}

	//que se seleccione textil o poromocional nada más
	function validarCategoria($variable) {

		if($variable == 'Textil' || $variable == 'Promocional'){
			return $variable;
		} else {
			echo '<script>alert(El campo debe ser \'Textil\' o \'Promocional\');</script>';
			header('location:index.php');
			exit(0);
		}
	}

	//solo los formatos permitidos
	function validarImagen($variable){
		$formato = substr($variable, -4);
		if($formato == '.jpg' || $formato == '.png'){
			return $variable;
		} else {
			header('location:index.php');
			exit(0);
		}
	}
	//que cumpla la forma del código
	function validarCodigo($variable) {
		//$prod = substr($variable, 0, 4);
	// $num = substr($variable, -5);
	$regular='/^PROD[0-9]{5}$/';

		if(preg_match($regular,$variable)){
			$productos=simplexml_load_file("../xml/productos.xml");

			foreach($productos->producto as $pro){
				if($variable == $pro->codigo){
					header('location:index.php');
					exit(0);
				}
			}

			return $variable;
		} else {
			header('location:index.php');
			exit(0);
		}
	}

?>