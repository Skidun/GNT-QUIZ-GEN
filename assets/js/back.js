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

			if(email == '' || email == 'email'){
				$('.enviada-erro').show().text('Por favor! Informe um e-mail');
				//$('#email-login-recover').focus(function(){});
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
			eventos_back.salva_perfil(url);
			return false;
		});

		$('#salvar-e-sair-perguntas').click(function(){
			var url = this.href;
			eventos_back.salva_perguntas(url);
			return false;
		});

		//Perfil 1
		$('#btn-proxima-etapa-1-perfil').click(function(e){
			e.preventDefault();
			eventos_back.salva_perfil();
		});

		//Editar perfil
		$('.group input, .group textarea, .group .quadro img').change(function(){
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
		$('#btn-proxima-etapa2-perguntas').click(function(e){
			e.preventDefault();
			eventos_back.salva_perguntas();
			return false;
		});

		//Remover uma pergunta e suas respostas
		$(document).on('click', '.excluir-pergunta', function(e){
			e.preventDefault();
			var url = this.href, id_quiz = this.rel, alvo = this.id;
			var imagem = $('#alvo-'+alvo).attr('src').split('../../assets/server/php/files/');

			eventos_back.remove_pergunta(url, id_quiz, imagem);

			return false;
		});


		//Ordenação dos itens

	},
	//Executa a operação de recovey no banco de dados
	recovery: function(email)
	{	
		$.getJSON(
			'login/recovery',
			{email:email},
			function(e){
				if(e.result == "sucesso"){
					$('#email-recover-div, #bt-esqueci-senha-div').hide();
					$('#status-enviada').show().text('Foi lhe enviado um e-mail com uma url para reconfiguração da senha.');

				}else{
					$('.enviada-erro').show().text(e.erro);
				}
			}
		);
	},

	valida_quiz: function()
	{
		var tituloQuiz = $('#tituloQuiz').val(), tipoQuiz = $('#tipoQuiz').val();

		if(tituloQuiz == '' || tituloQuiz == 'Preencha esse campo'){
			$('#tituloQuiz').val('Preencha esse campo').css('color', '#c9451e');
		}else{
			document.form_quiz_create.submit();
		}
	},

	salva_perfil: function(url)
	{	
		$('.group').each(function(index){
			var titulo = $('#nome-perfil-'+index).val(), prox_url = $('#btn-proxima-etapa-1-perfil').attr('rel'), descricao =  $('#descricao-perfil-'+index).val(), link = $('#link-perfil-'+index).val(), texto = $('#texto-perfil-'+index).val(), imagem = $('#alvo-'+index).attr('src'), id_quiz = $('#id_quiz').val(), id_perfil = $('#id-perfil-'+index).val();
			if(titulo == '' || descricao == '' || link == '' || texto == '' || imagem == ''){
				alert('Preencha todos os campos de cada perfil');
				return false;
			}else if(!$(this).hasClass('salvo')){
				var grupo = $(this).attr('id', index);
				$.get(
					'../save_perfil',
					{titulo:titulo, descricao:descricao, link_referencia:link, texto_link:texto, imagem:imagem, id_quiz:id_quiz},
					function(e){
						if(e.result == 'sucesso'){
							$(grupo).removeClass('edit');
							$(grupo).addClass('salvo');
							if(!url){
								window.location.href=prox_url;
							}else{
								window.location.href=url
							}
						}
					}
				);
				console.log(index+' | Titulo: '+titulo+' Descrição: '+descricao+ ' link: '+link+' Texto do Link: '+texto+ ' Imagem: '+imagem);
			}else if($(this).hasClass('edit')){
				$.get(
					'../update_perfil/',
					{id:id_perfil, titulo:titulo, descricao:descricao, link_referencia:link, texto_link:texto, imagem:imagem},
					function(e){
						if(e == 'sucesso'){
							$(grupo).removeClass('edit');
							$(grupo).removeClass('salvo');
							if(!url){
								window.location.href=prox_url;
							}else{
								window.location.href=url
							}
							
							return false;
						}else{
							console.log('houve uma falha');
						}
					}
				);
			}else{
				if(!url){
					window.location.href=prox_url;
				}else{
					window.location.href=url
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
		$('.group').each(function(index){
			//Variáveis que pegam os
			var nome 		 = $('#nome-pergunta-'+index).val(), prox_url = $('#btn-proxima-etapa-2-perguntas').attr('href'), link = $('#link-pergunta-'+index).val(), texto = $('#texto-pergunta-'+index).val(), imagem = $('#alvo-pergunta-'+index).attr('src'), id_quiz = $('#id_quiz').val();
			var box_resposta = '#sortable'+index+' .header';
			 $(box_resposta+' .input input[name="nome"]').each(function(){
			 	if(this.value == ''){
			 		alert('Preencha todas as respostas');
			 	}
			 });
			//Verifica se os campos nome da pergunta, imagem e resposta não estão vazios.
			if(nome == '' || imagem == ''){
				alert('Preencha os campos da pergunta e suas respostas');
				return false;
			}else if(!$(this).hasClass('salvo')){
				var grupo = $(this).attr('id', index);
				//Salva a pergunta via ajax
				$.getJSON(
					'../save_pergunta_perfil',
					{texto:nome, link_referencia:link, texto_link:texto, imagem:imagem, id_quiz:id_quiz},
					function(e){
						if(e.result == 'sucesso'){
							$(grupo).addClass('salvo');
							$(grupo).removeClass('edit');
							$('#id-pergunta-'+index).val(e.id_pergunta);

							//Vamos salvar a resposta agora
							var id_pergunta = e.id_pergunta, tipo_quiz = $('#tipo_quiz').val();

							$(box_resposta).each(function(index_resp){
											var resposta 	= $('#nome-resposta-'+index_resp).val(), perfil_resposta = $('#perfil-resposta-'+index_resp).val();
							    			alert(resposta+' / '+perfil_resposta+' / '+id_pergunta+' / '+id_quiz+' / '+tipo_quiz);
							    			$.get('../../respostas/save_resposta_perfil',
							    				{texto:resposta, tipo_resposta:tipo_quiz, perfil_resposta:perfil_resposta, id_pergunta:id_pergunta, id_quiz:id_quiz},
							    				function(e_resp){
							    					if(e_resp == 'sucesso'){
							    						console.log('Sucesso');
							    					}else{
							    						console.log('Falha ao cadastrar resposta');
							    					}
							    				}
							    			);
							});
						}else{
							alert('Falha');
						}
					}
				);

				console.log(index+' | Titulo: '+nome+' link: '+link+' Texto do Link: '+texto+ ' Imagem: '+imagem);
				if(!url){
					window.location.href=prox_url;
				}else{
					window.location.href=url;
				}
			}
			//window.location.href=prox_url;	
		});
	},

	remove_pergunta: function(url, id_quiz, imagem)
	{
		var confirmacao = confirm('Tem certeza que deseja excluir essa pergunta, uma vez excluido, todas as respostas relacionadas a esse pergunta também serão excluidas? '+imagem);
		if(confirmacao)
		{
			if(imagem == 'http://localhost:8080/quiz-generate/assets/img/backgrounds/imagem.png' || imagem == '../../assets/img/backgrounds/imagem.png'){
				window.location.href=url+'?id_quiz='+id_quiz;
			}else{
				window.location.href=url+'?id_quiz='+id_quiz+'&imagem='+imagem;
			}
		}
		return false;
	}  
}

jQuery(document).ready(function($) {
	eventos_back.init();
});