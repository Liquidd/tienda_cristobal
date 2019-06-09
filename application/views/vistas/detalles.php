

<section class="section-content bg padding-y">
    <div class="container">
        <div class="row">
        <?php foreach($datos as $value){?>
            <main class="col-sm-9">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-md-6 border-right">
                                <article class="gallery-wrap"> 
                                    <div class="img-small-wrap">
                                        <div>
                                            <a id="foto_perfil" href="<?php echo base_url();?><?php echo $value['img'];?>" data-fancybox="">
                                                <img id="imagen" src="<?php echo base_url();?><?php echo $value['img'];?>">
                                            </a>
                                        </div>
                                    </div> <!-- slider-product.// -->
                                </article> <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-6">
                                <article class="p-5">
                                    <h3 class="title mb-3" id="modelo_card"><?php echo $value['modelo'];?></h3>
                                    <div class="rating-wrap">
                                        <ul class="rating-stars">
                                            <li style="width:80%" class="stars-active"> 
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                            </li>
                                        </ul>
                                        <div class="label-rating">132 reviews</div>
                                        <div class="label-rating">154 orders </div>
                                    </div> <!-- rating-wrap.// -->
                                    <hr>
                                    <dl>
                                        <dt>Descripcion</dt>
                                        <dd>
                                            <p>
                                                <?php echo $value['descripcion'];?>
                                            </p>
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Modelo</dt>
                                        <dd class="col-sm-9"><?php echo $value['modelo'];?></dd>

                                        <dt class="col-sm-3">Marca</dt>
                                        <dd class="col-sm-9"><?php echo $value['marca'];?></dd>

                                        <dt class="col-sm-3">Categoria</dt>
                                        <dd class="col-sm-9"><?php echo $value['categoria'];?></dd>

                                        <dt class="col-sm-4">Subcategoria</dt>
                                        <dd class="col-sm-9"><?php echo $value['subcategoria'];?></dd>
                                    </dl>
                                </article> <!-- card-body.// -->
                            </aside> <!-- col.// -->
                        </div> <!-- row.// -->
                    </div> <!-- card.// -->
            </main> <!-- col.// -->
            <aside class="col-sm-3">
                <div class="box">
                    <dl class="dlist-align">
                        <dt>Existencia: </dt>
                        <dd class="text-right"><span class="text-success">Disponible</span></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Precio: </dt>
                        <dd class="text-right h5 b" id="precio_card"><?php echo "$".$value['precio'];?></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>
                            <select id="cantidad_card" class="form-control form-control-sm" style="width:85px;">
                                    <option> 1 </option>
                                    <option> 2 </option>
                                    <option> 3 </option>
                            </select>
                        </dt>
                        <dd class="text-right"><button class="btn btn-success" onClick="agregar_carrito('<?php echo $value['id_producto'];?>')">Agregar Carrito</button></dd>
                    </dl>
                </div> <!-- box.// -->   
                <hr>             
                <div class="box">
                    <dl class="dlist-align">
                        <dt>El Mejor Comentario</dt>
                        <dd class="text-right b"><?php echo $value['cliente'];?></dd>
                    </dl>
                </div> <!-- box.// -->
                <div class="box">
                    <dl class="dlist-align">
                        <dt>
                            <div class="rating-wrap  mb-1">
                                <ul class="rating-stars">
                                    <li style="width:80%" class="stars-active"> 
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                    </li>
                                </ul>
                            </div> <!-- rating-wrap.// -->
                        </dt>
                    </dl>
                </div>
                <div class="box">
                    <?php echo $value['comentario'];?>
                </div>
             </aside> <!-- col.// -->
            <?php }?>
        </div> <!-- row -->
    </div> <!-- container .//  -->
</section>
