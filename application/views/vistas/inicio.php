
<!-- ========================= SECCION RECOMENDADOS ========================= -->
<title> GA | Inicio  </title>
<!-- inicio de contenido -->
<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Categorias Populares</h4>
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
<!-- recomendados -->
<section class="section-request bg padding-y-sm">
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

<!-- slide de marcas -->
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
