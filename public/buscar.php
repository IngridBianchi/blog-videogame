<?php
	if(!isset($_POST['busqueda'])){
		header("Location: index.php");
	}
?>
<?php require_once __DIR__ . '/../includes/cabecera.php'; ?>
<?php require_once __DIR__ . '/../includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">

	<h1>Busqueda: <?=$_POST['busqueda']?></h1>
	
	<?php 
		$entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);

		if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
			while($entrada = mysqli_fetch_assoc($entradas)):
	?>
				<article class="entrada">
					<a href="entrada.php?id=<?=$entrada['id']?>">
						<h2><?=$entrada['titulo']?></h2>
						<span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
						<p>
							<?=substr($entrada['descripcion'], 0, 180)."..."?>
						</p>
					</a>
				</article>
	<?php
			endwhile;
		else:
	?>
		<div class="alerta">No hay entradas en esta categoría</div>
	<?php endif; ?>
</div> <!--fin principal-->
			
<?php require_once __DIR__ . '/../includes/pie.php'; ?>