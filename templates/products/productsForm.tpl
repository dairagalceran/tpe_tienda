
{include file="templates/header.tpl"}

<form action="{BASE_URL}/postProduct" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Modificar producto </label>
                <label for="category">Categoria</label>
                <input name="category" type="text" class="form-control" value={$product->category}>
                <label for="product">Producto</label>
                <input name="product" type="text" class="form-control" value={$product->name}>
                <label for="size">Talle</label>
                <input name="size" type="text" class="form-control" value={$product->size}>
                <label for="price">Precio</label>
                <input name="price" type="text" class="form-control" value={$product->price}>
                <input type="hidden" name="id"  value={$product->id} />
            </div>
        </div>
    </div>
<button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>

{include file="templates/footer.tpl" assign=name var1=value}

