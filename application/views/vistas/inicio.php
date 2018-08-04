
<!-- ========================= SECCION RECOMENDADOS ========================= -->
<title> GA | Inicio  </title>


<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Productos Recomendados</h4>
        </header>
        <div class="row-sm">
            <?php foreach($principal as $value){?>
                <div class="col-md-3">
                    <figure class="card card-product">
                        <div class="img-wrap"> 
                            <img src="<?php echo base_url()?>bootstrap_UI/images/items/3.jpg">
                        </div>
                        <figcaption class="info-wrap">
                            <a href="#" class="title"><?php echo substr($value['modelo'], 0, 4);?></a>
                            <div class="action-wrap">
                                <a href="#" class="btn btn-outline-success btn-sm float-right" onClick="detalles_productos('<?php echo $value['id_producto'];?>')"><i class="fas fa-shopping-cart"></i> AGREGAR </a>
                                <div class="price-wrap h5">
                                    <span class="price-new"><?php echo $value['precio'];?></span>
                                    <del class="price-old">$1980</del>
                                </div> <!-- price-wrap.// -->
                            </div> <!-- action-wrap -->
                        </figcaption>
                    </figure> <!-- card // -->
                </div> <!-- col // -->
            <?php }?>
        </div> <!-- row.// -->
    </div><!-- container // -->
</section>

<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Las Mejores Marcas</h4>
        </header>
        <div class="row-sm">
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/apple-logo2.png"></div>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/logo4.png"></div>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/netflix-logo.png"></div>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/asus_logo.jpg"></div>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/samsung_logo.png"></div>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"> <img src="<?php echo base_url()?>bootstrap_UI/images/logos/LG-Logo.png"></div>
                </figure> <!-- card // -->
            </div> <!-- col // -->
        </div> <!-- row.// -->
    </div><!-- container // -->
</section>
<style>
    .blog .carousel-indicators {
	left: 0;
	top: auto;
    bottom: -40px;

}

/* The colour of the indicators */
.blog .carousel-indicators li {
    background: #a3a3a3;
    border-radius: 50%;
    width: 8px;
    height: 8px;
}

.blog .carousel-indicators .active {
    background: #707070;
}
</style>