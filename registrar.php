<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Portal de Inicio de Sesión</title>
		<link href="../../assets/img/logo.png" rel="icon">
		<link href="../../assets/img/logo-grande.png" rel="apple-touch-icon">
		<link rel="stylesheet" href="login.css">
		<style>
        input::placeholder {
            color: #FFFFFF;
        }
    	</style>
	</head>
	<body>
		<div class="login-container">
			<form method="post" action="registrar.php" name="registerForm">
				<h2>Registrar</h2>
				<img src="../../assets/img/logo-grande.png" alt="Logo">
				<input style="color: #EBEFF1;" type="text" name="txtusuario" placeholder="&#128273; Ingresar usuario" required>
				<input style="color: #EBEFF1;" type="password" name="txtpassword" placeholder="&#128274; Ingresar Contraseña" required>
				<input type="submit" value="Registrar" name="btnregistrar">
				<a href="index.php">Iniciar sesión</a>
			</form>
		</div>
	</body>
</html>
<?php
	include('conexion.php');
	session_start();
	if (isset($_SESSION['nombredelusuario'])) {
		header('Location: listar.php');
		exit();
	}
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnregistrar"])) {
		$nombre = mysqli_real_escape_string($conn, $_POST["txtusuario"]);
		$pass = mysqli_real_escape_string($conn, $_POST["txtpassword"]);
		$sqlgrabar = "INSERT INTO poject_23_login (usuario, password) VALUES ('$nombre', '$pass')";
		if (mysqli_query($conn, $sqlgrabar)) {
			echo "<script>alert('Usuario registrado con éxito: $nombre'); window.location='index.php';</script>";
		} else {
			echo "Error: " . $sqlgrabar . "<br>" . mysqli_error($conn);
		}
	}
?>