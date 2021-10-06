<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tiendaMIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="">tiendaMIA</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarText" class="collapse navbar-collapse" >
                    <ul class="navbar-nav  ms-5 ">
                        <li class="nav-item"> <a class="nav-link active"  href="">Home</a></li>
                        <li class="nav-item"><a class="nav-link active"  href="{BASE_URL}/categories">Categorias</a></li>
                        {if $sessionUser|default:false && $sessionUser['is_admin'] }
                        <li class="nav-item"><a class="nav-link active"  href="{BASE_URL}/admin/products">Admin</a> </li>
                        {/if}
                    </ul>
                </div>
        
                <div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            {if !$sessionUser|default:false }
                            <a class="nav-link active" aria-current="page" href="{BASE_URL}/users/login">Iniciar sesión</a>
                            {else}
                            <a class="nav-link active" aria-current="page" href="{BASE_URL}/users/logout">Salir de {$sessionUser['email']}</a>
                            {/if}
                        </li>
                    </ul>
                    {if !$sessionUser|default:false }
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{BASE_URL}/users/register">Registrarse</a>
                        </li>
                    </ul>
                    {/if}
                </div>
            </div>
        </nav>
  
    </header>
    
    <!-- inicio de contenido principal -->
    <div class="container">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
