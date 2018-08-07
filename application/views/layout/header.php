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
                            <img src="<?php echo base_url()?>assets/img/banner2.jpg">
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
            <div class="owl-carousel owl-init slide-items" data-items="5" data-margin="20" data-dots="true" data-nav="true">
                <?php foreach($promocion as $value){?>
                    <div class="item-slide">
                        <figure class="card card-product">
                            <span class="badge-offer"><b><?php echo " - ".$value['descuento']."% ";?></b></span>
                            <div class="img-wrap"> 
                                <img src="<?php echo base_url()?>bootstrap_UI/images/items/3.jpg">
                            </div>
                            <figcaption class="info-wrap">
                                <a href="#" class="title"><?php echo $value['modelo'];?></a>
                                <div class="action-wrap">
                                    <a href="#" class="btn btn-primary btn-sm float-right"> Detalles </a>
                                    <div class="price-wrap h5">
                                        <span class="price-new">$1280</span>
                                        <del class="price-old">$1980</del>
                                    </div> <!-- price-wrap.// -->
                                </div> <!-- action-wrap -->
                            </figcaption>
                        </figure> <!-- card // -->
                    </div>
				<?php }?>
            </div>   
