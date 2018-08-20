
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


<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Las Mejores Marcas</h4>
        </header>
        <div class="row-sm">
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="<?php echo base_url()?>bootstrap_UI/images/logos/apple-logo2.png"></div>
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
