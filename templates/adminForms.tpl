{include file="templates/header.tpl"}

<div class="container ">
    <div class="table mt-5 col-md-5">
        <table>
            <tr>
                <th scope="col" class=" list-group-item-success">{$titulo|upper} </th>
                <th scope="col" class="list-group-item list-group-item-secondary ">Encuentra lo que estás buscando...</th>
            </tr>             
            <tbody>
                {foreach from= $categories item=$categoria}
                    <tr>

                        <td> <a class="list-group-item list-group-item-action list-group-item-success"> {$categoria->categoria|upper} </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="editCategory/{$categoria->id_categoria}">   Editar </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="deleteCategory/{$categoria->id_categoria}">   Eliminar </a></td>

                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="itemsCategory/{$categoria->id_categoria}">  Mostrar </a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>      


{include file="templates/footer.tpl" assign=name var1=value}
