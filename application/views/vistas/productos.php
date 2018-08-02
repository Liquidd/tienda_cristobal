<title> GA | Categorias </title>
<section class="section-content bg padding-y">
    <div class="container">
        <div class="row">
            <aside class="col-sm-3">
                <div class="card card-filter">                    
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Precio</h6>
                        </header>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Min</label>
                                    <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <label>Max</label>
                                    <input type="number" class="form-control" placeholder="$1,0000">
                                </div>
                            </div>
                        </div> <!-- card-body.// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Marcas </h6>
                        </header>
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check1">
                                    <label class="custom-control-label" for="Check1">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check2">
                                    <label class="custom-control-label" for="Check2">Black berry</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check3">
                                    <label class="custom-control-label" for="Check3">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check4">
                                    <label class="custom-control-label" for="Check4">Other Brand</label>
                                </div> <!-- form-check.// -->
                            </div> <!-- card-body.// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Categorias </h6>
                        </header>
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check1">
                                    <label class="custom-control-label" for="Check1">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check2">
                                    <label class="custom-control-label" for="Check2">Black berry</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check3">
                                    <label class="custom-control-label" for="Check3">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check4">
                                    <label class="custom-control-label" for="Check4">Other Brand</label>
                                </div> <!-- form-check.// -->
                            </div> <!-- card-body.// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Articulos Relacionados </h6>
                        </header>
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check1">
                                    <label class="custom-control-label" for="Check1">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check2">
                                    <label class="custom-control-label" for="Check2">Black berry</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check3">
                                    <label class="custom-control-label" for="Check3">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check4">
                                    <label class="custom-control-label" for="Check4">Other Brand</label>
                                </div> <!-- form-check.// -->
                            </div> <!-- card-body.// -->
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->
            </aside> <!-- col.// -->
            <main class="col-md-9">
                <article class="card card-product">
                    <div class="card-body">
                    <div class="row">
                        <aside class="col-sm-3">
                            <div class="img-wrap"><img src="<?php echo base_url();?>bootstrap_UI/images/items/2.jpg"></div>
                        </aside> <!-- col.// -->
                        <article class="col-sm-6">
                            <h4 class="title">{{ nombre }}</h4>
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
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat </p>
                            <dl class="dlist-align">
                            <dt>Categoria</dt>
                                <dd> {{ categoria }}</dd>
                            </dl>  <!-- item-property-hor .// -->
                            <dl class="dlist-align">
                            <dt>Subcategoria</dt>
                                <dd> {{ subcategoria }}</dd>
                            </dl>  <!-- item-property-hor .// -->                                
                        </article> <!-- col.// -->
                        <aside class="col-sm-3 border-left">
                                <div class="action-wrap">
                                    <div class="price-wrap h4">
                                        <span class="price">{{ precio }}</span>	
                                        <del class="price-old"> $98</del>
                                    </div> <!-- info-price-detail // -->
                                    <p class="text-success">Free shipping</p>
                                    <br>
                                    <p>
                                        <a href="#" class="btn btn-success"> Agregar </a>
                                        <a href="#" class="btn btn-dark"> Detalles</a>
                                    </p>
                                    <a href="#"><i class="fa fa-heart"></i>Agregar a Lista de Deseos</a>
                                </div> <!-- action-wrap.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                    </div> <!-- card-body .// -->
                </article> <!-- card product .// -->
            </main> <!-- col.// -->
        </div>
    </div> <!-- container .//  -->
</section>