<?php require_once('header.php'); ?>

		
		<?php require_once('topo-um.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
				<div class="conteudo-box">
					<table class="novo">
						<thead>
							<tr>
								<td>novo quiz</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="novo-inner">
									<label for="titulo">Título:</label>
									<div class="input"><input type="text" name="titulo" value="Que tipo de solteira você é?" size="" /></div>
									<label for="tipo">Tipo:</label>
									<select name="tipo" class="default">
										<option value="perfil">Perfil</option>
										<option value="certo-ou-errado">Certo ou Errado</option>
										<option value="resposta-certa">Resposta Certa</option>
										<option value="apenas-uma">Apenas uma resposta correta</option>
									</select>
									</div>
								</td>
							</tr>
						</tbody>
					</table>					
				</div>
				<a class="criar-quiz" href="#" rel="link-interno" title="criar quiz"></a>
			</div>
		</div>
		

<?php require_once('footer.php'); ?>