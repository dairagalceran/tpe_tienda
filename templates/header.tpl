<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tiendaMIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="">tiendaMIA</a>
                <div id="navbarText" class="collapse navbar-collapse" >
                    <ul class="navbar-nav  ms-5 ">
                        <li class="nav-item"><a class="nav-link active"  href="">Catálogo</a> </li>
                        <li class="nav-item"><a class="nav-link active"  href="tpe_tienda/category">Categorias</a></li>
                        <li class="nav-item"><a class="nav-link active"  href="{BASE_URL}/admin">Administrador</a> </li>
                    </ul>
                </div>
                
                <div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            {if isset($smarty.session.USER_ID)} 
                                <a class="nav-link active" aria-current="page" href="{BASE_URL}/logout">Logout de {$smarty.session.USER_EMAIL}</a>
                            {else}  
                                <a class="nav-link active" aria-current="page" href="{BASE_URL}/login">Iniciar sesión</a>
                            {/if}
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"> 
                            <a class="nav-link active" aria-current="page" href="{BASE_URL}/registerForm">Registrarse</a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText" >
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
  
    </header>

    <div class="container">
    
