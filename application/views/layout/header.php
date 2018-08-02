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
            <div class="row-sm">
                <div class="col-md-12">
                    <div class="slick-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>
                        <?php foreach($promocion as $value){?>
                            <div class="item-slide p-2">
                                <figure class="card card-product">
                                    <span class="badge-offer"><b><?php echo $value['descuento'];?></b></span>
                                    <div class="img-wrap"><img src="<?php echo base_url()?>bootstrap_UI/images/items/1.jpg"></div>
                                    <figcaption class="info-wrap text-center">
                                        <h6 class="title text-truncate"><a><?php echo $value['modelo'];?></a></h6>
                                    </figcaption>
                                </figure> <!-- card // -->
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div> <!-- row.// -->
        </div><!-- container // -->
    </section>
</div>
