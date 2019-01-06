<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "plantecerto";

	//Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
mysqli_set_charset($conn, "utf8");
?>
