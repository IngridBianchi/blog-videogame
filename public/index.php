<?php require_once __DIR__ . '/../includes/cabecera.php'; ?>
		
<?php require_once __DIR__ . '/../includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Ultimas entradas</h1>
	
	<?php 
		$entradas = conseguirEntradas($db, true);
		if(!empty($entradas)):
			while($entrada = mysqli_fetch_assoc($entradas)):
	?>
				<article class="entrada">
					<a href="/public/entrada.php?id=<?=$entrada['id']?>">
						<h2><?=$entrada['titulo']?></h2>
						<span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
						<p>
							<?=substr($entrada['descripcion'], 0, 180)."..."?>
						</p>
					</a>
				</article>
	<?php
			endwhile;
		endif;
	?>

	<div id="ver-todas">
		<a href="entradas.php">Ver todas las entradas</a>
	</div>
</div> <!--fin principal-->
			
<?php require_once __DIR__ . '/../includes/pie.php'; ?>