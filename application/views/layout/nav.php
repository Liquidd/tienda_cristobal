<section class="header-main shadow-sm">
		<div class="container">
	    <div class="row-sm align-items-center">
        <div class="col-lg-4-24 col-sm-3">
          <div class="category-wrap dropdown py-1">
            <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-bars"></i> Categorias </button>
              <div class="dropdown-menu">
				<?php foreach($categoria as $value){?>
                	<a class="dropdown-item" onClick="buscar_categoria('<?php echo $value['id_categoria'];?>')"><?php echo $value['nombre'];?></a>
				<?php }?>
              </div>
            </div>
          </div>
		    	<div class="col-lg-11-24 col-sm-8">
						<form action="#" class="py-1">
							<div class="input-group w-100">
								<input type="text" class="form-control" style="width:50%;" id="nombre_buscar" placeholder="Ingresa el Nombre a Buscar">
								<div class="input-group-append">
								<button type="button" class="btn btn-primary" type="submit"  onClick="buscar_producto()">
									<i class="fa fa-search"></i> Buscarr
								</button>
								</div>
							</div>
						</form> <!-- search-wrap .end// -->
						</div> <!-- col.// -->
						<div class="col-lg-9-24 col-sm-12 col-12  order-2  order-lg-4">
							<div class="d-flex justify-content-end">
								<div class="widget-header">
									<small class="title text-muted">Hola <?= $nombre ?></small>
									<div> 
									<a href="<?php echo base_url();?>login/logout"> Salir </a> <span class="dark-transp"> | </span>
									<a href="<?php echo base_url();?>perfil"> Configuracion </a></div>
								</div>
								<a href="<?php echo base_url();?>productos/carrito_ventas" class="widget-header border-left pl-3 ml-3">
									<div class="icontext">
										<div class="icon-wrap icon-sm round border">
											<i href="<?php echo base_url();?>productos/carrito_ventas" class="fa fa-shopping-cart"></i>
										</div>
									</div>
									<span id="item_cont" class="badge badge-pill badge-danger notify cn_carrito">0</span>
								</a>
								<a href="" class="widget-header border-left pl-3 ml-3">
									<div class="icontext">
										<div class="icon-wrap icon-sm round border">
											<i class="fa fa-heart"></i>
										</div>
									</div>
									<span class="badge badge-pill badge-danger notify">0</span>
								</a>
						</div> <!-- widgets-wrap.// -->
					</div> <!-- col.// -->
				</div> <!-- col.// -->
			</div> <!-- row.// -->
		</div> <!-- container.// -->
	</section> <!-- header-main .// -->

	