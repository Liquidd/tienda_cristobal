<div class="container">
    <section class="section-main bg padding-top-sm">
        <div class="container">
            <div class="row-sm">
                <div class="col-lg-12">
                    <!-- ================= main slide ================= -->
                    <div id="slider-main" class="owl-init slider-main owl-carousel" data-items="1" data-dots="false" data-nav="true">
                        <div class="item-slide">
                            <img src="<?php echo base_url()?>assets/img/banner1.jpg">
                        </div>
                        <div class="item-slide rounded">
                            <img src="<?php echo base_url()?>assets/img/sale1.png">
                        </div>
                        <div class="item-slide rounded">
                            <img src="<?php echo base_url()?>assets/img/banner3.jpg">
                        </div>
                        <div class="item-slide rounded">
                            <img src="<?php echo base_url()?>assets/img/banner4.jpg">
                        </div>
                    </div>
                    <!-- ============== main slidesow .end // ============= -->
                </div> <!-- col.// -->
            </div>
        </div> <!-- container .//  -->
    </section>
    <section class="section-request bg padding-y-sm">
        <div class="container">
            <header class="section-heading heading-line">
                <h4 class="title-section bg text-uppercase">Productos en Ofertas !!</h4>
            </header>
            <div class="owl-carousel owl-init slide-items" data-items="5" data-margin="35" data-dots="true" data-nav="true">
                <?php foreach($promocion as $value){?>
                    <div class="item-slide">
                        <figure class="card card-product">
                            <span class="badge-offer"><b><?php echo " - ".$value['descuento']."% ";?></b></span>
<<<<<<< HEAD
                            <div class="img-wrap"> 
                                <img src="<?php echo base_url()?><?php echo $value['img'];?>">
                            </div>
=======
                            <img src="<?php echo base_url()?><?php echo $value['img'];?>">
>>>>>>> a15e3b5f3483bdd526a733a0d6785d0279345103
                            <figcaption class="info-wrap">
                                <h5 class="card-title"><?php echo substr($value['modelo'], 0, 21);?></h4>
                                <div class="rating-wrap">
                                    <ul class="rating-stars">
                                        <li style="width:80%" class="stars-active"> 
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
                                        </li>
                                    </ul>
                                    <div class="label-rating">
                                        <button type="button" class="detalles btn btn-light text-right" id="<?php echo $value['id_producto'];?>">Detalles </button>
                                    </div>
                                </div> <!-- rating-wrap.// -->
                            </figcaption>
                        </figure> <!-- card // -->
                    </div>
                <?php }?>
            </div>
        </div><!-- container // -->
    </section>
</div>