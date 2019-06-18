<div class="container">
    <button class="btn btn-outline-success" data-toggle="modal" data-target="#nuevo_producto">NUEVO PRODUCTO</button>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>MARCA</th>
                    <th>PRECIO</th>
                    <th>CATEGORIAS</th>
                    <th>SUBCATEGORIAS</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $value){?>
                    <tr>
                        <th><?php echo $value['modelo'];?></th>
                        <td><?php echo $value['marca'];?></td>
                        <td><?php echo $value['precio'];?></td>
                        <td><?php echo $value['categoria'];?></td>
                        <td><?php echo $value['subcategoria'];?></td>
                        <td>
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal"><i class="fas fa-sync"></i></button>
                            <?php if ($value["estado"] <= 0) {?>
                                <button type="button" class="btn btn-outline-danger" value='<?php echo $value['estado'];?>'>
                                    <i class="fas fa-trash"></i>
                                </button>
                            <?php } else{?>
                                <button type="button" class="btn btn-outline-success" value='<?php echo $value['estado'];?>'>
                                    <i class="fas fa-clipboard-check"></i>
                                </button>
                            <?php }?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal ACTUALIZAR -->
<div class="modal fade bd-example-modal-xl" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> NOMBRE DEL PRODUDCTO </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="producto_nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="producto_nombre" placeholder="Ingresa el Nombre">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="marca_producto">Marca del Producto</label>
                    <input type="text" class="form-control" id="marca_producto" placeholder="Ingresa la Marca">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="precio_producto">Precio del Producto</label>
                    <input type="number" class="form-control" id="precio_producto" placeholder="$0.00">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <select class="custom-select" id="categorias">
                    <option selected>Selecciona Categria</option>
                    <?php foreach ($categoria as $value) {?>
                       <option value="<?php echo $value['id_categoria'];?>"><?php echo $value['nombre'];?></option>
                    <?php }?>
                </select>
                </div>
                <div class="col-md-6 mb-3">
                <select class="custom-select" id="subcategorias">
                    <option selected>Selecciona Subcategoria</option>
                    
                </select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn btn-primary">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal NUEVO PRODUCTO-->
<div class="modal fade" id="nuevo_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> NUEVO PRODUDCTO </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="producto_nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="producto_nombre" placeholder="Ingresa el Nombre">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="marca_producto">Marca del Producto</label>
                    <input type="text" class="form-control" id="marca_producto" placeholder="Ingresa la Marca">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="precio_producto">Precio del Producto</label>
                    <input type="number" class="form-control" id="precio_producto" placeholder="$0.00">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <select class="custom-select" id="categorias">
                    <option selected>Selecciona Categria</option>
                    <?php foreach ($categoria as $value) {?>
                       <option value="<?php echo $value['id_categoria'];?>"><?php echo $value['nombre'];?></option>
                    <?php }?>
                </select>
                </div>
                <div class="col-md-6 mb-3">
                <select class="custom-select" id="subcategorias">
                    <option selected>Selecciona Subcategoria</option>
                    
                </select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn btn-success">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $("#categorias").change(function(){            
            $.post(base_url+"productos/lista_subcategoria",{
                id_categoria : $(this).val()
            },function(subcategorias){
                console.log(subcategorias);
                var subcategorias = JSON.parse(subcategorias);
                var opciones_subcategoria = "";
                for (let index = 0; index < subcategorias.length; index++) {
                    opciones_subcategoria += "<option value="+subcategorias[index].id_subcategoria+">"+subcategorias[index].nombre+"</option>";

            }
                $("#subcategorias").html('<option value="0">Seleccione una Subcategoria </option>'+opciones_subcategoria);
            });
        });
    });
</script>