{include file="templates/header.tpl"}



<div class="container">
    <div >
        <h3>ADMIN - {$title}</h3>
        <a class="btn btn-primary" href="{BASE_URL}/admin/users/new">Nuevo</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$users item=$user}
                <tr>
                    <td>{$user->id}</td>
                    <td>{$user->email|upper}</td>
                    <td>
                        <a class="btn btn-primary" href="{BASE_URL}/admin/users/show/{$user->id}">Ver</a>
                        <a class="btn btn-primary" href="{BASE_URL}/admin/users/edit/{$user->id}">Editar</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>

    </div>
</div>

{include file="templates/footer.tpl" assign=name var1=value}
