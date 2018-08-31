<div id="modal_id" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="actualizar_form">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Modelo</label>
                            <input id="modelo_modal" type="text" placeholder="Ingrese el Nombre"
                            class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Marca</label>
                            <input id="marca_modal" type="text" placeholder="Ingrese la Marca" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="precio_modal">Precio</label>
                            <input type="number" id="precio_modal" class="form-control" min="0">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_categoria_modal">Categorias</label>
                            <select id="id_categoria_modal" class="form-control ">
                                <option value="0">Selecciona Categoria</option>
                                <!-- se cargan datos json -->

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_subcategoria_modal">Subcategoria</label>
                            <select id="id_subcategoria_modal" class="form-control">
                                <option value="0">Selecciona Subcategoria</option>
                                <!-- se cargan datos json -->


                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cantidad_modal">cantidad</label>
                            <input type="number" id="cantidad_modal" class="form-control" min="0" max="0">
                        </div>
                        <div class="form-group col-md-6">
                            <label id="label_foto" for="file_modal">Foto Archivo</label>
                            <input type="file" id="file_modal" class="form-control" accept="image/.jpg,.png">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_promocion_modal">Promociones</label>
                            <select id="id_promocion_modal" class="form-control">
                                <option value="1">Selecciona Promocion</option>
                                <!-- se cargan datos json -->

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="descripcion_modal">Descripcion Del Producto</label>
                            <textarea class="form-control" id="descripcion_modal" rows="6"></textarea>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type='button' class='btn btn-default' data-dismiss='modal'>CERRAR</button>
                    <button type="button" class="btn btn-success btn_guardar" id="" onClick="nuevo_producto()">GUARDAR</button>
                    <button type="button" class="btn btn-info btn_editar" id="0" onClick="actualizar_producto(this.id)">ACTUALIZAR</button>
                </div>
            </div>
        </div>
    </div>   
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action btn-light">Configuracion</a>
              <a href="#tab_a" data-toggle="pill" class="list-group-item list-group-item-action">Informacion Peronsal</a>
              <a href="#tab_b" data-toggle="pill" id="historial" class="list-group-item list-group-item-action">Historial</a>
              <a href="#tab_c" data-toggle="pill" id="alta" class="list-group-item list-group-item-action">Alta de Productos</a>
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
                    <div class="row">
                        <div class="tab-content">
                            <div class="tab-pane active editar" id="tab_a">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <h4><?= $nombre ?></h4>
                                                    <hr>
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form>
                                                        <div class="form-group row">
                                                            <label for="name" class="col-4 col-form-label">Apellido Paterno</label> 
                                                            <div class="col-12">
                                                            <input id="name" name="name" placeholder="Apellido Paterno" class="form-control here" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lastname" class="col-4 col-form-label">Apellido Materno</label> 
                                                            <div class="col-12">
                                                            <input id="lastname" name="lastname" placeholder="Apellido Materno" class="form-control here" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="email" class="col-4 col-form-label">Correo Electronico</label> 
                                                            <div class="col-12">
                                                            <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="telefono" class="col-4 col-form-label">Numero de Telefono</label> 
                                                            <div class="col-12">
                                                            <input id="telefono" name="" placeholder="Numero de Telefono" class="form-control here" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="direccion" class="col-4 col-form-label">New Password</label> 
                                                            <div class="col-12">
                                                            <input id="direccion" name="" placeholder="direccion" class="form-control here" type="text">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>	            
                                    </div>
                                </div>                   
                            </div>
                            <div class="tab-pane" id="tab_b">
                                    <div class="col-md-12">
                                    <div class="box">
                                        <dl class="">
                                            <dt>Nombre de Usuario: </dt>
                                            <dd class="text-right"><?= $nombre ?></dd>
                                        </dl>
                                        <dl class="">
                                            <dt>Puntos:</dt>
                                            <dd class="text-right"><?= $puntos ?></dd>
                                        </dl>
                                    </div> <!-- box.// -->

                                    <table class="table table-list-search" id="table_historial">
                                            <thead>
                                                <tr>
                                                    <th>Modelo</th>
                                                    <th>Marca</th>
                                                    <th>Descripcion</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad Commprada</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_historial">
                                                <tr>

                                                </tr>
                                        </tbody>
                                    </table>   
                                    </div>                     
                            </div>
                            <div class="tab-pane" id="tab_c">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form>
                                                <div class="input-group">
                                                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-light"><i class="fas fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-8">
                                            <button type="button" class="btn btn-primary float-right guardarM" data-toggle="modal" data-target="#modal_id">Nuevo Producto</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-list-search" id="table_productos">
                                                <thead>
                                                    <tr>
                                                        <th>Foto</th>
                                                        <th>Modelo</th>
                                                        <th>Marca</th>
                                                        <th>Categoria</th>
                                                        <th>Subcategoria</th>
                                                        <th>Precio</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_datos">
                                                    <tr>

                                                    </tr>
                                                </tbody>
                                            </table>   
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
		</div>
	</div>
</div>
