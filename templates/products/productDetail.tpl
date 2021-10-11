{include file="templates/header.tpl" }

<div class="card" style="width: 18rem;">
   
    <div class="card-body">
        <h2 class="card-title">  {$titleProduct}</h2>
        <h5 class="card-text" >Categoria: {$product->category|upper}</h5>
    </div> 
        <div class="card-body">
        <img class="img" href="{$product->image}">
        
    </div> 
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> {$product->name|capitalize}</li>
            <li class="list-group-item">Precio: {$product->price}</li>
            <li class="list-group-item">Talle: {$product->size|upper}</li>
            <li class="list-group-item">Comprar</li>
        </ul>
    <div class="card-body">
        
     
    </div>
</div>

{include file="templates/footer.tpl" assign=name var1=value}
