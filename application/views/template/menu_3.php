<?php 
	$id   = $this->uri->segment(3);
	$controlador = $this->uri->segment(1);
?>
<div class="nav-perfil">
	<a class="anterior" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>"></a>
	<a class="perfis <?php if($controlador == 'quiz_tipo') echo "ativo";?>" href="<?php echo site_url('quiz_tipo/'.$tipo.'/'.$id);?>"></a>
	<a class="perguntas <?php if($controlador == 'perguntas') echo "ativo";?>" href="<?php echo site_url('perguntas/'.$tipo.'/'.$id);?>"></a>
	<a class="customizacao" href="#"></a>
	<a class="visualizacao" href="#"></a>
	<a class="proximo" href="<?php echo site_url('visualizar/'.$tipo.'/'.$id);?>"></a>
</div>