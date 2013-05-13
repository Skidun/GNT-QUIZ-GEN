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
			$('.nav2 , .input , .dk_options_inner , .dk_container , .dk_toggle').each(function() {
				PIE.attach(this);
			});
		}

	//Início
	$('.esqueceu').click(function(){
		$('form.login').slideUp(200);
		$('form.esqueci').delay(400).slideDown(200);
	});
	
	$('.esqueci input[type="submit"]').click(function(){
		$('.enviada').show();
		$('.esqueci .input').hide();
	});
	
	$('.esqueci .login-voltar').click(function(){
		$('form.esqueci').slideUp(200);
		$('form.login').delay(400).slideDown(200);
	});
	
	$('input[type="text"][name="senha-nova"],input[type="text"][name="repita"]').focus(function(){
		$(this).attr('type','password');
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

	//Accordion
	 $( "#accordion,#accordion2" )
	.accordion({
		active: false,
		header: "> div > .header"
	})
	.sortable({
		axis: "y",
		handle: ".header",
		stop: function( event, ui ) {
		// IE doesn't register the blur when sorting
		// so trigger focusout handlers to remove .ui-state-focus
		ui.item.children( ".header" ).triggerHandler( "focusout" );
		}
	});

	//calcula quantos sortables tem e carrega
			$("#sortable1,#sortable2").sortable();

	
	//File Upload	
   $('#fileupload')
   .fileupload({
        url: 'assets/server/php/',
        dataType: 'json',
        done: function (e, data) {			
            $.each(data.result.files, function (index, file) {
				$('img#alvo').attr('src','assets/server/php/files/'+file.name);
            });
        }
    });
			
	//Novo Perfil
	$(".novo-perfil").click(function(){
		$('#accordion').append('<div class="group"><div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="Carente" size=""/></div><span class="arrow"></span></div><div class="body"><div class="texto"><label for="descricao">Descrição</label><div class="textarea"><textarea name="descricao" cols="" rows="">Você é a amiga da galera! Seu tempo livre é todo dedicado a amigos e pessoas queridas, por isso você nem acha que precisa gastar os neurônios pensando em como fazer para encontrar um namorado. Solidão? Que nada!</textarea></div><label for="link">Link de referência:</label><div class="input"><input type="text" name="link" value="http://www.gnt.com.br/post-falando-sobre-esse-perfil.html" size=""/></div><label for="texto">Texto do link de referência:</label><div class="input"><input type="text" name="texto" value="Saiba mais" size=""/></div></div><div class="imagem"><label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label><div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png" name="imagem"/></div><span class="btn btn-success fileinput-button"><input id="fileupload" type="file"/></span></div></div></div>');
		//scrolla pro fim da página
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});
	
	//Perguntas e Respostas
	$(document).on('click','.nova-resposta',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		var respostaNumero = $(this).parent().find('.sorteia').attr('id').slice(-1);
		alert(respostaNumero);
		var grupoNumero = $(this).parent().find(".header").length;
		$(this).parent().find('.sorteia').append('<div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><select name="resposta-'+respostaNumero+grupoNumero+'" class="default"><option value="1">Amiga de todos</option><option value="2">Pegadora</option><option value="3">Amiga de todos</option><option value="4">Pegadora</option></select></div>');
		//coloca o novo select no esquema
		$('.default').dropkick();
		return false;
	});
	
	$(document).on('click','.nova-pergunta',function(){
		//gera uma combinacao unica de numero para o novo select[name], assim não dá conflito
		//por exemplo, resposta-21, é o select do grupo 2(#sortable2) e o segundo select desse grupo
		$("#accordion2").append('<div class="group"><div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><span class="arrow"></span></div><div class="body"><div id="perguntas"><div class="texto"><label for="link">Link de referência:</label><div class="input"><input type="text" name="link" value="" size=""/></div><label for="texto">Texto do link de referência:</label><div class="input"><input type="text" name="texto" value="" size=""/></div></div><div class="imagem"><label for="imagem">Imagem relacionada:<span>Dimensões: 240px x 260px</span></label><div class="quadro"><img id="alvo" src="assets/img/backgrounds/imagem.png"/></div><form id="fileupload" action="assets/server/php/" method="POST" enctype="multipart/form-data"><span class="btn btn-success fileinput-button"><input id="file" type="file"/></span></form></div></div><div id="respostas"><div class="titulo-respostas">Respostas:</div><div id="sortable'+($(".group").length+1)+'" class="sorteia"><div class="header"><span class="icon"></span><div class="input"><input type="text" name="nome" value="" size=""/></div><select name="resposta-'+($(".group").length+1)+'0" class="default"><option value="1">Amiga de todos</option><option value="2">Pegadora</option><option value="3">Amiga de todos</option><option value="4">Pegadora</option></select></div></div><a class="nova-resposta" href="javascript:void(0)"></a></div></div></div>');
		//coloca o novo elemento de accordion no esquema
		$("#accordion2").accordion('destroy').sortable('destroy');
		$("#accordion2").accordion({active:$("#accordion2 .group").length-1,header:"> div > .header"}).sortable({axis:"y",handle:".header",stop:function(event,ui){ui.item.children(".header").triggerHandler("focusout")}});
		//coloca o novo select no esquema
		$('.default').dropkick();
		//calcula quantos sortables tem e carrega
		var length = $(".group").length;
		for( i=0; i < length; i++){
			$("#sortable"+i).sortable();
		}
		//scrolla pro fim da página
		$('html, body').animate({scrollTop:$(document).height()}, 1000);
		return false;
	});

	//Editor de Texto
	////Tamanho da fonte
	$('#dk_container_titulo-tamanho a').click(function(){
		$('input[name="ititulo-tamanho"]').val('font-size:'+$(this).text());
		$('.preview #nome').css('font-size',$(this).text());
	});
	
});