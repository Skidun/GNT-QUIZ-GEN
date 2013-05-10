$(function(){

	//Limpa onfocus, retorna onblur
	$('input[type="text"]').on({
		focus: function(){
			var $this = $(this);
			if($this.val() === $this[0].defaultValue) $this.val('');
		},
		blur: function(){
			var $this = $(this);
			if($this.val() === '') $this.val($this[0].defaultValue);
		}
	});
	
	//Borda Arredondada no IE
	if (window.PIE) {
			$('.nav2 , .novo .input').each(function() {
				PIE.attach(this);
			});
		}

	//Início
	$('.esqueceu').click(function(){
		$('form.login').slideUp(200);
		$('form.esqueci').delay(400).slideDown(200);
	});
	
	/*$('.esqueci input[type="submit"]').click(function(){
		$('.enviada').show();
		$('.esqueci .input').hide();
	});*/
	
	$('.esqueci .login-voltar').click(function(){
		$('form.esqueci').slideUp(200);
		$('form.login').delay(400).slideDown(200);
	});
	
	$('#senha-login, input[type="text"][name="senha-nova"],input[type="text"][name="repita"], #txt-password, #txt-password-repeat').focus(function(){
		$(this).attr('type','password');	
	});

	$('#senha-login, input[type="text"][name="senha-nova"],input[type="text"][name="repita"], #txt-password, #txt-password-repeat').blur(function(){
		if($(this).val() == '' || $(this).val() == 'senha' || $(this).val() == 'senha nova' || $(this).val() == 'repita a senha nova'){
			$(this).attr('type','text');	
		}
	});
	
	//Todos os quizes
	////Paginacao
	$('.carregar-mais').click(function(){
		//simula carregamento de 10 links
		for (var i=0;i<9;i++)
		{
			var titulo	 					= 'Quiz de maquiagem';
			var tipo 						= 'várias respostas corretas';
			var dataEdicao 					= '13/11/2012';
			var linkVerEmbutir 			= '#';
			var linkNomeTipo 			= '#';
			var linkPerfis 				= '#';
			var linkPerguntasRespostas 	= '#';
			var linkCustomizacao 			= '#';
			var linkExcluir 				= '#';
			$('.box tbody').append('<tr><td><div class="texto"><p>'+titulo+'</p><span>tipo: '+tipo+' | editado em: '+dataEdicao+'</span></div><div class="botoes"><a class="ver-e-embutir" href="'+linkVerEmbutir+'"></a><ul class="menu-editar"><li><div class="editar"></div><ul class="nav2"><li><a href="'+linkNomeTipo+'">nome e tipo</a></a></li><li><a href="'+linkPerfis+'">perfis</a></a></li><li><a href="'+linkPerguntasRespostas+'">perguntas & respostas</a></a></li><li><a href="'+linkCustomizacao+'">customizacao</a></a></li><li><a href="'+linkExcluir+'">excluir</a></a></li></ul></li></ul></div></td></tr>');
		}
		//scrolla pro fim da página
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});
	
	//Novo Quiz
	$('.default').dropkick();
	
});