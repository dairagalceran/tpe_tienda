{include file="templates/header.tpl" }

<div class="card" style="width: 18rem;">
   
    <div class="card-body">
        <h2 class="card-title"> {$tituloProduct}</h2>
        <h5 class="card-text" >{$product->categorias|upper}</h5>
    </div> 
    <ul class="list-group list-group-flush">
        <li class="list-group-item"> {$product->nombre_producto|capitalize}</li>
        <li class="list-group-item">Precio: {$product->precio}</li>
        <li class="list-group-item">Talle: {$product->talle|upper}</li>
        <li class="list-group-item">Comprar</li>
    </ul>
    <div class="card-body">
        
     
    </div>
</div>

{include file="templates/footer.tpl" assign=name var1=value}
