
{include file="templates/header.tpl"}

    <form action="postCategory" method="POST" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Modificar categoría</label>
                    <label for="categoria">Categoria</label>
                    <input name="categoria" type="text" class="form-control" value={$categoria->categoria}>
                    <input type="hidden" name="id_categoria"  value={$categoria->id_categoria} />
                </div>
            </div>
        </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>

{include file="templates/footer.tpl" assign=name var1=value}