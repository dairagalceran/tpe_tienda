{include file="templates/header.tpl"}


<div class="container">
    <div >
        <h3>CATEGORÍA: {$category->name|upper}</h3>

        <h3>Productos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Talle</th>
                    <th scope="col">Detalles</th>

                </tr>
            </thead>
            <tbody>
            {foreach from=$products item=$product }
                <tr>
                    <td>{$product->name|capitalize}</td>
                    <td>{$product->price}</td>
                    <td>{$product->size|upper}</td>
                    <td><a class="btn btn-success" href="products/show/{$product->id}">Ver</a> </td>
                </tr>
            {/foreach}     
            </tbody>
        </table> 
      
    </div>
</div>


{include file="templates/footer.tpl" assign=name var1=value}
