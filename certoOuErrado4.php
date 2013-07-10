<?php require_once('header.php'); ?>

		
		<?php require_once('topo-dois.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
			
				<div class="nav-perfil">
					<a class="anterior" href="#"></a>
					<a class="perguntas" href="#"></a>
					<a class="faixasClassificacao" href="#"></a>
					<a class="customizacao" href="#"></a>
					<a class="visualizacao ativo" href="#"></a>
					<a class="proximo" href="#"></a>
				</div>
			
				<div id="perfilVisualizacao" class="item">
						
						<!--A altura do iframe é gerada dinamicamente, de acordo com a altura final do quiz-->
						<iframe class="janela" src="visualizacao.php" width="620" scrolling="no" frameborder="0"></iframe>
						
						<!--Passa o código escondido numa textarea, para exibir como texto na textarea de baixo-->
						<textarea name="quizCode" id="quizCode" cols="" rows="">
							<iframe src="http://skidun.webfactional.com/app/37" width="620" height="400" scrolling="no" frameborder="0"></iframe>
						</textarea>
						
						<div class="sidebar">
							<p>Pré visualizar:</p>
							<select class="default">
								<option value="0">Pergunta 1: Chegou o fim de seman...</option>
								<option value="1">Pergunta 1: Chegou o fim de seman...</option>
							</select>
							<p>Código para embutir na página:</p>
							<!--Gerador de Código-->
							<div class="textarea"><textarea cols="" rows="" id="codigo" name="codigo" readonly></textarea></div>
							<a href="#" class="copiarCodigo" title="copiar código" rel="link-interno"></a>
						</div>
					
				</div>
		
			</div>
		</div>
		

<?php require_once('footer.php'); ?>