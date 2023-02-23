<?php

//validarCampoRequerido(null);
//validarNum(-1);
//validarCategoria("Promocional");

//volver a cargar el contenido del xml
$productos=simplexml_load_file("productos.xml");
$producto=$productos->addChild('producto');
$producto->addChild('codigo', validarCodigo($_POST['codigo']));
$producto->addChild('nombre', validarCampoRequerido($_POST['nombre']));
$producto->addChild('descripcion', validarCampoRequerido($_POST['descripcion']));
$producto->addChild('img',validarImagen($_POST['img']));
$producto->addChild('categoria', validarCategoria($_POST['categoria']));
$producto->addChild('precio', validarNum($_POST['precio']));
$producto->addChild('existencias', validarNum($_POST['existencias']));

//que genere el xml
file_put_contents("productos.xml",$productos->asXML());
//redirecion
header('location:index.php');
//funciones para validar

//valida número positivo
function validarNum($variable){

    if(is_numeric($variable)){
        if($variable > 0){
            return $variable;
        } else {
            echo "<div class='alert alert-danger'>Error con el envío de información</div>";
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
    if(isset($variable)){
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
        return 'img/' . $variable;
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
        $productos=simplexml_load_file("productos.xml");
        //que sea único
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