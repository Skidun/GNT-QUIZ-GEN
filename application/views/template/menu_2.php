	<div id="topo-dois">
			<div id="wrap">			
				<div class="logo"></div>
				<div class="descricao">
					<?php $id = $this->uri->segment(3)?>
					<p><?php echo $titulo;?></p>
					<span>tipo: <?php echo $tipo?></span>
					<input type="hidden" id="id_quiz" value="<?php echo $id;?>" /> 
				</div>
				<a class="salvar-e-sair" href="<?php echo base_url();?>"></a>
			</div>
		</div>