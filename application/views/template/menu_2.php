	<div id="topo-dois">
			<div id="wrap">			
				<div class="logo"></div>
				<div class="descricao">
					<p><?php echo $titulo;?></p>
					<span>tipo: <?php echo $tipo?></span>
					<input type="hidden" id="id_quiz" name="id_quiz" value="<?php echo $id;?>" /> 
					 
				</div>
				<a class="salvar-e-sair" id="salvar-e-sair-<?php echo $this->uri->segment(1);?>" rel="<?php echo $tipo; ?>" href="<?php echo base_url();?>"></a>
			</div>
		</div>