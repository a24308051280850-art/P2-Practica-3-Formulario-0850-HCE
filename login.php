<?php
include 'conexion.php';

$mensaje = "";

// 1. PROCESAR REGISTRO
if (isset($_POST['registro'])) {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

    // Verificar si el correo ya existe
    $checkCorreo = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $checkCorreo->bind_param("s", $correo);
    $checkCorreo->execute();
    $checkCorreo->store_result();

    if ($checkCorreo->num_rows > 0) {
        $mensaje = "✖ El correo ya está registrado en la base de datos.";
    } else {
        // Insertar en la base de datos
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $password);

        if ($stmt->execute()) {
            $mensaje = "✔ Cuenta registrada exitosamente en XAMPP.";
        } else {
            $mensaje = "✖ Error al registrar la cuenta.";
        }
        $stmt->close();
    }
    $checkCorreo->close();
}

// 2. PROCESAR INICIO DE SESIÓN
if (isset($_POST['login'])) {
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT nombre, password FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $mensaje = "✔ ¡Bienvenido, " . htmlspecialchars($row['nombre']) . "! Sesión iniciada correctamente.";
        } else {
            $mensaje = "✖ Contraseña incorrecta.";
        }
    } else {
        $mensaje = "✖ El correo no está registrado.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta con XAMPP / MySQL - Béisbol Express</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ENCABEZADO */
        .header {
            background-color: #0d233a;
            color: white;
            text-align: center;
            padding: 25px 15px 15px 15px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        /* BARRA DE NAVEGACIÓN */
        .navbar {
            background-color: #1a365d;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 10px 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-weight: bold;
        }

        .navbar a:hover, .navbar a.activo {
            background-color: #d32f2f;
        }

        /* CONTENEDOR DE FORMULARIOS */
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 0 15px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            flex: 1;
            width: 100%;
        }

        .box {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            flex: 1;
            min-width: 280px;
        }

        h2 {
            color: #0d233a;
            margin-bottom: 15px;
            font-size: 20px;
            border-bottom: 2px solid #d32f2f;
            padding-bottom: 5px;
        }

        .alerta {
            width: 100%;
            background-color: #e3f2fd;
            border: 1px solid #90caf9;
            color: #0d47a1;
            padding: 12px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* CAMPOS BÁSICOS */
        .campo {
            margin-bottom: 15px;
        }

        .campo label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .campo input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #d32f2f;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #b71c1c;
        }

        /* FOOTER */
        .footer {
            background-color: #0d233a;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- ENCABEZADO -->
    <header class="header">
        <h1>Grand Slam</h1>
        <p>La mejor tienda en articulos de beisbol </p>
    </header>

    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar">
        <a href="index.html">Inicio</a>
        <a href="bats.html">Bats</a>
        <a href="guantes.html">Guantes</a>
        <a href="cascos.html">Cascos</a>
        <a href="guanteletas.html">Guanteletas</a>
        <a href="protecciones.html">Protecciones</a>
        <a href="login.php" class="activo">Cuenta</a>
    </nav>

    <main class="container">

        <?php if (!empty($mensaje)): ?>
            <div class="alerta"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <!-- FORMULARIO 1: INICIAR SESIÓN -->
        <div class="box">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST">
                <div class="campo">
                    <label for="login-email">Correo:</label>
                    <input type="email" name="correo" id="login-email" required>
                </div>
                <div class="campo">
                    <label for="login-pass">Contraseña:</label>
                    <input type="password" name="password" id="login-pass" required>
                </div>
                <button type="submit" name="login">Ingresar</button>
            </form>
        </div>

        <!-- FORMULARIO 2: REGISTRARSE -->
        <div class="box">
            <h2>Registrarse</h2>
            <form action="login.php" method="POST">
                <div class="campo">
                    <label for="reg-nombre">Nombre:</label>
                    <input type="text" name="nombre" id="reg-nombre" required>
                </div>
                <div class="campo">
                    <label for="reg-email">Correo:</label>
                    <input type="email" name="correo" id="reg-email" required>
                </div>
                <div class="campo">
                    <label for="reg-pass">Contraseña:</label>
                    <input type="password" name="password" id="reg-pass" required>
                </div>
                <button type="submit" name="registro">Crear Cuenta</button>
            </form>
        </div>

    </main>

    <!-- PIE DE PÁGINA -->
    <footer class="footer">
        <p>Hernandez Cuellar Emiliano|5-J|0850</p>
    </footer>

</body>
</html>