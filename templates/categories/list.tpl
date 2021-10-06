{include file="templates/header.tpl"}

<div class="container">
    <div >
        <h3>{$title}</h3>
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
                        <a class="btn btn-primary" href="{BASE_URL}/categories/show/{$category->id}">Ver</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>

    </div>
</div>


{include file="templates/footer.tpl" assign=name var1=value}
