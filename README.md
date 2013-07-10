GNT QUIZ GEN
============

Sistema gerador de Quizes para o site do canal GNT.

<h2>Instalação da aplicação em ambiente local</h2>
<ul>
	<li>
		Clone o repositório https://github.com/Skidun/GNT-QUIZ-GEN.git (git clone https://github.com/Skidun/GNT-QUIZ-GEN.git) para o document root do seu servidor local, Atualmnte a aplicão se encontra no branch back_dev, os arquivos de front-end sem funcionalidade estão no branch front.
	</li>
	<li>No seu servidor local crie uma base de dados mysql com o nome de "quiz" (minúsculo sem aspas). Após isso importe o arquivo quiz.sql que está no diretório assets do repositório que você clonou. </li>
	<li>Para a base de dados que você acabou de criar crie o usuário "gntquiz" com senha "skidun08". Após realizar as configurações anteriores de ambiente, basta acessa a aplicação no seu local host. </li>
	<li>Caso precise alterar as configurações do banco de dados no sistema altere o arquivo "application/config/database.php".</li>
	<li>Antes acessar o sistema edite o arquvo "application/config/config.php" e em $config['base_url']	= '' insira o caminho da sua aplicação em localhost.</li>
	<li>No primeiro acesso ao sistema você será redirecionado para o controlador install onde você irá cadastrar seu e-mail e uma senha, logo após você será redirecionado ao login, onde deverá repetir seu usuário e a senha cadastrados anteriormente para entrar no sistema.</li>
	<li>Pronto o sistema já está instalado e você já tem acesso total ao sistema.</li>
</ul>
<h2>Documentação de funcionalidade da aplicação</h2>
<a href="https://docs.google.com/a/skidun.com.br/document/d/1p58w87IsHUNFcaF7wb4AspSa-YkXghv9QdHSe9oD2Dw/edit" target="_blank">Documentação</a>
