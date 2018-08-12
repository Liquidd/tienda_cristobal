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
                            <select id="id_categoria_modal" class="form-control">
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
                            <input type="number" id="cantidad_modal" class="form-control" min="0">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="archivo_modal">Foto Archivo</label>
                            <input type="file" id="archivo_modal" name="" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_promocion_modal">Promociones</label>
                            <select id="id_promocion_modal" class="form-control">
                                <option value="0">Selecciona Promocion</option>
                                <!-- se cargan datos json -->

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="descripcion modal">Descripcion Del Producto</label>
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
    <div class="tabs">
		<div class="row">
			<div class="col-md-2">
				<ul class="nav nav-pills nav-stacked flex-column">
					<li class="active"><a href="#tab_a" data-toggle="pill">TAB 1</a></li>
					<li><a href="#tab_b" data-toggle="pill">TAB 2</a></li>
					<li><a href="#tab_c" data-toggle="pill" id="alta">Alta de Productos</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<div class="tab-content">
				    <div class="tab-pane active editar" id="tab_a">
                        <h3>First tab with soft transitioning effect.</h3>
                        <p>American Builders Inc. is your full service general contractor. We have been helping 
                            clients throughout Eastern North Carolina with their construction needs since 1996.
                            We take pride in understanding our clients' needs, making their construction experience 
                            as worry free as possible and only delivering a finished product that will withstand the
                            test of time. </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod 
                            bibendum laoreet.</p>
					</div>
					<div class="tab-pane" id="tab_b">
						<h3>Second tab with soft transitioning effect.</h3>
						<p>We maintain a reputation for effective communication and collaboration between our 
							team and clients to minimize surprises and ensure precise project delivery. Lorem ipsum 
							dolor sit amet, consectetur adipiscing elit. Aenean euismod 
							bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra 
							justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque 
						penatibus et magnis dis parturient montes.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod 
						bibendum laoreet.</p>
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
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal_id">Nuevo Producto</button>
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
</div>
<style>
    .tabs{
    background-color:#f5f5f5;
    padding-top:30px;
    padding-bottom:30px;
    }
    .tabs .tab-pane{
    margin-left:20px;
    }

    .tabs h3{
    font-size:20px;
    margin-top:10px;
    margin-bottom:60px;
    }

    .tabs p{
    font-size:14px;
    }

    .tabs a{
    font-size:15px;
    font-family:OpenSans,sans-serif;
    font-weight:700;
    color:#fff;
    padding:30px;
    }

    .tabs li{
    background-color:#333;
    margin-top:1px;
    text-align:center;
    height:110px;
    width:110px;
    padding-top:45px;
    -webkit-border-radius:3px;
    border-radius:3px;
    }

    .tabs li.active{
    background-color:#ff8b38;
    }
</style>
<script>
    $(function() {
	    var $a = $(".tabs li");
	    $a.click(function() {
		    $a.removeClass("active");
		    $(this).addClass("active");
	    });
    });
    $(document).ready(function() {

        var activeSystemClass = $('.list-group-item.active');

        //something is entered in search form
        $('#system-search').keyup( function() {
        var that = this;
            // affect all table rows on in systems table
            var tableBody = $('.table-list-search tbody');
            var tableRowsClass = $('.table-list-search tbody tr');
            $('.search-sf').remove();
            tableRowsClass.each( function(i, val) {
            
                //Lower text for case insensitive
                var rowText = $(val).text().toLowerCase();
                var inputText = $(that).val().toLowerCase();
                if(inputText == ''){
                    $('.search-query-sf').remove();
                }

                if( rowText.indexOf( inputText ) == -1 )
                {
                    //hide rows
                    tableRowsClass.eq(i).hide();
                    
                }
                else
                {
                    $('.search-sf').remove();
                    tableRowsClass.eq(i).show();
                }
            });
            //all tr elements are hidden
            if(tableRowsClass.children(':visible').length == 0)
            {
                tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
            }
        });
    });
</script>
