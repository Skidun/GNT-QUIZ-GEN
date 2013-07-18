<?php 
	$id   = $this->uri->segment(3);
	$controlador = $this->uri->segment(1);
?>
<div class="nav-perfil">
	<?php 
		switch ($tipo) {
			case 'perfil':
	?>
				<div class="anterior" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>"></div>
				<a class="perfis <?php if($controlador == 'quiz_tipo') echo "ativo";?>" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="perguntas <?php if($controlador == 'perguntas') echo "ativo";?>" href="<?php echo site_url('perguntas/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="customizacao <?php if($controlador == 'customizacao') echo "ativo";?>" href="<?php echo site_url('customizacao/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="visualizacao <?php if($controlador == 'visualizacao') echo "ativo";?>" href="<?php echo site_url('visualizacao/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<div class="proximo" href="<?php echo site_url('visualizacao/'.$tipo.'/'.$id);?>"></div>
	<?php 
			break;
			default:
	?>
				<div class="anterior" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>"></div>
				<a class="perguntas <?php if($controlador == 'perguntas') echo "ativo";?>" href="<?php echo site_url('perguntas/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="faixasClassificacao <?php if($controlador == 'quiz_tipo') echo "ativo";?>" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="customizacao <?php if($controlador == 'customizacao') echo "ativo";?>" href="<?php echo site_url('customizacao/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<a class="visualizacao <?php if($controlador == 'visualizacao') echo "ativo";?>" href="<?php echo site_url('visualizacao/'.$tipo.'/'.$id);?>" rel="<?php echo $controlador;?>"></a>
				<div class="proximo" href="<?php echo site_url('visualizacao/'.$tipo.'/'.$id);?>"></div>
	<?php 
			break;
	?>
	<?php } ?>
</div>