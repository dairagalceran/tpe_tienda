{include file="templates/header.tpl"}


<div class="container">
    <div >
        <h3>{$tituloProducts}</h3>
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
                    <th scope="row">{$product->categoria|upper}</th>
                    <td>{$product->nombre_producto|capitalize}</td>
                    <td>{$product->precio}</td>
                    <td><a class="btn btn-success" href="productView/{$product->id_producto}">Ver</a> </td>
                </tr>
            {/foreach}     
            </tbody>
        </table> 
      
    </div>
</div>


{include file="templates/footer.tpl" assign=name var1=value}
