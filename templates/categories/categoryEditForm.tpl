
{include file="templates/header.tpl"}

    <form action="{BASE_URL}/postCategory" method="POST" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Modificar categoría</label>
                    <label for="name">Categoria</label>
                    <input name="name" type="text" class="form-control" value={$categories->name}>
                    <input type="hidden" name="id"  value={$categories->id} />
                </div>
            </div>
        </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>

{include file="templates/footer.tpl" assign=name var1=value}