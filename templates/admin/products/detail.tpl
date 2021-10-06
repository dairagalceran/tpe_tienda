{include file="templates/header.tpl" }

<h2>ADMIN</h2>
<div class="container">
    <div>
<div class="card" style="width: 18rem;">

    <div class="card-body">
        <h2 class="card-title"> {$title}</h2>
        <h5 class="card-text" >{$product->category|upper}</h5>
    </div> 
    <ul class="list-group list-group-flush">
        <li class="list-group-item"> {$product->name|capitalize}</li>
        <li class="list-group-item">Precio: {$product->price}</li>
        <li class="list-group-item">Talle: {$product->size|upper}</li>
        <li class="list-group-item"><a class="category-link" href="{BASE_URL}/categories/show/{$product->category_id}">{$product->category|upper}</a></li>
    </ul>
    <div class="card-body">
        <a href="{BASE_URL}/{$home}"> Volver</a>
     
    </div>
</div>
    </div>
</div>

{include file="templates/footer.tpl" assign=name var1=value}
