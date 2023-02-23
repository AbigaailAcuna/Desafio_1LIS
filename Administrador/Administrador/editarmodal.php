<div class="modal fade" id="editar_<?php echo $pro->codigo; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar Producto</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
				
			<form method="POST" action="editar.php">
				<div class="row form-group">
					<div class="col-sm-2">
                    
						<label class="control-label" style="position:relative; top:7px;">Código:</label>
					</div>
					<div class="col-sm-10">
                    
						<input type="text" class="form-control" name="codigo" value="<?php echo $pro->codigo; ?>" >
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" value="<?php echo $pro->nombre; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Descripción:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="descripcion" value="<?php echo $pro->descripcion; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Imagen:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="img" value="<?php echo $pro->img; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" for="categoria" >Categoría:</label>
					</div>
					<div class="col-sm-10">
                    <select name="categoria"  class="form-control" >
                        <option ><?php echo $pro->categoria; ?></option>
                        <option value="Promocional">Promocional</option>
                        <option value="Textil">Textil</option>
                     </select>
                </div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Precio:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="precio" value="<?php echo $pro->precio; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Existencias:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="existencias" value="<?php echo $pro->existencias; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="editar" class="btn btn-primary"><span class=""></span> Actualizar</a>
			</form>
            </div>
 
        </div>
    </div>
</div>
 