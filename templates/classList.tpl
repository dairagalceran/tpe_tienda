{include file="templates/header.tpl"}

<div class="container">
    <div class="list-group">
        <table>
            <tr>
                <th class="list-group-item list-group-item-action list-group-item-success">{$titulo|upper} </th>
            </tr>             
            <tbody>
                {foreach from= $categorias item=$class}
                    <tr>
                        <td><a href="" class="list-group-item list-group-item-action list-group-item-success"> {$class->categorias|upper} </a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>



</div>

{include file="templates/footer.tpl" assign=name var1=value}
