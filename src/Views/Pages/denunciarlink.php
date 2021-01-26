<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniki - Denunciar Link</title>
	<link rel="stylesheet" href="Views/Pages/css/denuncia.css">
	<meta name="description" content="Denuncie links maliciosos encurtados.">
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

	<section class="banner">

		<h1>Encontrou um link encurtado malicioso?</h1>
		<p>Algumas pessoas podem se aproveitar do nosso encurtador, para encurtar links maliciosos.
Nós ajude denunciando qualquer link malicioso.
		</p>

	</section>

	<section class="container-fluid form">

		<div class="row center-sm center-md center-lg">
			<div class="col-6 center-lg col-sm-10">
				<form method="post">
					<div class="input-group">
						<p>Link malicioso</p>
						<input type="text" name="url" placeholder="https://www.knil.xyz/000">

						<p>Motivo da denúncia</p>
						<input type="text" name="motivo" placeholder="Explique o motivo da denuncia">
					</div>

					<button type="submit" name="action" class="btn">Denunciar</button>
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

			<li>
				<a href="/home">Home</a>
			</li>
			<li>
				<a href="/monitorar-link">Monitorar link</a>
			</li>

			<li>
				<a href="/contato">Contato</a>
			</li>

			<li>
				<a href="/denunciar-link">Denunciar link</a>
			</li>

				</ul>
			</div>

			<div class="col-sm-7 col-2 center-sm">
				<ul>

					<li><a href="/encurtador-de-link-personalizado">Encurtador de link personalizado</a></li>
					<li><a href="/gerador-link-whatsapp">Gerador de link para whatsapp</a></li>
					<li><a href="/gerador-de-senhas">Gerador de senhas</a></li>

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
