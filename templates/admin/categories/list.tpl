{include file="templates/header.tpl"}



<div class="container">
    <div >
        <h3>ADMIN - {$title}</h3>
        <a class="btn btn-primary" href="admin/categories/new">Nueva</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
            </tr>
            </thead>
            <tbody>
            {foreach from= $categories item=$category}
                <tr>
                    <td>{$category->id}</td>
                    <td>{$category->name|upper}</td>
                    <td>
                        <a class="btn btn-primary" href="admin/categories/show/{$category->id}">Ver</a>
                        <a class="btn btn-primary" href="admin/categories/edit/{$category->id}">Editar</a>
                        <a class="btn btn-danger" href="admin/categories/delete/{$category->id}">Eliminar</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>

    </div>
</div>

{include file="templates/footer.tpl" assign=name var1=value}
