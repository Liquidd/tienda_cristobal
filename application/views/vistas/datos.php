<div class="container-fluid">
    <select class="custom-select">
        <?php foreach($historial as $value){?>
            <option><?php echo $value['fecha_compra'];?></option>                                                                                                                                   
        <?php }?>
    </select>
    <table class="table table-bordered">
        <thead class="">
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>precio</th>
                <th>cantidad_existente</th>
                <th>estado</th>
                <th>alta_producto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $value){?>
                <tr id="<?php echo $value['id_producto'];?>">
                    <td><?php echo $value['modelo'];?></td>
                    <td><?php echo $value['marca'];?></td>   
                    <td><?php echo $value['categoria'];?></td>                                    
                    <td><?php echo $value['descripcion'];?></td>
                    <td><?php echo $value['precio'];?></td>
                    <td><?php echo $value['cantidad_existente'];?></td>
                    <td><?php echo $value['estado'];?></td>
                    <td><?php echo $value['alta_producto'];?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>