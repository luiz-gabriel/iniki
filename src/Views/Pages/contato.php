<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniki - Denunciar Link</title>
	<link rel="stylesheet" href="Views/Pages/css/contato.css">
	<meta name="keywords" content="">
	<meta name="description" content="">
</head>
<body>

	<header class="container-fluid">
		<div class="row middle-md middle-lg around-lg">
			<div class="col-sm-12 col-2 center-sm center-md start-lg">

				<a href="https://iniki.xyz/">
					<h1>Iniki.xyz</h1>
				</a>

			</div>

			<div class="col-2 center-md center-lg menu-desk">
				<nav class="nav-desk">
					<ul class="navbar">
						<li>
							<a href="https://iniki.xyz/">Home</a>
						</li>

						<li class="btn_sub">Serviços
							<ul class="submenu">
								<li>
									<a href="https://iniki.xyz/monitorar-link">Monitorar link</a>
								</li>

								<li>
									<a href="https://iniki.xyz/encurtador-de-link-personalizado">Encurtador de link personalizado</a>
								</li>

								<li>
									<a href="https://iniki.xyz/gerador-link-whatsapp">Gerador de link para whatsapp</a>
								</li>

								<li>
									<a href="https://iniki.xyz/gerador-de-senhas">Gerador de senhas</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="https://iniki.xyz/contato">Contato</a>
						</li>
						<li>
							<a href="https://iniki.xyz/denunciar-link">Denunciar link</a>
						</li>
					</ul>
				</nav>
			</div>

			<div class="col-2 end-lg end-md">
				<select class="linguagem">
					<option>PT-BR</option>
				</select>
			</div>
		</div>

		<button type="button" class="btn-menu">
			<img src="Views/Pages/img/menu.svg" alt="botao_menu">
		</button>

		<nav class="nav-mobile">

				<ul class="navbar">

					<a href="https://iniki.xyz"><h1>Iniki.xyz</h1></a>
					<div class="col-2 end-lg end-md">
						<select>
							<option>PT-BR</option>
						</select>
					</div>

					<li>
						<a href="https://iniki.xyz/">Home</a>
					</li>

					<li>
						<a href="iniki.xyz/denunciar-link">Denunciar link</a>
					</li>

					<li>
						<a href="https://iniki.xyz/contato">Contato</a>
					</li>

					<li>
						<a href="https://iniki.xyz/monitorar-link">Monitorar link</a>
					</li>

					<li>
						<a href="https://iniki.xyz/encurtador-de-link-personalizado">Encurtador de link personalizado</a>
					</li>

					<li>
						<a href="https://iniki.xyz/gerador-link-whatsapp">Gerador de link para whatsapp</a>
					</li>

					<li>
						<a href="https://iniki.xyz/gerador-de-senhas">Gerador de senhas</a>
					</li>

					<button type="button" class="btn-close">Fechar</button>

					<p>Todos os direitos reservados à Iniki.xyz</p>

				</ul>
			</nav>
	</header>
	
	<section class="container-fluid contato">

		<div class="row center-sm center-md center-lg">
			<div class="col-sm-10 col-6 collumn middle-sm">
				<h3>Entre em contato</h3>
				<form  method="post" accept-charset="utf-8">
					<div class="input">
						<p>Nome</p>
						<input type="text" name="name">
					</div>

					<div class="input">
						<p>Assunto</p>
						<input type="text" name="assunto">
					</div>

					<div class="input">
						<p>Email</p>
						<input type="email" name="email">
					</div>

					<div class="input">
						<p>Mensagem</p>
						<textarea name="menssagem"></textarea><br>
					</div>

					<button type="submit" name="acao" class="btn">Enviar</button>
				</form>

			</div>

			<div class="form">
			</div>
		</div>

	</section>

	<!-- FOOTER -->
	<footer class="container-fluid">

		<div class="row center-sm middle-md middle-lg between-lg between-md">
			<div class="col-sm-12 col-3 center-sm">
				<a href="home.html"><h1>Iniki.xyz</h1></a>
			</div>

			<div class="col-sm-7 col-3 center-sm">
				<ul>

					<li><a href="home.html">Home</a></li>
					<li><a href="denuncia.html">Denunciar link</a></li>
					<li><a href="contato.html">Contato</a></li>
					<li><a href="monitorar.html">Monitorar link</a></li>

				</ul>
			</div>

			<div class="col-sm-7 col-2 center-sm">
				<ul>

					<li><a href="personalizar_link.html">Encurtador de link personalizado</a></li>
					<li><a href="link_whatsapp.html">Gerador de link para whatsapp</a></li>
					<li><a href="gerar_senha.html">Gerador de senhas</a></li>

				</ul>
			</div>

			<div class="col-sm-12 col-3 center-sm">
				<p>Todos os direitos resevados à Iniki.xyz</p>
			</div>
		</div>

	</footer>

	<!-- Scripts -->
	<script src="Views/Pages/js/menu_mobile.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-178631782-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-178631782-1');
	</script>
</body>
</html>
