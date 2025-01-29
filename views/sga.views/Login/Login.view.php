<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>  <link
      rel="shortcut icon"
      href="assets/sga/img/icoon.ico"
      type="image/x-icon"
    />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 0;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .bg-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('https://source.unsplash.com/random');
            background-size: cover;
            filter: blur(5px);
        }
    </style>
</head>

<body>
    <div class="bg-image"></div>
    <div class="container">
        <h1>Login</h1>
        <form action="?p=sga&c=Login&a=Login" method="post">
            <label for="usuario">Nombre de Usuario</label>
            <input type="text" id="usuario" name="usuario" required placeholder="Ingrese el usuario" value="admin" autocomplete="off">
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" required placeholder="Contraseña" value="123" autocomplete="off">
            <input type="submit" value="Acceder">
            <a href="index.php" type="sumbit">VOLVER</a>
        </form>
    </div>
</body>

</html>