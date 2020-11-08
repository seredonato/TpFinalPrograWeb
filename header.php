<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="img/logoheader.png"/>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>TRANSAFF</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand">
            <img src="img/logoheader.png" class="d-inline-block align-top logonav" alt="TRANSAFF" loading="lazy">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Transportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?#contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?#quienes">¿Quiénes Somos?</a>
                </li>
            </ul>
        </div>
        <div class="d-flex justify-content-end divloginregistro">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal" type="button">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./registro.php">Registro</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center"><br>
                    <img src="img/logoPerfil.png" alt="Avatar" style="width:25%; height: auto;"
                         class="rounded-circle mb-4">
                </div>
                <form method="POST" action="#">
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name=email placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name=password
                               placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>