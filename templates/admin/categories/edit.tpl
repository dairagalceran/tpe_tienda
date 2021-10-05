{include file="templates/header.tpl"}



<div class="container">
    <div>
        <h3>ADMIN</h3>
        <form action="admin/categories/{if $category != null}edit{else}new{/if}" method="POST" class="my-4">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="name" type="text" class="form-control" value="{if $category != null}{$category->name}{else}{/if}">
                        <input name="id" type="hidden" value="{if $category != null}{$category->id}{else}{/if}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        </form>
    </div>
</div>




{include file="templates/footer.tpl" assign=name var1=value}
