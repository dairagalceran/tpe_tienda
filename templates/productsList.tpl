{include file="templates/header.tpl"}


<div class="container">

    <form class="d-flex mt-5 mb-5">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

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
