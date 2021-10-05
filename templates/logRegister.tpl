{include file="templates/header.tpl"}

<form action= "register" class="row g-3 needs-validation" novalidate>
    <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Username</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"></span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            </div>
    </div>
    <div class="col-md-6">
        <label for="validationCustomEmail" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="validationCustomEmail" required>
            <div class="invalid-feedback">
            Please provide a valid city.
            </div>
    </div>
    <div class="col-md-3">
        <label for="validationCustomPassword" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="validationCustomPassword" required>
            <div class="invalid-feedback">
            Please provide a valid zip.
            </div>
    </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

{include file="templates/footer.tpl" assign=name var1=value}
