<div class="row">
  <?php foreach($carrito as $value){?>
    <div class="col-md-4">
      <figure class="card card-product">
        <div class="img-wrap"><img src="<?php echo base_url()?>bootstrap_UI/images/items/1.jpg"></div>
        <figcaption class="info-wrap">
            <h4 class="title"><?php echo $value['id'];?></h4>
            <p class="desc">Some small description goes here</p>
            <div class="rating-wrap">
            <ul class="rating-stars">
              <li style="width:80%" class="stars-active"> 
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
              </li>
            <li>
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
            </li>
          </ul>
          <div class="label-rating"><?php echo $value['qty'];?></div>
            <div class="label-rating"><?php echo $value['price'];?> </div>
          </div> <!-- rating-wrap.// -->
        </figcaption>
        <div class="bottom-wrap">
          <a href="" class="btn btn-sm btn-primary float-right">Comprar</a>	
          <div class="price-wrap h5">
            <span class="price-new"><?php echo $value['name'];?></span> <del class="price-old"><?php echo $value['cupón'];?></del>
          </div> <!-- price-wrap.// -->
        </div> <!-- bottom-wrap.// -->
      </figure>
    </div> <!-- col // -->
  <?php }?>
</div>
