{include file="templates/header.tpl"}



<div class="container">
    <div>
        <h3>REGISTRAR USUARIO</h3>
        <form action="{BASE_URL}/users/register" method="POST" class="my-4">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" >
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Registrarme</button>
        </form>
    </div>
</div>




{include file="templates/footer.tpl" assign=name var1=value}
