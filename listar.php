<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Portal de Inicio de Sesión</title>
		<link href="../../assets/img/logo.png" rel="icon">
		<link href="../../assets/img/logo-grande.png" rel="apple-touch-icon">
		<style>
			body {
				margin: 0;
				padding: 0;
				background: url(fondo.png) no-repeat center center fixed;
				background-size: cover;
				font-family: 'Arial', sans-serif;
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100vh;
			}
			.login-container {
				background-color: rgba(58, 186, 241, 0.9);
				padding: 20px;
				border-radius: 10px;
				box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
				text-align: center;
				width: 80%;
				max-width: 800px;
			}
			h1 {
				background-color: #33A8DB;
				color: white;
				margin: 0;
				padding: 15px;
				border-radius: 10px 10px 0 0;
				font-size: 24px;
			}
			table {
				width: 100%;
				border-collapse: collapse;
				margin: 20px 0;
				background-color: white;
				border-radius: 10px;
				overflow: hidden;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			}
			.user-table {
				width: 100%;
				border-collapse: collapse;
				margin: 20px 0;
				background-color: white;
				border-radius: 10px;
				overflow: hidden;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			}
			.user-table th,
			.user-table td {
				padding: 12px;
				text-align: center;
				border-bottom: 1px solid #ddd;
			}
			.user-table th {
				background-color: #33A8DB;
				color: white;
			}
			.user-table tr:nth-child(even) {
				background-color: #f3f3f3;
			}
			.welcome-msg {
				background-color: #33A8DB;
				color: white;
				padding: 15px;
				font-size: 18px;
				border-radius: 10px 10px 0 0;
			}
			.table-title {
				background-color: #33A8DB;
				color: white;
				padding: 15px;
				font-size: 24px;
				border-radius: 10px 10px 0 0;
			}
			input[type="submit"] {
				width: calc(100% - 20px);
				padding: 10px;
				margin: 20px 0;
				background-color: #f3f3f3;
				color: #333;
				font-weight: bold;
				border: none;
				border-radius: 20px;
				cursor: pointer;
				transition: background-color 0.3s ease;
			}
			input[type="submit"]:hover {
				background-color: #ddd;
			}
			label {
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<div class="login-container">
			<table class="user-table">
				<?php
				include('conexion.php');
				session_start();
				if (isset($_SESSION['nombredelusuario'])) {
					$usuarioingresado = $_SESSION['nombredelusuario'];
					echo "<tr><td colspan='2' class='welcome-msg'>Bienvenido: $usuarioingresado</td></tr>";
				} else {
					header('location: index.php');
				}

				if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btncerrar'])) {
					session_destroy();
					header('location: index.php');
				}
				?>
				<form method="POST">
					<tr><td colspan='2' align="center"><input type="submit" value="Cerrar sesión" name="btncerrar" /></td></tr>
				</form>
				<tr><td colspan="2" class="table-title">Listado de usuarios</td></tr>
				<tr>
					<th>Usuario</th>
					<th>Contraseña</th>
				</tr>
				<?php 
				$sql = "SELECT * FROM poject_23_login";
				$result = mysqli_query($conn, $sql);
				while ($mostrar = mysqli_fetch_array($result)) {
					echo "<tr><td>{$mostrar['usuario']}</td><td>{$mostrar['password']}</td></tr>";
				}
				?>
			</table>
		</div>
	</body>
</html>