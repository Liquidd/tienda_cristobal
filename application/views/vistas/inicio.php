
<!-- ========================= SECCION RECOMENDADOS ========================= -->
<title> GA | Inicio  </title>

<!--inicio de contenido-->
<section class="section-content padding-y-sm bg">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg">Las Categorias Destacadas.</h4>
        </header>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-3" style="margin-right:25px;">
                    <article href="#" class="card-banner h-100">
                        <div class="card-body zoom-wrap">
                            <h5 class="title">Lo mas vendido en eBooks y Literatura</h5>
                            <hr>
                            <?php foreach($principal_literatura as $value){?>
                                <div class="card border-0">
                                    <figure class="itemside">
                                        <img class="img-sm zoom-in" height="90" src="<?php echo base_url()?><?php echo $value['img'];?>">
                                        <figcaption class="card-body">
                                            <h6 class="title"><?php echo $value['modelo'];?></h6>
                                            <a data-id="<?php echo $value['id_producto'];?>" class="vista_rapida">Detalles</a>
                                        </figcaption>
                                    </figure>
                                </div> <!-- card.// -->
                                <hr>
                            <?php }?>                                                       
                        </div>
                    </article>
                </div> <!-- col.// -->
                <div class="col-md-8"> <!-- agregarlo al personal.css -->
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <header class="section-heading heading-line">
                                <h6 class="title-section bg text-uppercase">Los más vendidos en Electronicos</h6>
                            </header>
                            <div class="slick-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}' data-dots="true" data-nav="true">
                                <?php foreach($electronicos as $value){?>
                                    <div class="item-slide p-2">
                                        <figure class="card card-product">
                                            <div class="img-wrap"> 
                                                <img class="zoom-in" src="<?php echo base_url()?><?php echo $value['img'];?>">
                                                <a class="btn-overlay vista_rapida" data-id='<?php echo $value['id_producto'];?>' ><i class="fa fa-search-plus"></i>Vista Rapida</a>
                                            </div>
                                        </figure> <!-- card // -->
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <header class="section-heading heading-line">
                                <h6 class="title-section bg text-uppercase">Los más vendidos en Muebles y Hogar</h6>
                            </header>
                            <div class="slick-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}' data-dots="true" data-nav="true">
                                <?php foreach($principal_mh as $value){?>
                                    <div class="item-slide p-2">
                                        <figure class="card card-product">
                                            <div class="img-wrap"> 
                                                <img class="zoom-in" src="<?php echo base_url()?><?php echo $value['img'];?>">
                                                <a class="btn-overlay vista_rapida" data-id='<?php echo $value['id_producto'];?>' ><i class="fa fa-search-plus"></i>Vista Rapida</a>
                                            </div>
                                        </figure> <!-- card // -->
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div> <!-- col.// -->
            </div> <!-- row.// --> 
        </div> <!-- card.// -->
    </div> <!-- container .//  -->
</section>
<!--slide marcas-->
<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Las Mejores Marcas</h4>
        </header>
        <div class="slick-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>
            <div class="item-slide p-2">
                <figure class="card card-product">
                    <span class="badge-new">  </span>
                    <div class="img-wrap" style="height:150px;"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/LG-Logo.png"> </div>
                </figure> <!-- card // -->
            </div>
            <div class="item-slide p-2">
                <figure class="card card-product">
                    <div class="img-wrap" style="height:150px;"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/samsung_logo.png"></div>
                </figure> <!-- card // -->
            </div>
            <div class="item-slide p-2">
                <figure class="card card-product">
                    <div class="img-wrap" style="height:150px;"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/asus_logo.jpg"> </div>
                </figure> <!-- card // -->
            </div>
            <div class="item-slide p-2">
                <figure class="card card-product">
                    <div class="img-wrap" style="height:150px;"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/netflix-logo.png"> </div>
                </figure> <!-- card // -->
            </div>
            <div class="item-slide p-2">
                <figure class="card card-product">
                    <div class="img-wrap" style="height:150px;"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/logo4.png"> </div>
                </figure> <!-- card // -->
             </div>
            <div class="item-slide p-2">
                <figure class="card card-product">
                    <div class="img-wrap" style="height:150px;"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/apple-logo2.png"></div>
                </figure> <!-- card // -->
            </div>
        </div>
    </div><!-- container // -->
</section>
<!-- recomendados -->
<section class="section-request bg padding">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Productos Recomendados</h4>
        </header>
        <div class="row-sm">
            <?php foreach($principal as $value){?>
                <div class="col-md-3">
                    <figure class="card card-product">
                        <div class="img-wrap"><img src="<?php echo base_url()?><?php echo $value['img'];?>"></div>
                        <figcaption class="info-wrap">
                            <h5 class="card-title"><?php echo $value['modelo'];?></h4>
                            <div class="rating-wrap">
                                <ul class="rating-stars">
                                    <li style="width:80%" class="stars-active">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
                                    </li>
                                </ul>
                                <div class="label-rating">132 reviews</div>
                                <div class="label-rating">154 orders </div>
                            </div> <!-- rating-wrap.// -->
                        </figcaption>
                        <div class="bottom-wrap">
                            <a  class="detalles btn btn-light btn-sm float-right" id="<?php echo $value['id_producto'];?>" >DETALLES </a>
                            <div class="price-wrap h5">
                                <span class="price-new">$<?php echo $value['precio'];?></span> <del class="price-old">$1980</del>
                            </div> <!-- price-wrap.// -->
                        </div> <!-- bottom-wrap.// -->
                    </figure>
                </div> <!-- col // -->
            <?php }?>
        </div> <!-- row.// -->
    </div><!-- container // -->
</section>
<!-- categorias -->
<section class="section-content padding-y-sm bg">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Todas las Categorias</h4>
        </header>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <ul class="row no-gutters border-cols">
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox"> 
                                <div class="card-body">
                                    <p class="word-limit">Video Juegos</p>
                                    <img class="img-sm" src="<?php echo base_url()?>bootstrap_UI/images/items/videojuegos.png">
                                </div>
                            </a>
                        </li>
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox"> 
                                <div class="card-body">
                                    <p class="word-limit">Hardware</p>
                                    <img class="img-sm" src="<?php echo base_url()?>bootstrap_UI/images/items/hardware.png">
                                </div>
                            </a>
                        </li>
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox"> 
                                <div class="card-body">
                                    <p class="word-limit">Hogar y Cocina</p>
                                    <img class="img-sm" src="<?php echo base_url()?>bootstrap_UI/images/items/hogar.png">
                                </div>
                            </a>
                        </li>
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox"> 
                                <div class="card-body">
                                    <p class="word-limit">Telefononia</p>
                                    <img class="img-sm" src="<?php echo base_url()?>bootstrap_UI/images/items/telefonia.png">
                                </div>
                            </a>	
                        </li>
                    </ul>
                    <ul class="row no-gutters border-cols">
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox"> 
                                <div class="card-body">
                                    <p class="word-limit">Multimedia</p>
                                    <img class="img-sm" src="<?php echo base_url()?>bootstrap_UI/images/items/multimedia.png">
                                </div>
                            </a>
                        </li>
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox"> 
                                <div class="card-body">
                                    <p class="word-limit">Electronicos</p>
                                    <img class="img-sm" src="<?php echo base_url()?>bootstrap_UI/images/items/electronicos.png">
                                </div>
                            </a>
                        </li>
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox"> 
                                <div class="card-body">
                                    <p class="word-limit">Muebles y Hogar</p>
                                    <img class="img-sm" src="<?php echo base_url()?>bootstrap_UI/images/items/muebles.png">
                                </div>
                            </a>
                        </li>
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox"> 
                                <div class="card-body">
                                    <p class="word-limit">Musica</p>
                                    <img class="img-sm" src="<?php echo base_url()?>bootstrap_UI/images/items/music.png">
                                </div>
                            </a>	
                        </li>
                    </ul>
                </div> <!-- col.// -->
            </div> <!-- row.// --> 
        </div> <!-- card.// -->
    </div> <!-- container .//  -->
</section>

<div class="modal fade bd-example-modal-lg" id="modal_inicio"aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="container">
                <div class="row">

                <main class="col-md-12">
                    <article class="card card-product">
                        <div class="card-body">
                            <div class="row">
                                <aside class="col-sm-3">
                                    <div class="img-wrap"><img id="imagen" src=""> <!--JSON--> </div>
                                </aside> <!-- col.// -->
                                <article class="col-sm-6">
                                    <h5 class="title" id="modelo_card">  <!--JSON-->   </h5>
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
                                    <dl class="dlist-align">
                                    <dt>Marca</dt>
                                        <dd id="marca_card">    </dd>
                                    </dl>  <!-- item-property-hor .// -->    

                                    <dl class="dlist-align">
                                    <dt>Categoria</dt>
                                        <dd id="categoria_card">      </dd>
                                    </dl>  <!-- item-property-hor .// -->
                                    <dl class="dlist-align">
                                    <dt>Subcategoria</dt>
                                        <dd id="sb_card">     </dd>
                                    </dl>  <!-- item-property-hor .// -->

                                </article> <!-- col.// -->
                                <aside class="col-sm-3 border-right">
                                    <div class="action-wrap">
                                        <div class="price-wrap h4">
                                            <span class="price" id="precio_card"><!--JSON--> </span>	
                                        </div> <!-- info-price-detail // -->
                                        <hr>
                                        <p>
                                            <button class="btn btn-success agregar_inicio">Agregar Carrito</button>
                                        </p>
                                    </div> <!-- action-wrap.// -->
                                </aside> <!-- col.// -->
                            </div> <!-- row.// -->
                        </div> <!-- card-body .// -->
                    </article> <!-- card product .// -->
                </main> <!-- col.// -->
                   
                </div>
            </div>

        </div><!-- cierracontenido modal -->
    </div>
</div>
