<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion de Series</title>
</head>
<body>
    <h1>Administracion de series</h1>
    <form action="{{ route('guardar_configuracion') }}" method="POST">
        @csrf 
        <div class="form-group">
            <label for="servidor">Servidor/Host:</label>
            <input type="text" name="servidor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="puerto">Puerto:</label>
            <input type="text" name="puerto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="base_datos">Base de Datos:</label>
            <input type="text" name="base_datos" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Conectar</button>
    </form>
</body>
</html>