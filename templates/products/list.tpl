{include file="templates/header.tpl"}


<div class="container">
    <div >
        <h3>{$title}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Detalles</th>

                </tr>
            </thead>
            <tbody>
            {foreach from=$products item=$product }
                <tr>
                    <td><a class="category-link" href="{BASE_URL}/categories/show/{$product->category_id}">{$product->category|upper}</a></td>
                    <td>{$product->name|capitalize}</td>
                    <td>{$product->price}</td>
                    <td><a class="btn btn-success" href="{BASE_URL}/products/show/{$product->id}">Ver</a> </td>
                </tr>
            {/foreach}     
            </tbody>
        </table> 
      
    </div>
</div>


{include file="templates/footer.tpl" assign=name var1=value}
