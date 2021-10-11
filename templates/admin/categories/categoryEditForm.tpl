{include file="templates/header.tpl"}

    <form action="{BASE_URL}/postCategory" method="POST" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Modificar categoría</label>
                    <label for="name">Categoria</label>
                    <input name="name" type="text" class="form-control" value={$category->name}>
                    <input type="hidden" name="id"  value={$category->id}>
                </div>
            </div>
        </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar Modificaciones</button>
</form>

{include file="templates/footer.tpl" assign=name var1=value}