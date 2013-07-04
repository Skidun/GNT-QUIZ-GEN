<?php require_once('header.php'); ?>

		
		<?php require_once('topo-um.php'); ?>
		
		<div id="conteudo">
			<div id="wrap">
				<div class="conteudo-box usuarios">
					<table class="box">
						<thead>
							<tr>
								<td>novo quiz</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>Titulo:</p>
									<div class="input"><input type="text" name="nome" value="Nome" /></div>
									<p>Tipo:</p>
									<select class="default">
										<option value="0">Apenas uma resposta correta</option>
										<option value="1">Apenas uma resposta correta</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<button class="btn-criar-quiz" type="submit"></button>
			</div>
		</div>
		

<?php require_once('footer.php'); ?>