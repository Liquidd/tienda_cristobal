<div id="total">
    <dl class="dlist-align h4">
        <dt>Total :</dt>
        <dd class="text-right"><strong><?php echo "$".$this->cart->total();?></strong></dd>
    </dl>
    <hr>
    <button type="button" class="btn btn-lg btn-success" onClick="carrito_contenido()">Confirmar Pago</button>
</div>