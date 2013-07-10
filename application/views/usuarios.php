<?php $this->template->menu('usuarios');?>
<div id="conteudo">
			<div id="wrap">
				<div class="conteudo-box">
					<table class="box">
						<thead>
							<tr>
								<td>todos os usuários</td>
							</tr>
							<?php if($this->session->flashdata('retorno')):?>
								<tr>
									<td><?php echo $this->session->flashdata('retorno');?></td>
								</tr>
							<?php endif;?>
						</thead>
						<tbody>
							<?php 
								foreach($usuarios as $usuario):
							?>
							<tr>
								<td>
									<div class="texto">
										<p><?php echo $usuario['nome'];?></p>
										<span><?php echo $usuario['email']?></span>
									</div>
									<div class="botoes">
										<a class="editar-usuario" href="editar-usuario/<?php echo $usuario['id'];?>"></a>
										<a class="excluir-usuario" href="remover-usuario/<?php echo $usuario['id'];?>"></a>
									</div>
								</td>
							</tr>
							<?php
								endforeach;
							?>
						</tbody>
						<tfoot>
							<tr>
								<td>
									<a class="carregar-mais-usuarios" href="#">carregar mais usuários</a>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>