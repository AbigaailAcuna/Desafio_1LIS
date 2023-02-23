<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Administrador</h1>
    <div class="row">
        <div class="">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar Producto</a>
            <a href="../public/productos.php" class="btn btn-primary"></span> Regresar</a>
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                    <th style="width:120px">Opciones de Administrador</th>
                    
                    
                </thead>
                <tbody>
                    <?php
                    //leemos contenido del xml
                    $productos=simplexml_load_file("../xml/productos.xml");
                    foreach($productos->producto as $pro) {
                       
                        ?>
                        <tr>
                            <td><?=$pro->codigo ?></td>
                            <td><?=$pro->nombre ?></td>
                            <td><?=$pro->descripcion ?></td>
                            <td>
                            <img width="100px" src="<?=$pro->img ?>">
                            </td>
                            <td><?=$pro->categoria ?></td>
                            <td><?=$pro->precio ?></td>
                            <td><?=$pro->existencias ?></td>
                            <td><a href="#editar_<?=$pro->codigo?>" data-toggle="modal" class="btn btn-primary" name="editar"><span class="glyphicon glyphicon-edit"></a>
                            <a href="#delete_<?=$pro->codigo?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                            


                       </tr>
                        <?php

                        include('borrar_modal.php');
                        include('editarmodal.php');


                    }

                   ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('nueva_modal.php'); ?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>