{include file="templates/header.tpl"}


<div class="container ">
    <div class="table mt-5 col-md-5">
        <table>
            <tr>
                <th scope="col" class=" list-group-item-success">{$titulo|upper} </th>
                <th scope="col" class=" list-group-item-secondary ">Editar</th>
                <th scope="col" class="list-group-item list-group-item-secondary ">Eliminar</th>
            </tr>             
            <tbody>
                {foreach from= $categories item=$id_categoria}
                    <tr>
                        <td> <a class="list-group-item list-group-item-action list-group-item-success"> {$id_categoria->categoria|upper} </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="editCategory/{$id_categoria->id_categoria}">   Editar </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="deleteCategory/{$id_categoria->id_categoria}">   Eliminar </a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>      

<form action="formCategory" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Agregar/Modificar categoría</label>
                <input name="categoria" type="text" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>

{include file="templates/footer.tpl" assign=name var1=value}
