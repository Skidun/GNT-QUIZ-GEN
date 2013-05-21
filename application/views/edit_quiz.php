<?php $this->template->menu('create_quiz'); ?>
		<div id="conteudo">
			<div id="wrap">
				<?php echo form_open('alterar-quiz', array('id'=>'form-quiz-create', 'name'=> 'form_quiz_create'));?>
				<div class="conteudo-box">
					<table class="novo">
						<thead>
							<tr>
								<td>Editar Quiz: <?php echo $titulo;?></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="novo-inner">
									<label for="titulo">Título:</label>
									<div class="input"><input type="text" name="titulo" id="tituloQuiz" value="<?php echo $titulo;?>" size="" /></div>
									<?php echo '<div class="enviada-erro" style="display:block;">'.form_error('titulo').'</div>';?>
									<?php 
										echo form_hidden('id', $id);
									?>
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