
<section class="section-request bg padding-y-sm">
    <div class="container">
        <div class="row">
            <?php foreach($categoria_filtro as $value){?>
                <div class="col-md-4">
                    <div class="card-banner detalle_subcategoria" data-id="<?php echo $value['id_subcategoria'];?>" style="height:250px; background-image: url('<?php echo base_url()?><?php echo $value['foto_subcategoria'];?>');">
                        <article class="overlay bottom text-center">
                                <h5 class="title mb-0"><?php echo $value['nombre'];?></h5>
                        </article>
                    </div> <!-- card.// -->
                </div> <!-- col // -->
            <?php }?>
        </div><!-- row // -->
    </div><!-- container // -->
</section>
 