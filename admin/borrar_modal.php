<!-- Eliminar -->
<div class="modal fade" id="delete_<?php echo $pro->codigo; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Eliminar producto</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Esta seguro que deseas borrar el producto seleccionado?</p>
				<h2 class="text-center"><?=$pro->nombre?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                <a href="eliminar.php?codigo=<?=$pro->codigo?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
            </div>
 
        </div>
    </div>
</div>
