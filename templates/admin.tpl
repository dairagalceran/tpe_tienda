{include file="templates/header.tpl"}

<div >
    <h3>{$tituloAdmin}</h3>
    <div class="table mt-5 col-md-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" >Categoria</th>
                    <th scope="col" >Producto</th>
                    <th scope="col" >Precio</th>
                    <th scope="col" >Talle</th>
                    <th scope="col" >Editar</th>
                    <th scope="col"  >Eliminar</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$productos item=$product }
                <tr>
                    <th scope="row">{$product->categoria|upper}</th>
                    <td>{$product->nombre_producto|capitalize}</td>
                    <td>{$product->precio}</td>
                    <td>{$product->talle}</td>
                    <td><a class="btn btn-success" href="editItem/{$product->id_producto}">Editar</a> </td>
                    <td><a class="btn btn-success" href="deleteProduct/{$product->id_producto}">Eliminar</a> </td>

                    <input type="hidden" name="id_producto"  value={$product->id_producto} />
                </tr>
            {/foreach}     
            </tbody>
        </table> 
    </div>
</div>

<form action="postProduct" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Agregar  productos </label>
                <label for="categoria">Categoria</label>
                <input name="categoria" type="number" class="form-control" >
                <label for="producto">Producto</label>
                <input name="producto" type="text" class="form-control" >
                <label for="talle">Talle</label>
                <input name="talle" type="text" class="form-control" >
                <label for="precio">Precio</label>
                <input name="precio" type="text" class="form-control" >
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>

<div class="container ">
    <div class="table mt-5 col-md-5">
        <table>
            <tr>
                <th scope="col" class=" list-group-item-success">{$titulo|upper} </th>
                <th scope="col" class=" list-group-item-secondary ">Editar</th>
                <th scope="col" class="list-group-item list-group-item-secondary ">Eliminar</th>
            </tr>             
            <tbody>
                {foreach from= $categorias item=$class}
                    <tr>
                        <td> <a class="list-group-item list-group-item-action list-group-item-success"> {$class->categoria|upper} </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="formCategory/{$class->id_categoria}">   Editar </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="deleteCategory/{$class->id_categoria}">   Eliminar </a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>      

<form action="postCategory" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Agregar categoría</label>
                <input name="categoria" type="text" class="form-control" >
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>



{include file="templates/footer.tpl" assign=name var1=value}