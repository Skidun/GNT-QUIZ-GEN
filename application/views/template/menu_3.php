<?php 
	$id   = $this->uri->segment(3);
	$controlador = $this->uri->segment(1);
?>
<div class="nav-perfil">
	<?php 
		switch ($tipo) {
			case 'perfil':
	?>
				<a class="anterior" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>"></a>
				<a class="perfis <?php if($controlador == 'quiz_tipo') echo "ativo";?>" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="perguntas <?php if($controlador == 'perguntas') echo "ativo";?>" href="<?php echo site_url('perguntas/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="customizacao <?php if($controlador == 'customizacao') echo "ativo";?>" href="<?php echo site_url('customizacao/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="visualizacao <?php if($controlador == 'visualizacao') echo "ativo";?>" href="<?php echo site_url('visualizacao/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="proximo" href="<?php echo site_url('visualizacao/'.$tipo.'/'.$id);?>"></a>
	<?php 
			break;
			default:
	?>
				<a class="anterior" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>"></a>
				<a class="perguntas <?php if($controlador == 'perguntas') echo "ativo";?>" href="<?php echo site_url('perguntas/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="faixasClassificacao <?php if($controlador == 'quiz_tipo') echo "ativo";?>" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="customizacao <?php if($controlador == 'customizacao') echo "ativo";?>" href="<?php echo site_url('customizacao/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="visualizacao <?php if($controlador == 'visualizacao') echo "ativo";?>" href="<?php echo site_url('visualizacao/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="proximo" href="<?php echo site_url('visualizacao/'.$tipo.'/'.$id);?>"></a>
	<?php 
			break;
	?>
	<?php } ?>
</div>