
    <?php foreach($datos as $value){?>
        <ul>
            <li><?php echo $value['modelo'];?></li>
            <li><?php echo $value['marca'];?></li>
            <li><?php echo $value['categoria'];?></li>
            <li><?php echo $value['subcategoria'];?></li>
            <li><?php echo $value['descripcion'];?></li>
            <li><?php echo $value['precio'];?></li>
        </ul>
    <?php }?>
