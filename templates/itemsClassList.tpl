{include file="templates/header.tpl"}

<div class="container">
    <div >
        <h3>{$tituloItemsCategoria}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Talle</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Detalles</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$items item=$item }
                <tr>
                    <th scope="row">{$item->categoria|upper}</th>
                    <td>{$item->nombre_producto|capitalize}</td>
                    <td>{$item->talle}</td>
                    <td>{$item->precio}</td>
                    <td><a class="btn btn-success" href="productView/{$item->id_producto}">Ver</a> </td>
                </tr>
            {/foreach}     
            </tbody>
        </table> 
      
    </div>
</div>

{include file="templates/footer.tpl" assign=name var1=value}


