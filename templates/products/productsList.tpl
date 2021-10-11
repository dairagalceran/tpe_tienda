{include file="templates/header.tpl"}


<div class="container">

    <div >
        <h3>{$titleProducts}</h3>
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
                    <td scope="row"><a class= "list-group-item" href="{BASE_URL}/productsCategory/{$product->category_id}">{$product->category|upper}</a></th>
                    <td>{$product->name|capitalize}</td>
                    <td>{$product->price}</td>
                    <td><a class="btn btn-success" href="{BASE_URL}/productView/{$product->id}">Ver</a> </td>
                </tr>
            {/foreach}     
            </tbody>
        </table> 
      
    </div>
</div>


{include file="templates/footer.tpl" assign=name var1=value}
