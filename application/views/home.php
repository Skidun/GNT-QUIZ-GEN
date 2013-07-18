<?php $this->template->menu('home'); ?>
		
		<div id="conteudo">
			<div id="wrap">
				<div class="conteudo-box">
					<table class="box">
						<thead>
							<tr>
								<td>todos os quizes</td>
							</tr>
						</thead>
						<tbody>
							<?php echo $quizes;?>
						</tbody>
						<tfoot>
							<tr>
								<td>
									<span class="carregar-mais" ><?php  echo $html_paginacao;?></span>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>