{include file="templates/header.tpl" }

<div class="container">
    <h2> {$title}</h2>
    <div >
<div class="card" style="width: 18rem;">
   
    <div class="card-body">
        <h2 class="card-title" >{$product->name|capitalize}</h2>
    </div> 
    <ul class="list-group list-group-flush">
        <li class="list-group-item">$ {$product->price}</li>
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
