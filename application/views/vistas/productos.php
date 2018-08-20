<title> GA | Categorias </title>
<section class="section-content bg padding-y">
    <div class="container">
        <div class="row">
            <aside class="col-sm-2">
                <div class="card card-filter">  
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Precio</h6>
                        </header>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Min</label>
                                    <input type="number" class="form-control" id="minimo" placeholder="$0">
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <label>Max</label>
                                    <input type="number" class="form-control" id="maximo" placeholder="$1,0000">
                                </div>
                            </div>
                        </div> <!-- card-body.// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Marcas </h6>
                        </header>
                            <div class="card-body">
                                <?php foreach($marca as $value){?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Check2">
                                        <label class="custom-control-label" for=""><?php echo $value['marca'];?></label>
                                    </div> <!-- form-check.// -->
                                <?php }?>
                            </div> <!-- card-body.// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Categorias </h6>
                        </header>
                        <div class="card-body">
                            <?php foreach($categoria as $value){?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="<?php echo $value['id_categoria'];?>">
                                    <label class="custom-control-label" for="Check1"><?php echo $value['nombre'];?></label>
                                </div> <!-- form-check.// -->
                            <?php }?>
                        </div> <!-- card-body.// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Articulos Relacionados </h6>
                        </header>
                            <div class="card-body">
                                <?php foreach($subcategoria as $value){?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="<?php echo $value['id_subcategoria'];?>">
                                        <label class="custom-control-label" for="Check1"><?php echo $value['nombre'];?></label>
                                    </div> <!-- form-check.// -->
                                <?php }?>
                            </div> <!-- card-body.// -->
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->
            </aside> <!-- col.// -->
            <main class="col-md-10">
                <?php foreach($productos_categoria as $value){?>
                    <article class="card card-product">
                        <div class="card-body box_test">
                            <div class="row">
                                <aside class="col-sm-3">
                                    <div class="img-wrap"><img id="imagen" src="<?php echo base_url();?><?php echo $value['img'];?>"></div>
                                </aside> <!-- col.// -->
                                <article class="col-sm-6">
                                    <h5 class="title"><?php echo $value['modelo'];?></h5>
                                    <div class="rating-wrap  mb-2">
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
                                        <p>
                                            <?php echo substr($value['descripcion'], 0, 213).".......";?>
                                        </p>
                                    <dl class="dlist-align">
                                    <dt>Marca</dt>
                                        <dd><?php echo $value['marca'];?></dd>
                                    </dl>  <!-- item-property-hor .// -->    

                                    <dl class="dlist-align">
                                    <dt data-testid="199" >Categoria</dt>
                                        <dd><?php echo $value['categoria'];?></dd>
                                    </dl>  <!-- item-property-hor .// -->
                                    <dl class="dlist-align">
                                    <dt>Subcategoria</dt>
                                        <dd><?php echo $value['subcategoria'];?></dd>
                                    </dl>  <!-- item-property-hor .// -->                                
                                </article> <!-- col.// -->
                                <aside class="col-sm-3 border-left">
                                    <div class="action-wrap">
                                        <div class="price-wrap h4">
                                            <span class="price" id="precio" data-precio="aaaaaa">$<?php echo $value['precio'];?></span>	
                                            <del class="price-old"> $98</del>
                                        </div> <!-- info-price-detail // -->
                                            <p class="text-success" data-ennviot="textoo">Free shipping</p>
                                        <br>
                                        <p>
                                            <button type="button" class="detalles btn btn-light" id="<?php echo $value['id_producto'];?>">Detalles </button>
                                        </p>
                                    </div> <!-- action-wrap.// -->
                                </aside> <!-- col.// -->
                            </div> <!-- row.// -->
                        </div> <!-- card-body .// -->
                    </article> <!-- card product .// -->
                <?php }?>
            </main> <!-- col.// -->
        </div>
    </div> <!-- container .//  -->
</section>
