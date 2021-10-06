{include file="templates/header.tpl"}



<div class="container">
    <div>
        <h3>ADMIN</h3>
        <form action="{BASE_URL}/admin/products/{if $product != null}edit{else}new{/if}" method="POST" class="my-4">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="name" type="text" class="form-control" value="{if $product != null}{$product->name}{else}{/if}">
                        <label>Precio</label>
                        <input name="price" type="number" class="form-control" value="{if $product != null}{$product->price}{else}{/if}">
                        <label>Talle</label>
                        <select class="form-select" name="size">
                            {foreach from=$sizes item=$size }
                                <option value="$size" {if $product != null && $product->size === $size}selected{else}{/if}>{$size|upper}</option>
                            {/foreach}
                        </select>
                        <label>Categoria</label>
                        <select class="form-select" name="category_id">
                            {foreach from=$categories item=$category }
                                <option value="{$category->id}" {if $product != null && $product->category_id === $category->id}selected{else}{/if}>{$category->name|upper}</option>
                            {/foreach}
                        </select>
                        <input name="id" type="hidden" value="{if $product != null}{$product->id}{else}{/if}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        </form>
    </div>
</div>




{include file="templates/footer.tpl" assign=name var1=value}
