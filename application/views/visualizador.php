<?php $this->template->menu2('visualizador'); ?>
<div id="conteudo">
			<div id="wrap">
			
				<?php $this->template->menu3('visualizador');?>
			
				<div id="perfilVisualizacao" class="item">
						
						<!--A altura do iframe é gerada dinamicamente, de acordo com a altura final do quiz-->
						<iframe class="janela" src="<?php echo base_url();?>quiz/show_quiz/<?php echo $id;?>" width="620" height="" scrolling="no" frameborder="0"></iframe>
						
						<!--Passa o código escondido numa textarea, para exibir como texto na textarea de baixo-->
						<textarea name="quizCode" id="quizCode" cols="" rows="">
							<iframe src="<?php echo base_url();?>quiz/show_quiz/<?php echo $id;?>" width="620" height="400" scrolling="no" frameborder="0"></iframe>
						</textarea>
						
						<div class="sidebar">
							<p>Código para embutir na página:</p>
							<!--Gerador de Código-->
							<div class="textarea"><textarea cols="" rows="" id="codigo" name="codigo" readonly></textarea></div>
							<a href="#" class="copiarCodigo" title="copiar código" rel="link-interno"></a>
						</div>
					
				</div>
		
			</div>
		</div>