<?php require_once __DIR__ . '/../includes/conexion.php'; ?>
<?php require_once __DIR__ . '/../includes/helpers.php'; ?>
<?php
	$entrada_actual = conseguirEntrada($db, $_GET['id']);

	if(!isset($entrada_actual['id'])){
		header("Location: index.php");
	}
?>
<?php require_once __DIR__ . '/../includes/cabecera.php'; ?>
<?php require_once __DIR__ . '/../includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">

	<h1><?=$entrada_actual['titulo']?></h1>
	
	<a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
		<h2><?=$entrada_actual['categoria']?></h2>
	</a>
	<h4><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario'] ?></h4>
	<p>
		<?=$entrada_actual['descripcion']?>
	</p>
	
	<?php if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']): ?>
		<br/>	
		<a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-verde">Editar entrada</a>
		<a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton">Eliminar entrada</a>
	<?php endif; ?>
	
</div> <!--fin principal-->
			
<?php require_once __DIR__ . '/../includes/pie.php'; ?>