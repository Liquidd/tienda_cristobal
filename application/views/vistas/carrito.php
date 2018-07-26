<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y border-top">
    <div class="container">
        <div class="row">
	        <main class="col-sm-9">
                <div class="card">
                    <table class="table table-hover shopping-cart-wrap">
                        <thead class="text-muted">
                        <tr>
                            <th scope="col">Productos</th>
                            <th scope="col" width="120">Cantidad</th>
                            <th scope="col" width="120">Precio</th>
                            <th scope="col" class="text-right" width="200">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <figure class="media">
                                    <div class="img-wrap">
                                        <img src="<?php echo base_url()?>assets/img/1.jpg" class="img-thumbnail img-sm">
                                    </div>
                                    <figcaption class="media-body">
                                        <h6 class="title text-truncate">Product name goes here </h6>
                                        <dl class="dlist-inline small">
                                            <dt>Size: </dt>
                                            <dd>XXL</dd>
                                        </dl>
                                        <dl class="dlist-inline small">
                                            <dt>Color: </dt>
                                            <dd>Orange color</dd>
                                        </dl>
                                    </figcaption>
                                </figure> 
                            </td>
                            <td> 
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>	
                                    <option>3</option>	
                                    <option>4</option>	
                                </select> 
                            </td>
                            <td> 
                                <div class="price-wrap"> 
                                    <var class="price">USD 145</var> 
                                    <small class="text-muted">(USD5 each)</small> 
                                </div> <!-- price-wrap .// -->
                            </td>
                            <td class="text-right"> 
                                <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
                                <a href="" class="btn btn-outline-danger"> × Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <figure class="media">
                                    <div class="img-wrap">
                                        <img src="<?php echo base_url()?>assets/img/2.jpg" class="img-thumbnail img-sm">
                                    </div>
                                    <figcaption class="media-body">
                                        <h6 class="title text-truncate">Product name goes here </h6>
                                        <dl class="dlist-inline small">
                                            <dt>Size: </dt>
                                            <dd>XXL</dd>
                                        </dl>
                                        <dl class="dlist-inline small">
                                            <dt>Color: </dt>
                                            <dd>Orange color</dd>
                                        </dl>
                                    </figcaption>
                                </figure> 
                            </td>
                            <td> 
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>	
                                    <option>3</option>	
                                    <option>4</option>	
                                </select> 
                            </td>
                            <td> 
                                <div class="price-wrap"> 
                                    <var class="price">USD 35</var> 
                                    <small class="text-muted">(USD10 each)</small> 
                                </div> <!-- price-wrap .// -->
                            </td>
                            <td class="text-right"> 
                                <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
                                <a href="" class="btn btn-outline-danger btn-round"> × Remove</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <figure class="media">
                                    <div class="img-wrap">
                                        <img src="<?php echo base_url()?>assets/img/3.jpg" class="img-thumbnail img-sm">
                                    </div>
                                    <figcaption class="media-body">
                                        <h6 class="title text-truncate">Product name goes here </h6>
                                        <dl class="dlist-inline small">
                                            <dt>Size: </dt>
                                            <dd>XXL</dd>
                                        </dl>
                                        <dl class="dlist-inline small">
                                            <dt>Color: </dt>
                                            <dd>Orange color</dd>
                                        </dl>
                                    </figcaption>
                                </figure> 
                            </td>
                            <td> 
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>	
                                    <option>3</option>	
                                    <option>4</option>	
                                </select> 
                            </td>
                            <td> 
                                <div class="price-wrap"> 
                                    <var class="price">USD 45</var> 
                                    <small class="text-muted">(USD15 each)</small> 
                                </div> <!-- price-wrap .// -->
                            </td>
                            <td class="text-right"> 
                                <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
                                <a href="" class="btn btn-outline-danger btn-round"> × Remove</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- card.// -->
	    </main> <!-- col.// -->
	    <aside class="col-sm-3">
            <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
            <dl class="dlist-align">
                <dt>Total price: </dt>
                <dd class="text-right">USD 568</dd>
            </dl>
            <dl class="dlist-align">
                <dt>Discount:</dt>
                <dd class="text-right">USD 658</dd>
            </dl>
                <dl class="dlist-align h4">
                    <dt>Total:</dt>
                    <dd class="text-right"><strong>USD 1,650</strong></dd>
                </dl>
            </aside> <!-- col.// -->
        </div>
    </div> <!-- container .//  -->
</section>

<style>
    .param {
    margin-bottom: 7px;
    line-height: 1.4;
}
.param-inline dt {
    display: inline-block;
}
.param dt {
    margin: 0;
    margin-right: 7px;
    font-weight: 600;
}
.param-inline dd {
    vertical-align: baseline;
    display: inline-block;
}

.param dd {
    margin: 0;
    vertical-align: baseline;
} 

.shopping-cart-wrap .price {
    color: #007bff;
    font-size: 18px;
    font-weight: bold;
    margin-right: 5px;
    display: block;
}
var {
    font-style: normal;
}

.media img {
    margin-right: 1rem;
}
.img-sm {
    width: 90px;
    max-height: 75px;
    object-fit: cover;
}
</style>