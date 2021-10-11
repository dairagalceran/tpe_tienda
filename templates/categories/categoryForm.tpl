{include file="templates/header.tpl"}


<div class="container ">
    <div>
    <h3><h3>
    <div class="table mt-5 col-md-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class=" list-group-item-success"> # </th>
                    <th scope="col" class=" list-group-item-secondary "> Nombre</th>
                </tr>  
            </thead>           
            <tbody>
                {foreach from= $categories item=$category}
                    <tr>
                        <td> <a class="list-group-item list-group-item-action list-group-item-success"> {$i++} </a></td>
                        <td> <a class="list-group-item list-group-item-action list-group-item-success"> {$category->name|upper} </a></td>
                        <td> <a class="btn btn-danger  list-group-item list-group-item-action list-group-item-secondary" href="{BASE_URL}/productsCategory/{$category->id}"> Ver</a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>      


{include file="templates/footer.tpl" assign=name var1=value}