	<div id="topo-dois">
			<div id="wrap">			
				<div class="logo"></div>
				<div class="descricao">
					<p><?php echo $titulo;?></p>
					<span>tipo: <?php echo $tipo?></span>
					<input type="hidden" id="id_quiz" value="<?php echo $id;?>" /> 
				</div>
				<a class="salvar-e-sair" href="<?php echo site_url('quiz_tipo/save');?>"></a>
			</div>
		</div>