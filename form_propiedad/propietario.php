<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Propiedad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body onLoad="limpiarform">
    <div class="main-container">
        <header class="main-header">
            <div class="img-logo">
                <a href="../index.php"><img src="../imagenes/UniDep.jpg" alt=""></a>
            </div>
        </header>

    </div>    
        <div style="width: 50%;
        background-color: white;
        padding: 6px;
        border-radius: 7px;
        margin-top: 160px;
        margin-right: auto;
        margin-left: auto;">
        <form name="form-work" class="was-validated formulario" action="crearcodigo.php" id="form2" method="post" enctype="multipart/form-data">
                <div class="col-12 mb-2 mt-2">
                    <label class="form-label" for="rut">Ingresar RUT propietario: </label>
                    <div style="width:175%">
                    <input id= "rut" class=" form-control" type="number" placeholder="Ingrese su RUT" name="rut" required autocomplete="off">
                    </div>
                </div>
                <br><br>
                <div style="width:124%; margin-left:90px">
                <p class="alert alert-warning text-center">Revise que su RUT sea correcto</p>
                </div>
                <div class="w-100 row">
                    <div style="width:124%; margin-left:90px">
                    <input class="btn btn-success" type="submit" name="submit" value="Continuar" id="boton">
                    </div>
                    <input class="btn btn w-75 m-auto" type="reset" value="Reiniciar el formulario">
                </div>
        </form>
        </div>
</body>
</html>