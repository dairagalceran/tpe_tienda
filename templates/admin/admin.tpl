{include file="templates/header.tpl"}


<div class="container ">

    <h3>{$titulo}</h3>

    <div class="table mt-5 col-md-5">
        <table>
            <tr>
                <th scope="col" class=" list-group-item-success">{$titulo|upper} </th>
                <th scope="col" class=" list-group-item-secondary ">Editar</th>
                <th scope="col" class="list-group-item list-group-item-secondary ">Eliminar</th>
            </tr>             
            <tbody>
                {foreach from= $categories item=$category}
                    <tr>
                        <td> <a class="list-group-item list-group-item-action list-group-item-success"> {$category->name|upper} </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="{BASE_URL}/editCategory/{$category->id}">   Editar </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="{BASE_URL}/deleteCategory/{$category->id}">   Eliminar </a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>      

<form action="{BASE_URL}/postCategory" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Agregar categoría</label>
                <input name="name" type="text" class="form-control" >
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>


<div >
    <h3>{$titleAdmin}</h3>
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
            {foreach from=$products item=$product }
                    <tr>
                        <th scope="row">{$product->category|upper}</th>
                        <td>{$product->name|capitalize}</td>
                        <td>{$product->price}</td>
                        <td>{$product->size}</td>
                        <td><a class="btn btn-success" href="{BASE_URL}/editProductForm/{$product->id}">Editar</a> </td>
                        <td><a class="btn btn-success" href="{BASE_URL}/deleteProduct/{$product->id}">Eliminar</a> </td>

                        <input type="hidden" name="id"  value={$product->id} />
                    </tr>
            {/foreach}     
            </tbody>
        </table> 
    </div>
</div>

<form action="{BASE_URL}/postProduct" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
        <h5>Agregar productos</h5>
            <div class="form-group">
                <select class="form-select" name="category_id">
                    {foreach from=$categories item=$category }
                        <option value="{$category->id}">{$category->name|upper}</option>
                    {/foreach}
                </select>
                <label for="name">Producto</label>
                <input name="name" type="text" class="form-control" >
                <select class="form-select" name="size">
                        {foreach from=$sizes item=$size }
                            <option value="{$size}">{$size|upper}</option>
                        {/foreach}
                </select>
                <label for="price">Precio</label>
                <input name="price" type="text" class="form-control" >
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>


{include file="templates/footer.tpl" assign=name var1=value}