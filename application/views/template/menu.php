<div id="topo">
			<div id="wrap">			
			<nav>
				<ul class="nav1">
					<li><a class="logo-link" href="<?php echo base_url();?>"><div class="logo"></div></a></li>
					<li><a href="#">quizes</a>
						<ul class="nav2">
							<li><a href="<?php echo site_url('visualizar-todos-quizes');?>">todos os quizes</a></li>
							<li><a href="<?php echo site_url('cadastrar-novo-quiz');?>">novo quiz</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url();?>todos-os-usuarios">usuários</a>
						<ul class="nav2">
							<li><a href="<?php echo base_url();?>todos-os-usuarios">todos os usuários</a></li>
							<li><a href="<?php echo base_url();?>cadastrar-novo-usuario">novo usuário</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<ul class="menu">
				<li><a class="novo-quiz" href="<?php echo site_url('cadastrar-novo-quiz');?>"></a></li>
				<li><a class="sair" href="<?php echo base_url();?>login/logout">sair</a></li>
			</ul>
			</div>
		</div>