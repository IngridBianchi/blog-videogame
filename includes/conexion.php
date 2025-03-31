<?php
// Conexión
$servidor = 'db';
$usuario = 'root';
$password = 'mi_nueva_contrasea';
$basededatos = 'blog_master';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}

