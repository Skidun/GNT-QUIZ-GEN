<?php $this->template->menu('create_quiz'); ?>
		<div id="conteudo">
			<div id="wrap">
				<?php echo form_open('salvar-quiz',array('id'=>'form-quiz-create', 'name'=> 'form_quiz_create'));?>
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
									<div class="input"><input type="text" name="titulo" id="tituloQuiz" value="" size="" /></div>
									<?php echo '<div class="enviada-erro" style="display:block;">'.form_error('titulo').'</div>';?>
									<label for="tipo">Tipo:</label>
									<select name="tipo" class="default" id="tipoQuiz">
										<option value="perfil">Perfil</option>
										<option value="certo-ou-errado">Certo ou Errado</option>
										<option value="resposta_certa">Várias respostas certas</option>
										<option value="apenas_uma">Apenas uma resposta correta</option>
									</select>
									</div>
								</td>
							</tr>
						</tbody>
					</table>					
				</div>
				<input type="submit" name="criar-quiz" class="criar-quiz" id="criar-quiz" value="" />
				<?php echo form_close();?>
			</div>
		</div>