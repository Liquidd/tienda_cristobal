<title> GA | Carrito </title>
<section class="section-content bg padding-y">
	<div class="container">
		<div class="row">
			<main class="col-sm-9">
				<div class="card">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Producto</th>
									<th>Precio</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
							<?php if($this->cart->contents()){foreach($carrito_productos as $value){?>
							<tr>
								<td>
									<figure class="media">
										<div class="img-wrap"><img class="img-thumbnail img-sm" src="<?php echo $value['foto'];?>"></div>
										<figcaption class="media-body">
												<h6 class="title text-truncate"><?php echo $value['name'];?></h6>
												<dl class="dlist-inline small">
												<dt class="text-success">Disponible</dt>
											</dl>
											<a href="" class="eliminar_producto" id="<?php echo $value['rowid'];?>">Eliminar del Carrito</a>
											<a href="" class="border-left pl-2 ml-2">Guardar Favorito</a>
										</figcaption>
									</figure> 
								</td>
								<td>
									<div class="form-group col-md-6">
										<label class="text-right h5 b"><?php echo $value['price'];?></label>
									</div>
								</td>
								<td> 
									<select class="form-control cantidad" name="cantidad" id="<?php echo $value['rowid'];?>">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								</td>
							</tr>
							<?php }}else {
								echo "<div class='alert alert-warning' role='alert'>El carrito de compras se encuentra vacio</div>";
							}?>
						</tbody>
					</table>
				</div> <!-- card.// -->
			</main> <!-- col.// -->
			<aside class="col-sm-3">
				<dl class="dlist-align h4">
					<dt>Total :</dt>
					<dd class="text-right" id="total">
						<?php echo "$".$this->cart->total();?>
					</dd>
				</dl>
				<hr>
				<button type="button" class="btn btn-lg btn-success" onClick="carrito_contenido()">Confirmar Pago</button>
			</aside> <!-- col.// -->
		</div>
	</div> <!-- container .//  -->
</section>
