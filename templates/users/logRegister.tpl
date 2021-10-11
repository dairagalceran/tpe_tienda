{include file="templates/header.tpl"}

<div class="mt-5 w-25 mx-auto">
    <form method="POST"  action= "{BASE_URL}/register" class="row g-3 needs-validation" novalidate>
        <h4> Registrarse</h4>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required class="form-control" id="email"  aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" required class="form-control" id="password" name="password">
        </div>
            {if $error} 
                <div class="alert alert-danger mt-4">
                    {$error}
                </div>
            {/if}
        <button class="btn btn-primary" type="submit">Registrarse</button>
    </form>
</div>

{include file="templates/footer.tpl" assign=name var1=value}