
{include file="templates/header.tpl"}

<form action="postProduct" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Modificar producto </label>
                <label for="categoria">Categoria</label>
                <input name="categoria" type="text" class="form-control" value={$product->categoria}>
                <label for="producto">Producto</label>
                <input name="producto" type="text" class="form-control" value={$product->nombre_producto}>
                <label for="talle">Talle</label>
                <input name="talle" type="text" class="form-control" value={$product->talle}>
                <label for="precio">Precio</label>
                <input name="precio" type="text" class="form-control" value={$product->precio}>
                <input type="hidden" name="id_categoria"  value={$producto->id_producto} />
            </div>
        </div>
    </div>
<button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>

{include file="templates/footer.tpl" assign=name var1=value}

