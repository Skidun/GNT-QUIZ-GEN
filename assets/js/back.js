var eventos_back = {

	init: function()
	{
		$('#senha-login, #txt-password,  #txt-password-repeat').focus(function(){
			$(this).val('');
			$(this).attr('type','password');
		});

		$('#senha-login, #txt-password,  #txt-password-repeat').blur(function(){
			var texto = $(this).val();
			if($(this).val() == '' || $(this).val() == 'senha' || $(this).val() == 'repita a senha nova' || $(this).val() == 'senha nova'){
				$(this).attr('type', 'text');
			}
		});
		
		$('#btn-esqueci-senha').click(function(e){
			e.preventDefault();
			var email = $('#email-login-recover').val();

			if(email == 'email'){
				$('.enviada-erro').show().text('Por favor! Informe um e-mail');
				//alert('Email errado');
				return false;
			}else{
				eventos_back.recovery(email);
			}
			
			$('#email-login-recover').focus(function(){
				$('.enviada-erro').hide().text('');
			});

			return false;	
		});
		
		$('#txt-login').blur(function(){
			var validaEmail = /(^[a-z]([a-z_\.]*)@([a-z_\.]*)([.][a-z]{3})$)|(^[a-z]([a-z_\.]*)@([a-z_\.]*)(\.[a-z]{3})(\.[a-z]{2})*$)/i;

			if($(this).val() == 'email'){
				$('.enviada-erro').show().text('Informe seu e-mail');
			}else if(!validaEmail.test($('#txt-login').val())){
				$('.enviada-erro').show().text('Informe um e-mail válido');
			}else{
				$('.enviada-erro').hide().text('');
				$('#bt-reset-senha').removeAttr('disabled');
			}
		});

		$('#txt-password-repeat').blur(function(){
			if($(this).val() != $('#txt-password').val()){
				$('.enviada-erro').show().text('As senhas precisam ser iguais');
				$('#bt-reset-senha').attr('disabled', true);
			}else{
				$('.enviada-erro').hide().text('');
				$('#bt-reset-senha').removeAttr('disabled');
			}
		});
		
		$('#bt-reset-senha').click(function(e){
			e.preventDefault();

			var validaEmail = /(^[a-z]([a-z_\.]*)@([a-z_\.]*)([.][a-z]{3})$)|(^[a-z]([a-z_\.]*)@([a-z_\.]*)(\.[a-z]{3})(\.[a-z]{2})*$)/i;
			var email = $('#txt-login').val(), senha = $('#txt-password').val(), senha_repetida = $('txt-password-repeat').val();

			if(email == 'email' || senha == 'senha nova' || senha_repetida == 'repita a senha nova'){
				$('.enviada-erro').show().text('Preencha todos os campos corretamente');
				return false;
			}else{
				document.form_reset_pass.submit();
			}
		});

		//Tela Criar Quiz
		$('#criar-quiz').click(function(e){
			e.preventDefault();
			eventos_back.valida_quiz();
		});

		$('#tituloQuiz').focus(function(){
			if($(this).val() == 'Preencha esse campo'){
				//$(this).val('');
				$(this).removeAttr('style');
			}
		});

		//Tela todos os Quizes
		$(document).on('click', '#btn-excluir-quiz', function(e){
			e.preventDefault();

			var link = this.href;
			var confirmacao = confirm('Todos os perfis, faixas, perguntas e respostas e configurações associadas serão removidos. Tem certeza que deseja excluir?');

			if(confirmacao){
				location.href=link;
			}

			return false;
		});

		//Botões Salvar e sair
		$('#salvar-e-sair-quiz_tipo').click(function(){
			var url = this.href;
			var tipo = this.rel;
			switch(tipo){
				case 'perfil':
					eventos_back.salva_perfil(url);
				break;
				case 'certo-ou-errado':
					eventos_back.salva_faixa_ce(url);
				break;
				case 'resposta_certa':
					eventos_back.salva_faixa_ce(url);
				break;
				case 'apenas_uma':
					eventos_back.salva_faixa_ce(url);
				break;			
			}
			
			return false;
		});

		$('#salvar-e-sair-perguntas').click(function(){
			var url = this.href;
			var tipo = this.rel;

			switch(tipo){
				case 'perfil':
					eventos_back.salva_perguntas(url);
				break;
				case 'certo-ou-errado':
					eventos_back.salva_perguntas_CE(url);
				break;
				case 'apenas_uma':
					eventos_back.salva_perguntas_CE(url);
				break;
				case 'resposta_certa':
					eventos_back.salva_perguntas_CE(url);
				break;

			}
			
			return false;
		});

		$('#salvar-e-sair-customizacao').click(function(){
			var url = this.href;
			var tipo = this.rel;
			
			eventos_back.salva_customizacao(url);
			
			return false;
		});

		//Menu de navegação
		$('.perfis').on('click', function(e){
			e.preventDefault();
			var url		= this.href;
			var controlador  	= this.rel;
			var tipo 			= $('#tipo_quiz').val();
			
			switch(controlador){
				case 'perguntas':
						if(tipo != 'perfil'){
							var evento = 'certo-ou-errado';
						}else{
							var evento = 'perguntas';
						}
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'quiz_tipo':
						if(tipo != 'perfil'){
							var evento = 'certo-ou-errado-faixa';
						}else{
							var evento = 'perfil'
						}

						eventos_back.valida_timestamp(evento, url);
				break;
				case 'customizacao':
						var evento = 'customizacao'
						eventos_back.salva_customizacao(url);
				break;
				case 'visualizacao':
						var evento = 'visualizacao'
						window.location.href=url;
				break;
			}
			return false;
		});
		$('.faixasClassificacao').on('click', function(e){
			e.preventDefault();
			var url		= this.href;
			var controlador  	= this.rel;
			var tipo 			= $('#tipo_quiz').val();

			switch(controlador){
				case 'perguntas':
						var evento = 'certo-ou-errado'
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'quiz_tipo':
						var evento = 'certo-ou-errado-faixa'
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'customizacao':
						var evento = 'customizacao'
						eventos_back.salva_customizacao(url);
				break;
				case 'visualizacao':
						var evento = 'visualizacao'
						window.location.href=url;
				break;
			}

			return false;
		});
		$('.perguntas').on('click', function(e){
			e.preventDefault();
			var url		= this.href;
			var controlador  	= this.rel;
			var tipo 			= $('#tipo_quiz').val();

			switch(controlador){
				case 'perguntas':
						if(tipo != 'perfil'){
							var evento = 'certo-ou-errado';
						}else{
							var perfil = 'perguntas';
						}
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'quiz_tipo':
						if(tipo != 'perfil'){
							var evento = 'certo-ou-errado-faixa';
						}else{
							var evento = 'perfil';
						}	
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'customizacao':
						var evento = 'customizacao'
						eventos_back.salva_customizacao(url);
				break;
				case 'visualizacao':
						var evento = 'visualizacao'
						window.location.href=url;
				break;
			}

			return false;
		});
		$('.customizacao').on('click', function(e){
			e.preventDefault();
			var url		= this.href;
			var controlador  	= this.rel;
			var tipo 			= $('#tipo_quiz').val();

			switch(controlador){
				case 'perguntas':
						if(tipo != 'perfil'){
							var evento = 'certo-ou-errado';
						}else{
							var evento = 'perguntas';
						}
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'quiz_tipo':
						if(tipo != 'perfil'){
							var evento = 'certo-ou-errado-faixa'	
						}else{
							var evento = 'perfil';
						}
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'customizacao':
						var evento = 'customizacao'
						eventos_back.salva_customizacao(url);
				break;
				case 'visualizacao':
						var evento = 'visualizacao'
						window.location.href=url;
				break;
			}

			return false;
		});
		$('.visualizacao').on('click', function(e){
			e.preventDefault();
			var url		= this.href;
			var controlador  	= this.rel;
			var tipo 			= $('#tipo_quiz').val();

			switch(controlador){
				case 'perguntas':
						var evento = 'certo-ou-errado'
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'quiz_tipo':
						var evento = 'certo-ou-errado-faixa'
						eventos_back.valida_timestamp(evento, url);
				break;
				case 'customizacao':
						var evento = 'customizacao'
						eventos_back.salva_customizacao(url);
				break;
				case 'visualizacao':
						var evento = 'visualizacao'
						window.location.href=url;
				break;
			}

			return false;
		});
		//Perfil 1
		$('#btn-proxima-etapa-1-perfil').one('click',function(e){
			e.preventDefault();
			$(this).hide();
			$('.loader').show();
			var evento = 'perfil';
			eventos_back.valida_timestamp(evento);
		});

		//Editar perfil
		$('.group.salvo input, .group.salvo textarea, .group.salvo .quadro img, .group.salvo .sorteia .header .input input, .group.salvo .sorteia .header select, .group.salvo .sorteia .header.novo .input input, .group.salvo .sorteia .header.novo select').on('change',function(){
				$(this).parents('.group').addClass('edit');
		});

		$('.group.salvo #file').click(function(){
			$(this).parents('.group').removeClass('edit');
			$(this).parents('.group').addClass('edit');
		});

		$('.group.salvo .sorteia .novo .input input[name="nome-resposta"], .group.salvo .sorteia .novo select[name="perfil-resposta"]').blur(function(){
			$(this).parents('.group').removeClass('edit');
			$(this).parents('.group').addClass('edit');
		});

		//Remover perfil
		$(document).on('click', '.remover-perfil', function(e){
			e.preventDefault();
			var url = this.href, id_quiz = this.rel, alvo = this.id;
			var imagem = $('#alvo-'+alvo).attr('src').split('../../assets/server/php/files/');

			eventos_back.remove_perfil(url, id_quiz, imagem);

			return false;
		});

		//Perguntas
		$('#btn-proxima-etapa-2-perguntas').click(function(e){
			e.preventDefault();
			$(this).hide();
			$('.loader').show();
			var evento = 'perguntas';
			eventos_back.valida_timestamp(evento);
			return false;
		});

		//Customização
		$('#btn-proxima-etapa-3-customizacao').one('click', function(e){
			e.preventDefault();
			$(this).hide();
			$('.loader').show();
			var evento = 'customizacao';
			eventos_back.valida_timestamp(evento);
			return false;
		});

		//Remover uma pergunta e suas respostas
		$(document).on('click', '.excluir-um', function(e){
			e.preventDefault();
			var url = this.href, id_quiz = this.rel, alvo = this.id;
			var imagem = $('#alvo-'+alvo).attr('src').split('../../assets/server/php/files/');
			var data_alteracao = $('#data_alteracao').val();

				$.get('../../quiz/valida_timestamp', {id:id_quiz, data_alteracao:data_alteracao}).done(
					function(e){
						if(e == 'ok'){
							eventos_back.remove_pergunta(url, id_quiz, imagem);
						}else{
							alert('A data de alteração do quiz é diferente da data que você tem armazenado na página, a página será atualizada para que as informações referente ao quiz sejam atualizadas');
							window.location.reload();
						}	
					}
				);

			return false;
		});
		
		$(document).on('click', '.excluir-pergunta-ce', function(e){
			e.preventDefault();
			var url = this.href, id_quiz = this.rel, alvo = this.id;
			var imagem = $('#alvo-'+alvo).attr('src').split('../../assets/server/php/files/');
			var data_alteracao = $('#data_alteracao').val();

				$.get('../../quiz/valida_timestamp', {id:id_quiz, data_alteracao:data_alteracao}).done(
					function(e){
						if(e == 'ok'){
							eventos_back.remove_pergunta(url, id_quiz, imagem);
						}else{
							alert('A data de alteração do quiz é diferente da data que você tem armazenado na página, a página será atualizada para que as informações referente ao quiz sejam atualizadas');
							window.location.reload();
						}	
					}
				);

			return false;
		});

		$(document).on('click', '.excluir-faixa', function(e){
			e.preventDefault();
			
			var url = this.href, id_quiz = $('#id_quiz').val(), alvo = this.id;
			var imagem = $(this).siblings('.quadro #alvo').attr('src');
			var data_alteracao = $('#data_alteracao').val();
			$.get('../../quiz/valida_timestamp', {id:id_quiz, data_alteracao:data_alteracao}).done(
				function(e){
					if(e == 'ok'){
						eventos_back.remove_faixa(url, id_quiz);
					}else{
						alert('A data de alteração do quiz é diferente da data que você tem armazenado na página, a página será atualizada para que as informações referente ao quiz sejam atualizadas');
						window.location.reload();
					}	
				}
			);


			return false;
		});
		//Remover uma resposta
		$(document).on('click', '.excluir-dois', function(e){
			e.preventDefault();
			var url = this.href, id_quiz = this.rel;
			var data_alteracao = $('#data_alteracao').val();

			$.get('../../quiz/valida_timestamp', {id:id_quiz, data_alteracao:data_alteracao}).done(
				function(e){
					if(e == 'ok'){
						eventos_back.remove_resposta(url, id_quiz);
					}else{
						alert('A data de alteração do quiz é diferente da data que você tem armazenado na página, a página será atualizada para que as informações referente ao quiz sejam atualizadas');
						window.location.reload();
					}	
				}
			);

			return false;
		});

		//
		// Eventos do quiz tipo Certo ou errado
		//---------------------------------------
		//Quando o usuário marca alguma resposta como correta é atribuido a ela o peso 10
		$('.group').each(function(index){
			$(this).find('input:radio').on('click', function(){
				$('input:radio').val(0)
				$('input:radio:checked').val('10');
			});
		});
		$('.group.salvo').each(function(index){
			$(this).find('input:radio').on('click', function(){
				$(this).parents('.group').addClass('edit');
				$('input:radio').val(0)
				$('input:radio:checked').val('10');
			});
		});
		//Quando o usuário marca alguma resposta como correta é atribuido a ela o peso 10
		$('.group').each(function(index){
			$(this).find('input:checkbox').on('click', function(){
				$('input:checkbox').val(0)
				$('input:checkbox:checked').val('10');
			});
		});
		$('.group.salvo').each(function(index){
			$(this).find('input:checkbox').on('click', function(){
				$(this).parents('.group').addClass('edit');
				$('input:checkbox').val(0)
				$('input:checkbox:checked').val('10');
			});
		});
		//Quando clicar em proxima etapa
		$('#btn-proxima-etapa-1-perguntas-CE').on('click', function(event){
			event.preventDefault();
			$(this).hide();
			$('.loader').fadeIn();
			var url    = this.href;
			var evento = 'certo-ou-errado';
			eventos_back.valida_timestamp(evento, url);
			return false;
		});

		$('#proxima-etapa-2-faixa-ce').on('click', function(event){
			event.preventDefault();
			//Quando o botão for clicado ele remove o botao próximo e voltar para que as requisições não sejam interrompidas por outro cliques
			$(this).fadeOut();
			$('.voltar').fadeOut();
			$('.loader').fadeIn(); 
			var evento 		= 'certo-ou-errado-faixa'
			var prox_url 	= this.href;
			//Faz a validação de time stemp antes de a função de salvar 
			eventos_back.valida_timestamp(evento, prox_url);
			//Return false, inibe o evento href do link
			return false;
		});

		//Slider de faixas já existentes
		$('.group.salvo').each(function(index){
			var de = $(this).find('.amountIni'+index).val();
			var ate = $(this).find('.amountFin'+index).val();
			$( "#slider"+index ).slider({
					range: true,
					min: 0,
					max: 200,
					step: 10,
					values: [ de, ate ],
					slide: function( event, ui ) {
						$( ".amountIni"+index ).val( ui.values[ 0 ]+ "pts");
						$( ".amountFin"+index ).val( ui.values[ 1 ]+ "pts");
					},
					change: function(event, ui){
						$(this).parents('.group').removeClass('edit');
						$(this).parents('.group').addClass('edit');
					}
				});
			 $( ".amountIni"+index).val( $( "#slider"+index).slider( "values", 0 )+ "pts" );
			 $( ".amountFin"+index).val( $( "#slider"+index).slider( "values", 1 ) + "pts" );
		});
		//Excluir BG Resultado
		$('.excluir-bg-resultado').on('click', function(e){
			e.preventDefault();
			$('img#alvo-perguntass').remove();
			$('#previewResultados').css('background-image', '');
			$('#bg_image_resultado').val('');
			$(this).prev().prev().prev('#imagem-preview').html('<img id="alvo-resultados" src="../../assets/img/backgrounds/preview.png">');
		});
		$('.excluir-bg-quiz').on('click', function(e){
			e.preventDefault();
			$('img#alvo-resultados').remove();
			$('#previewPerguntas').css('background-image', '');
			$('#bg_image_pergunta').val('');
			$(this).prev().prev().prev('#imagem-preview').html('<img id="alvo-resultados" src="../../assets/img/backgrounds/preview.png">');
		});
		//Remove Imagens dos elementos
		$('.excluir-imagem').on('click', function(e){
			e.preventDefault();
			var box_img = $(this).siblings('.quadro');
			var imagem  = $(this).siblings('.quadro').find('img').attr('src');
			var img_id  = $(this).siblings('.quadro').find('img').attr('id');
			$(this).parents('.group').addClass('edit');  
			$.ajax({
				url: '../../quiz/show_base_url',
				async: false,
				success: function(e){
					var base_url = e;
					if(imagem == base_url+'assets/img/backgrounds/imagem.png' || imagem == '../../assets/img/backgrounds/imagem.png'){
						alert('Não existe imagem para ser excluida');
					}else{
						$.ajax({
							url: base_url+'quiz/remove_image',
							data: {imagem:imagem},
							async: false,
							success: function(e){
								$(box_img).remove('img');
								$(box_img).html('<img id="'+img_id+'" src="../../assets/img/backgrounds/imagem.png">');
							}
						});
					}
				}
			});
		});
		
	},	

	//Executa a operação de recovey no banco de dados
	recovery: function(email)
	{	
		$.ajax({
			url:'login/recovery',
			async: false,
			data: {email:email},
			dataType: 'JSON',
			success: function(e){
				if(e.result == "sucesso"){
					$('#email-recover-div, #bt-esqueci-senha-div').hide();
					$('#status-enviada').show().text('Foi enviado um e-mail com uma url para reconfiguração da senha.');
				}else{
					console.log(e.erro);
					$('.enviada-erro').text(e.erro).show();
				}
			}
		});
	},

	valida_quiz: function()
	{
		var tituloQuiz = $('#tituloQuiz').val(), tipoQuiz = $('#tipoQuiz').val();

		if(tituloQuiz == '' || tituloQuiz == 'Preencha esse campo'){
			$('#tituloQuiz').val('Preencha esse campo').css('color', '#c9451e');
		}else{
			document.form_quiz_create.submit();
		}

		return false;
	},

	valida_timestamp: function(evento, url)
	{
		var data_alteracao = $('#data_alteracao').val(), id_quiz = $('#id_quiz').val();
		$.ajax({
			url: '../../quiz/valida_timestamp',
			async: false,
			data: {id:id_quiz, data_alteracao:data_alteracao},
			success: function(e){
				//if(e == 'ok'){
					switch(evento){
						case 'perfil':
							eventos_back.salva_perfil(url);
						break;
						case 'perguntas':
							eventos_back.salva_perguntas(url);
						break;
						case 'customizacao':
							eventos_back.salva_customizacao(url);
						break;
						case 'certo-ou-errado':
							eventos_back.salva_perguntas_CE(url);
						break;
						case 'certo-ou-errado-faixa':
							eventos_back.salva_faixa_ce(url);
						break;				
					}	
				//}else{
					//alert('A data de alteração do quiz é diferente da data que você tem armazenado na página, a página será atualizada para que as informações referente ao quiz sejam atualizadas');
					//window.location.reload();
				//}	
			}
		});
		return false;
	},

	salva_perfil: function(url)
	{	
		var prox_url = $('#btn-proxima-etapa-1-perfil').attr('rel');
		$('.group').each(function(index){
			var titulo = $('#nome-perfil-'+index).val(), descricao =  $('#descricao-perfil-'+index).val(), link = $('#link-perfil-'+index).val(), texto = $('#texto-perfil-'+index).val(), imagem = $('#alvo-'+index).attr('src'), id_quiz = $('#id_quiz').val(), id_perfil = $('#id-perfil-'+index).val();
			if(titulo == '' || titulo == 'Título' || titulo == 'Perfil'){
				//alert('Preencha todos os campos de cada perfil');
				if(url != ''){
					window.location.href=url;
				}
				return false;
			}else if(!$(this).hasClass('salvo')){
				var grupo = $(this).attr('id', index);
				$.ajax({
					url: '../save_perfil',
					async: false,
					data: {titulo:titulo, descricao:descricao, link_referencia:link, texto_link:texto, imagem:imagem, id_quiz:id_quiz},
					success: function(e){
						if(e.result == 'sucesso'){
							$(grupo).removeClass('edit');
							$(grupo).addClass('salvo');
						}
					}
				});
				console.log(index+' | Titulo: '+titulo+' Descrição: '+descricao+ ' link: '+link+' Texto do Link: '+texto+ ' Imagem: '+imagem);
			}else if($(this).hasClass('edit')){
				$.ajax({
					url: '../update_perfil/',
					async: false,
					data: {id:id_perfil, titulo:titulo, descricao:descricao, link_referencia:link, texto_link:texto, imagem:imagem},
					success: function(e){
						if(e == 'sucesso'){
							$(grupo).removeClass('edit');
							$(grupo).removeClass('salvo');
						}else{
							console.log('houve uma falha');
						}
					}
				});
			}
		});
		var quiz_alteracao = $('#id_quiz').val();
		$.ajax({
			url: '../../quiz/update_timestamp', 
			async: false,
			data: {id_quiz:quiz_alteracao}, 
			success: function(e){
				if(e == 'ok'){
					if(!url){
						window.location.href=prox_url;
					}else{
						window.location.href=url;
					}
				}
			}
		});
	},

	remove_perfil: function(url, id_quiz, imagem)
	{
		var confirmacao = confirm('Tem certeza que deseja excluir esse perfil, uma vez excluido todas as respostas relacionadas a esse perfil, também serão excluidas.');
		if(confirmacao)
		{
			window.location.href=url+'?id_quiz='+id_quiz+'&imagem='+imagem;
		}
		return false;
	},

	salva_perguntas: function(url)
	{
		prox_url = $('#btn-proxima-etapa-2-perguntas').attr('href');
		quiz_alteracao = $('#id_quiz').val();
		//Inicia mapeia os elementos .group do documento

		$('.group').each(function(index){
			//Variáveis que pegam os
			var nome 		 = $('#nome-pergunta-'+index).val(), link = $('#link-pergunta-'+index).val(), texto = $('#texto-pergunta-'+index).val(), imagem = $('#alvo-pergunta-'+index).attr('src'), id_quiz = $('#id_quiz').val(), tipo_quiz = $('#tipo_quiz').val(), ordem = index;
			var box_resposta = $(this).find('.sorteia .header');
			//Valida se o campo de nome da pergunta 
			if(nome == '' || nome == 'Preencha esse campo' || nome == 'Título' || nome == 'Pergunta'){
				$('#nome-pergunta-'+index).val('Preencha esse campo')
				if(url != ''){
					window.location.href=url;
				}
				return false;
			}else{
				if(!$(this).hasClass('salvo')){
					var grupo = $(this).attr('id', index);
					//Verifica se os campos nome da pergunta, imagem e resposta não estão vazios.
					$(this).find('.input input[name="nome-resposta"]').each(function(){
					 	if(this.value == '' || this.value == 'Preencha esse campo'){
					 		this.value='';
					 		this.value="Preencha esse campo";
					 		return false;
					 	}
					});

					//Salva a pergunta via ajax
					$.ajax({
						url: '../save_pergunta_perfil',
						dataType: 'JSON',
						async: false,
						data: {texto:nome, link_referencia:link, texto_link:texto, imagem:imagem, id_quiz:id_quiz, ordem:ordem},
						success: function(e){							
							if(e.result == 'sucesso'){
								$(grupo).addClass('salvo');
								$(grupo).removeClass('edit');
								//Vamos salvar a resposta agora
								$(box_resposta).each(function(index_resp){
									var resposta 	= $(this).find('.input input[name="nome-resposta"]').val(), perfil_resposta = $(this).find('select[name=perfil-resposta]').val(), ordem_resp = index_resp;
								    //Log do cadastro
								    console.log('Pergunta: '+nome+' ID: '+e.id_pergunta+' | Resposta: '+resposta+' - Perfil: '+perfil_resposta);
									$.ajax({
											url: '../../respostas/save_resposta_perfil',
											async: false,
											data: {texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:perfil_resposta, id_pergunta:e.id_pergunta, id_quiz:id_quiz, ordem:ordem_resp},
											success:function(e_resp){
										    	if(e_resp == 'sucesso'){
										    		//log do cadastro da resposta
										    		console.log('Sucesso');
										    	}else{
										    		//log do erro do cadastro da resposta
										    		console.log('Falha ao cadastrar resposta');
										    	}
									   		}  
									});	    
								});
							}else{
								alert('Ocorreu uma falha ao tentar cadastrar a pergunta');
							}
						}	
					
					});					
				}else if($(this).hasClass('edit')){
					//Variáveis que pegam os
					//Verifica se os campos nome da pergunta, imagem e resposta não estão vazios.
					$(this).find('.input input[name="nome-resposta"]').each(function(){
						if(this.value == '' || this.value == 'Preencha esse campo'){
					 		this.value='';
					 		this.value="Preencha esse campo";
					 		return false;
						 	}
					});

					var id_pergunta = $(this).find('input[name="id-pergunta"]').val();
					//Salva uma nova resposta ou atualiza as respostas existentes 
					$(box_resposta).each(function(index_resp){
						var resposta = $(this).find('.input input[name="nome-resposta"]').val(), id_resposta = $(this).find('.input input[name="id-resposta"]').val(),  perfil_resposta = $(this).find('select[name=perfil-resposta]').val();
					   	if($(this).hasClass('novo')){
						   	$.ajax({
						   		url: '../../respostas/save_resposta_perfil',
						   		async: false,
						   		data: {texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:perfil_resposta, id_pergunta:id_pergunta, id_quiz:id_quiz, ordem:index_resp},
						   		success: function(e_resp){
								   	console.log({texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:perfil_resposta, id_pergunta:id_pergunta, id_quiz:id_quiz});
								   	if(e_resp == 'sucesso'){
								   		//log do cadastro da resposta
										console.log('Sucesso');
									}else{
										//log do erro do cadastro da resposta
									 	console.log('Falha ao cadastrar resposta');
									}
								}
						   	});
						}else{
							//Se for só editar uma resposta existente ele simplesmente faz o update
						   	$.ajax({
						   		url: '../../respostas/update_resposta_perfil',
						   		async: false,
						   		data: {texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:perfil_resposta, id_pergunta:id_pergunta, id_quiz:id_quiz, id_resposta:id_resposta, ordem:index_resp},
						   		success: function(e_resp){
									if(e_resp == 'sucesso'){
									  	console.log('Sucesso');
									}else{
										console.log('Falha ao atualizar resposta');
									}
						   		}
						   	});		
						}
					});//Fim do Loop dos campos de respostas
					//Atualiza a pergunta
					$.ajax({
						url: '../update_pergunta_perfil',
						async: false,
						dataType: 'JSON',
						data: {texto:nome, link_referencia:link, texto_link:texto, imagem:imagem, id_quiz:id_quiz, id_pergunta:id_pergunta, ordem:ordem},
						success: function(e){
							//if(e.result == 'sucesso'){
								$(grupo).removeClass('edit');
							//}
						}
					});			
				}
			}
		});
		//Atualiza a data de alteração do quiz
		$.ajax({
			url: '../../quiz/update_timestamp', 
			async: false,
			data: {id_quiz:quiz_alteracao}, 
			success: function(e){
				if(e == 'ok'){
					if(!url){
						window.location.href=prox_url;
					}else{
						window.location.href=url;
					}
				}
			}
		});

	},

	salva_perguntas_CE: function(url)
	{
		prox_url = $('#btn-proxima-etapa-1-perguntas-CE').attr('href');
		quiz_alteracao = $('#id_quiz').val();
		//Inicia mapeia os elementos .group do documento

		$('.group').each(function(index){
			//Variáveis que pegam os
			var nome 		 = $('#nome-pergunta-'+index).val(), link = $('#link-pergunta-'+index).val(), texto = $('#texto-pergunta-'+index).val(), imagem = $('#alvo-pergunta-'+index).attr('src'), id_quiz = $('#id_quiz').val(), tipo_quiz = $('#tipo_quiz').val(), ordem = index;
			var box_resposta = $(this).find('.sorteia .header');
			//Valida se o campo de nome da pergunta 
			if(nome == '' || nome == 'Preencha esse campo' || nome == 'Título' || nome == 'Pergunta'){
				$('#nome-pergunta-'+index).val('Preencha esse campo');
				alert('Preencha todos os campos');
				$('.loader').hide();
				$('.proxima-etapa').show();
				return false;
			}else{
				if(!$(this).hasClass('salvo')){
					var grupo = $(this).attr('id', index);
					//Verifica se os campos nome da pergunta, imagem e resposta não estão vazios.
					$(this).find('.input input[name="nome-resposta"]').each(function(){
					 	if(this.value == '' || this.value == 'Preencha esse campo'){
					 		this.value='';
					 		//this.value="Preencha esse campo";
					 		alert('Preencha os campos das respostas')
					 		return false;
					 	}
					});
					//Salva a pergunta via ajax
					$.ajax({
						url: '../save_pergunta_certo_ou_errado',
						type: 'GET',
						async: false,
						dataType: 'JSON',
						data: {texto:nome, link_referencia:link, texto_link:texto, imagem:imagem, id_quiz:id_quiz, ordem:ordem}
					})
					.done(
						function(e){							
							if(e.result == 'sucesso'){
								$(grupo).addClass('salvo');
								$(grupo).removeClass('edit');
								//Vamos salvar a resposta agora
								$(box_resposta).each(function(index_resp){
									var resposta 	= $(this).find('.input input[name="nome-resposta"]').val(), ordem_resp = index_resp;
									if(tipo_quiz != 'resposta_certa'){
										var certa_ou_errada = $(this).find('input:radio').val();	
									}else{
										var certa_ou_errada = $(this).find('input:checkbox').val();
									}
									
								    //Log do cadastro
								    console.log('Pergunta: '+nome+' ID: '+e.id_pergunta+' | Resposta: '+resposta+' - Certo ou errado: '+certa_ou_errada);
										    
								    $.ajax({
								    		url: '../../respostas/save_resposta_perfil',
								    		type: 'GET',
								    		async: false,
								    		data: {texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:certa_ou_errada, id_pergunta:e.id_pergunta, id_quiz:id_quiz, ordem:ordem_resp},
								    		success: function(e_resp){
								    			if(e_resp == 'sucesso'){
										    		//log do cadastro da resposta
										    		console.log('Sucesso');
										    	}else{
										    		//log do erro do cadastro da resposta
										    		console.log('Falha ao cadastrar resposta');
										    	}
								    		}
								    });
								});
							}else{
								alert('Ocorreu uma falha ao tentar cadastrar a pergunta');
							}
						}
					);	
				}else if($(this).hasClass('edit')){
					//Variáveis que pegam os
					//Verifica se os campos nome da pergunta, imagem e resposta não estão vazios.
					$(this).find('.input input[name="nome-resposta"]').each(function(){
						if(this.value == '' || this.value == 'Preencha esse campo'){
					 		this.value='';
					 		this.value="Preencha esse campo";
					 		return false;
						 	}
					});

					var id_pergunta = $(this).find('input[name="id-pergunta"]').val();
					//Salva uma nova resposta ou atualiza as respostas existentes 
					$(box_resposta).each(function(index_resp){
						var resposta = $(this).find('.input input[name="nome-resposta"]').val(), id_resposta = $(this).find('.input input[name="id-resposta"]').val(),  perfil_resposta = $(this).find('select[name=perfil-resposta]').val();
						if(tipo_quiz != 'resposta_certa'){
							var certa_ou_errada = $(this).find('input:radio').val();	
						}else{
							var certa_ou_errada = $(this).find('input:checkbox').val();
						}
						if(tipo_quiz != 'certo-ou-errado'){
						   	if($(this).hasClass('novo')){
							   	$.ajax({
							   		url: '../../respostas/save_resposta_perfil',
							   		async: false,
							   		data: {texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:certa_ou_errada, id_pergunta:id_pergunta, id_quiz:id_quiz, ordem:index_resp},
							   		success: function(e_resp){
									   	console.log({texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:certa_ou_errada, id_pergunta:id_pergunta, id_quiz:id_quiz});
									   	if(e_resp == 'sucesso'){
									   		//log do cadastro da resposta
											console.log('Sucesso');
										}else{
											//log do erro do cadastro da resposta
										 	console.log('Falha ao cadastrar resposta');
										}
									}
							   	});
							}else{
								$.ajax({
								url: '../../respostas/update_resposta_perfil',
							   	type: 'GET',
							   	async: false,
							   	data: {texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:certa_ou_errada, id_pergunta:id_pergunta, id_quiz:id_quiz, id_resposta:id_resposta, ordem:index_resp},
							   	success: function(e_resp){
								//console.log({texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:perfil_resposta, id_pergunta:id_pergunta, id_quiz:id_quiz, id_resposta:id_resposta});
									if(e_resp == 'sucesso'){
										console.log('Sucesso');
									}else{
										console.log('Falha ao atualizar resposta');
										}
							   		}
							   	});
							}
						}else{
							$.ajax({
								url: '../../respostas/update_resposta_perfil',
							   	type: 'GET',
							   	async: false,
							   	data: {texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:certa_ou_errada, id_pergunta:id_pergunta, id_quiz:id_quiz, id_resposta:id_resposta, ordem:index_resp},
							   	success: function(e_resp){
								//console.log({texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:perfil_resposta, id_pergunta:id_pergunta, id_quiz:id_quiz, id_resposta:id_resposta});
									if(e_resp == 'sucesso'){
										console.log('Sucesso');
									}else{
										console.log('Falha ao atualizar resposta');
										}
							   		}
							   	});
						}   			
					});//Fim do Loop dos campos de respostas
					//Atualiza a pergunta
					$.ajax({
						url: '../update_pergunta_certo_ou_errado',
						async: false,
						dataType: 'JSON',
						data: {texto:nome, link_referencia:link, texto_link:texto, imagem:imagem, id_quiz:id_quiz, id_pergunta:id_pergunta, ordem:ordem},
						success: function(e){
								$(grupo).removeClass('edit');
								//Vamos salvar a resposta agora
								//Após
								//Atualiza a data de alteração do quiz
								$.ajax({
									url: '../../quiz/update_timestamp',
									async: false,
									data: {id_quiz:quiz_alteracao},
									success: function(e){
										if(e == 'ok'){
												/*
												if(!url){
													window.location.href=prox_url;
												}else{
													window.location.href=url;
												}
												*/
										}
									}	
								});	
						}
					});			
				}//Fim da Edição da pergunta
			} 
		});
		//Atualiza a data de alteração do quiz	
		$.ajax({
			url: '../../quiz/update_timestamp',
			async:false,
			data: {id_quiz:quiz_alteracao},
			success: function(e){	
				if(!url){
					window.location.href=prox_url;
				}else{
					window.location.href=url;
				}
			}
		});
	},

	salva_faixa_ce: function(url, prox_url)
	{
		var id_quiz = $('#id_quiz').val();
		//Essa chamada ajax serve pra pegar o Base URL do PHP	
		$.ajax({
			url: '../../quiz/show_base_url',
			async: false,
			success: function(base_url){
				$('.group').each(function(indexs){
					//Variáveis dos campos que serão salvos
					var titulo 	   = $(this).find('input[name="nome"]').val(), descricao = $(this).find('textarea[name="descricao"]').val(), link = $(this).find('input[name="link"]').val();
					var texto_link = $(this).find('input[name="texto"]').val(), campo_imagem 	= $(this).find('img#alvo').attr('src');
					var range_inicial = $(this).find('#amountIni').val(), range_final = $(this).find('#amountFin').val();
					var id_faixa = $(this).find('#id-faixa').val();
					//Verifica se a imagem se foi ou não feito upload de uma nova imagem
					if(campo_imagem == base_url+'assets/img/backgrounds/imagem.png'){
						var imagem = '';
					}else{
						var imagem = campo_imagem;
					}
					//Valida o campo de titulo
					if(titulo == '' || titulo == 'Título'){
						alert('O título da faixa e o range de pontuação são campos obrigatórios');
						return false;
					}else{
						console.log('Faixa: '+titulo+' Descrição: '+descricao+'	link referencia: '+link+' Texto do link: '+texto_link+' Range Inicial: '+range_inicial+' Range Final: '+range_final+' Imagem: '+imagem);
						//Verifica se essa faixa é nova
						if(!$(this).hasClass('salvo')){
							$.ajax({
								url: base_url+'faixa/save_faixa',
								async: false,
								data: {range_de:range_inicial, range_ate:range_final, titulo:titulo, descricao:descricao, link_referencia:link, texto_link:texto_link, imagem:imagem, id_quiz:id_quiz},
								success: function(e){
									if(e == 'sucesso'){
										console.log('Faixa cadastrada com sucesso');
									}
								}
							});
						//Ou vai editar uma faixa já cadastrada	
						}else if($(this).hasClass('edit')){
							$.ajax({
								url: base_url+'faixa/update_faixa/'+id_faixa,
								async: false,
								data: {range_de:range_inicial, range_ate:range_final, titulo:titulo, descricao:descricao, link_referencia:link, texto_link:texto_link, imagem:imagem, id_quiz:id_quiz},
								success: function(e){
									if(e == 'sucesso'){
										console.log('Faixa cadastrada com sucesso');
									}
								}
							});
						}//Fim do edit	
					}//Fim do Senão
				});//Fim do loop no .group
			}//Fecha o success do base_url
		});//Fim do ajax que pega o base_url
		//Atualiza a data de alteração do quiz
		$.ajax({
			url: '../../quiz/update_timestamp',
			async:false,
			data: {id_quiz:id_quiz},
			success: function(e){	
				if(!url){
					window.location.href=prox_url;
				}else{
					window.location.href=url;
				}
			}
		});
	},

	salva_customizacao: function(url){
		prox_url = $('#btn-proxima-etapa-3-customizacao').attr('href');
		//Variáveis das configurações de Pergunstas e Respostas
		var id_quiz = $('input[name="id_quiz"]').val(), id_config = $('#id-config').val(), titulo_tamanho = $('select[name="titulo-tamanho"]').val(), titulo_cor = $('input[name="titulo-cor"]').val(), titulo_alinhamento = $('input[name="ititulo-alinhamento"]').val();
		var pergunta_tamanho = $('select[name="perguntas-tamanho"]').val(), perguntas_cor = $('input[name="perguntas-cor"]').val(), perguntas_alinhamento = $('input[name="iperguntas-alinhamento"]').val();
		var referencia_tamanho = $('select[name="referencia-tamanho"]').val(),referencia_cor = $('input[name="referencia-cor"]').val(), referencia_alinhamento = $('#referencia-alinhamento').val() ;
		var resposta_tamanho = $('select[name="respostas-tamanho"]').val(), resposta_cor = $('input[name="respostas-cor"]').val(), resposta_alinhamento = $('input[name="irespostas-alinhamento"]').val(), resposta_cor_fundo = $('input[name="respostas-cor-fundo"]').val();
		var botoes_cor = $('input[name="botoes-cor"]').val(), botoes_cor_fundo = $('input[name="botoes-perguntas-cor-fundo"]').val(), pergunta_cor_fundo = $('input[name="imagem-cor-fundo"]').val(), pergunta_imagem_fundo = $('#bg_image_pergunta').val();
		
		//Variáveis das configurações de resultados
		var titulo_quiz_resultados_tamanho = $('select[name="titulo-resultados-tamanho"]').val(), titulo_quiz_resultados_cor = $('input[name="titulo-resultados-cor"]').val(), titulo_quiz_resultados_alinhamento = $('input[name="ititulo-resultados-alinhamento"]').val();
		var titulo_resultatados_tamanho = $('select[name="perguntas-resultados-tamanho"]').val(), titulo_resultados_cor = $('input[name="perguntas-resultados-cor"]').val(), titulo_resultados_alinhamento = $('input[name="iperguntas-resultados-alinhamento"]').val();
		var acertos_tamanho	= $('select[name="acertos-tamanho"]').val(), acertos_cor = $('input[name="acertos-cor"]').val(), acertos_alinhamento = $('input[name="iacertos-alinhamento"]').val();
		var descricao_tamanho = $('select[name="descricao-tamanho"]').val(), descricao_cor = $('input[name="descricao-cor"]').val(), descricao_alinhamento = $('input[name="idescricao-alinhamento"]').val();
		var referencia_resultados_tamanho = $('select[name="referencia-resultados-tamanho"]').val(), referencia_resultados_cor = $('input[name="referencia-resultados-cor"]').val(), referencia_resultados_alinhamento = $('input[name="ireferencia-resultados-alinhamento"]').val();
		var botoes_resultados_cor = $('input[name="botoes-resultados-cor"]').val(), botoes_resultados_cor_fundo = $('input[name="botoes-resultados-cor-fundo"]').val();
		var imagem_resultados_fundo = $('#bg_image_resultado').val(), resultados_cor_fundo = $('#imagem-resultados-cor-fundo').val();
		var quiz_bg_img_repeat = $('.perguntas-bg-img-conf').find('input:radio:checked[name="repete-imagem-perguntas"]').val(), quiz_bg_img_align_horizontal = $('.perguntas-bg-img-conf').find('input:radio:checked[name="alinhaH-imagem-perguntas"]').val(), quiz_bg_img_align_vertical = $('.perguntas-bg-img-conf').find('input:radio:checked[name="alinhaV-imagem-perguntas"]').val();
		var resultado_bg_img_repeat = $('.resultados-img-bg-conf').find('input:radio:checked[name="repete-imagem"]').val(), resultado_bg_img_align_horizontal = $('.resultados-img-bg-conf').find('input:radio:checked[name="alinhaH-imagem"]').val(), resultado_bg_img_align_vertical = $('.resultados-img-bg-conf').find('input:radio:checked[name="alinhaV-imagem"]').val();
		
		//console.log(quiz_bg_img_repeat, quiz_bg_img_align_horizontal, quiz_bg_img_align_vertical);
		//console.log(resultado_bg_img_repeat, resultado_bg_img_align_horizontal,  resultado_bg_img_align_vertical);
	
		
		//console.log({id_config:id_config, id_quiz:id_quiz, titulo_tamanho:titulo_tamanho, titulo_cor:titulo_cor, titulo_alinhamento:titulo_alinhamento, pergunta_tamanho:pergunta_tamanho, perguntas_cor:perguntas_cor, perguntas_alinhamento:perguntas_alinhamento, referencia_tamanho:referencia_tamanho, referencia_cor:referencia_cor, referencia_alinhamento:referencia_alinhamento, resposta_tamanho:resposta_tamanho, resposta_cor:resposta_cor, resposta_alinhamento:resposta_alinhamento, resposta_cor_fundo:resposta_cor_fundo, botoes_cor:botoes_cor, botoes_cor_fundo:botoes_cor_fundo, pergunta_cor_fundo:pergunta_cor_fundo, pergunta_imagem_fundo:pergunta_imagem_fundo, titulo_quiz_resultados_tamanho:titulo_quiz_resultados_tamanho, titulo_quiz_resultados_cor:titulo_quiz_resultados_cor, titulo_quiz_resultados_alinhamento:titulo_quiz_resultados_alinhamento, titulo_resultatados_tamanho:titulo_resultatados_tamanho, titulo_resultados_cor:titulo_resultados_cor, titulo_resultados_alinhamento:titulo_resultados_alinhamento, acertos_tamanho:acertos_tamanho, acertos_cor:acertos_cor, acertos_alinhamento:acertos_alinhamento, descricao_tamanho:descricao_tamanho, descricao_cor:descricao_cor, descricao_alinhamento:descricao_alinhamento, referencia_resultados_tamanho:referencia_resultados_tamanho, referencia_resultados_cor:referencia_resultados_cor, referencia_resultados_alinhamento:referencia_resultados_alinhamento, botoes_resultados_cor:botoes_resultados_cor, botoes_resultados_cor_fundo:botoes_resultados_cor_fundo, imagem_resultados_fundo:imagem_resultados_fundo, resultados_cor_fundo:resultados_cor_fundo});
		$.ajax({
			url: '../../customizacao/update/',
			async: false,
			data: {id_config:id_config, id_quiz:id_quiz, titulo_tamanho:titulo_tamanho, titulo_cor:titulo_cor, titulo_alinhamento:titulo_alinhamento, pergunta_tamanho:pergunta_tamanho, pergunta_cor:perguntas_cor, perguntas_alinhamento:perguntas_alinhamento, referencia_tamanho:referencia_tamanho, referencia_cor:referencia_cor, referencia_alinhamento:referencia_alinhamento, resposta_tamanho:resposta_tamanho, resposta_cor:resposta_cor, resposta_alinhamento:resposta_alinhamento, resposta_cor_fundo:resposta_cor_fundo, botoes_cor:botoes_cor, botoes_cor_fundo:botoes_cor_fundo, pergunta_cor_fundo:pergunta_cor_fundo, pergunta_imagem_fundo:pergunta_imagem_fundo, quiz_bg_img_repeat:quiz_bg_img_repeat, quiz_bg_img_align_horizontal:quiz_bg_img_align_horizontal, quiz_bg_img_align_vertical:quiz_bg_img_align_vertical, titulo_quiz_resultados_tamanho:titulo_quiz_resultados_tamanho, titulo_quiz_resultados_cor:titulo_quiz_resultados_cor, titulo_quiz_resultados_alinhamento:titulo_quiz_resultados_alinhamento, titulo_resultatados_tamanho:titulo_resultatados_tamanho, titulo_resultados_cor:titulo_resultados_cor, titulo_resultados_alinhamento:titulo_resultados_alinhamento, acertos_tamanho:acertos_tamanho, acertos_cor:acertos_cor, acertos_alinhamento:acertos_alinhamento, descricao_tamanho:descricao_tamanho, descricao_cor:descricao_cor, descricao_alinhamento:descricao_alinhamento, referencia_resultados_tamanho:referencia_resultados_tamanho, referencia_resultados_cor:referencia_resultados_cor, referencia_resultados_alinhamento:referencia_resultados_alinhamento, botoes_resultados_cor:botoes_resultados_cor, botoes_resultados_cor_fundo:botoes_resultados_cor_fundo, imagem_resultados_fundo:imagem_resultados_fundo, resultados_cor_fundo:resultados_cor_fundo, resultado_bg_img_repeat:resultado_bg_img_repeat, resultado_bg_img_align_horizontal:resultado_bg_img_align_horizontal, resultado_bg_img_align_vertical:resultado_bg_img_align_vertical},
			success: function(e){
				//if(e == 'sucesso'){
					if(!url){
						window.location.href=prox_url;
					}else{
						window.location.href=url;
					}
				//}
			}
		});
	},

	visualizar_resultado: function()
	{
		/*
		if ($('input[name=resposta'+ currentPosition +']:checked').length) {
	    	//se estiver tudo ok, libera o resultado
			var result = ( parseInt($('#slideInner').css('margin-left'))-620 );
			var resposta = new Array();
			var id       = $('#id-quiz').val();
			var tipo     = $('#tipo-quiz').val();

			confirm(tipo);
			$('#slideInner').animate({
			    'marginLeft' : result
			},200);

			$('.slide').fadeOut(20).delay(160).fadeIn(20);
			$('#botoes').hide();
			$('.loader').show();
			if(tipo != 'resposta_certa'){
				$('input:radio:checked').each(function(){
					//resposta.push(this);
					resposta.push($(this).val());
				});
			}else{
				 $('input:checkbox:checked').each(function(){
					//resposta.push(this);
						resposta.push($(this).val());
				 });
			}

			$.ajax({
				url: '../../visualizacao/resultado_'+tipo,
				async: false,
				dataType: 'JSON',
				data: {respostas:resposta, id_quiz:id},
				success: function(e){
					$('.loader').fadeOut();
					$('#botoesResultado').show();
					$('#resultado #texto .titulo').text(e.titulo);
					$('#resultado #texto .resultado .descricao').text(e.descricao);
					$('#resultado #texto .resultado .saibaMais a').attr('href', e.link_referencia).text(e.texto_link);
					$('#resultado #imagem .alvo-perguntas').attr('src', e.imagem).text(e.texto_link);

			      	$('#botoesResultado .anterior').click(function(){ location.reload() });
			      	$('#botoesResultado .proximo').click(function(){ 
			      	$('#slideInner').css('margin-left','0');
			      	$('input[type="radio"]:checked').parent().next().css('text-decoration','underline');
				      $('#botoes').show();
				      $('#botoesResultado').hide();
				      currentPosition = ($(this).attr('id')=='proximo') 
					    ? currentPosition+1 : currentPosition-1;
				      manageControls();
	    			});
				}
			});
	    }else{ alert('Marque pelo menos uma resposta.'); }
	    */
	},

	remove_pergunta: function(url, id_quiz, imagem)
	{
		var confirmacao = confirm('Tem certeza que deseja excluir essa pergunta, uma vez excluido, todas as respostas relacionadas a esse pergunta também serão excluidas?');
		if(confirmacao)
		{
			if(imagem == 'http://localhost:8080/quiz-generate/assets/img/backgrounds/imagem.png'  || imagem == 'http://gntquizgen/homolog/assets/img/backgrounds/imagem.png'|| imagem == '../../assets/img/backgrounds/imagem.png'){
				window.location.href=url+'?id_quiz='+id_quiz;
			}else{
				window.location.href=url+'?id_quiz='+id_quiz+'&imagem='+imagem;
			}
		}
		return false;
	},

	remove_faixa: function(url, id_quiz, base_url)
	{
		var confirmacao = confirm('Tem certeza que deseja excluir essa faixa de classificação, uma vez excluida tal ação não poderá ser revertida?'+base_url);
		if(confirmacao)
		{
			//if(imagem == base_url+'assets/img/backgrounds/imagem.png'){
				window.location.href=url+'?id_quiz='+id_quiz;
			//}else{
			//	window.location.href=url+'?id_quiz='+id_quiz+'&imagem='+imagem;
			//}
		}
		return false;
	},

	remove_resposta: function(url, id_quiz)
	{
		var confirmacao = confirm('Tem certeza que deseja excluir essa resposta?');
		if(confirmacao)
		{
				$.ajax({
					url: url,
					async: false,
					data: {id_quiz:id_quiz},
					success: function(e){
						$('.excluir-dois').each(function(){
							if(this.href == url){
								$(this).parents('.header').fadeOut();
							}
						});
						
					}
				});
				//window.location.href=url+'?id_quiz='+id_quiz;
		}
		return false;
	}  
}

jQuery(document).ready(function($) {
	eventos_back.init();
});