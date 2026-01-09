<!DOCTYPE html>
<!--[if IE 7]>    <html class="lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html class="lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="pt-BR" prefix="og: http://ogp.me/ns#" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php $title = $title ? $title.' - Leco Motos':'Leco Motos - Venâncio Aires/RS'; ?>
	<title><?php echo $title; ?></title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans:300,400,600,700,800">

	<!-- inicio header/css -->
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="">
	<meta http-equiv="pragma" content="no-cache">
	<meta name="robots" content="all">
	<meta name="rating" content="general">

	<meta property="og:url" content="<?php echo url()->current(); ?>">
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="og:image" content="<?php echo $image; ?>" />

	<!-- Geo Position -->
	<meta name="DC.title" content="">
	<meta name="geo.region" content="BR-RS">
	<meta name="geo.placename" content="">
	<meta name="geo.position" content="">
	<meta name="ICBM" content="">

	<!-- icons -->
	<link rel="icon" href="<?php echo site_url('favicon.ico'); ?>">
	<link rel="shortcut icon" href="<?php echo site_url('favicon.ico'); ?>">

	<!-- css -->
	<link rel="stylesheet" href="<?php echo site_url('bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo site_url('style.css',true); ?>">
	<link rel="stylesheet" href="<?php echo site_url('responsive.css',true); ?>">

	<script src="<?php echo site_url('js/jquery.js'); ?>"></script>
	<script src="<?php echo site_url('js/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo site_url('js/scripts.js',true); ?>"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-87620259-26"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-87620259-26');
</script>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '303577118019952');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=303577118019952&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.12&appId=1254400894705580&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<header>
		<div class="container">
			<h1 class="logo">
				<a href="<?php echo site_url(''); ?>">Leco Motos</a>
			</h1>

			<div class="header-contact">
				<p>Venâncio Aires/RS</p>
				<p><a target="_blank" href="https://api.whatsapp.com/send?phone=5551994537661" class="header-whatsapp">(51) 99453-7661</a></p>
			</div>

		</div>

		<nav class="navigation">
			<div class="container">
				<div class="menu-toggle is-mobile"><span>☰</span> Menu</div>
				<ul>
					<li class=""><a class="menu" href="<?php echo site_url(''); ?>">Home</a></li>
					<li class=""><a class="menu" href="<?php echo site_url('veiculos'); ?>">Veículos</a></li>
					<li class=""><a class="menu" href="<?php echo site_url('sobre'); ?>">Sobre nós</a></li>
					<li class=""><a class="menu" href="<?php echo site_url('contato'); ?>">Contato</a></li>
					<li class="menu-item-login menu-item">
						<a href="https://www.carrosnovale.com.br/login">Login</a>
						<div class="login-box">
							<form method="post" action="https://www.carrosnovale.com.br/login" class="form-header form-login">
								<input type="hidden" name="formaction" value="login">
								<p class="login-email">
									<input type="email" placeholder="E-mail" name="login-email" required>
								</p>
								<p class="login-pass">
									<input type="password" placeholder="Senha" name="login-pass" required>
								</p>
								<p class="login-submit">
									<a class="forgot-pass" href="https://www.carrosnovale.com.br/esqueci-minha-senha/">Esqueci minha senha</a>
									<button type="submit">Entrar</button>
								</p>
							</form>
						</div>
					</li>
				</ul>
			</div>
		</nav>

	</header>

<?php if (!empty($showcase)): ?>

<div class="showcase">
<!--
	<div class="showcase-text">
		<h2>Leco Motos</h2>
		<h3>Revenda de carros multimarcas</h3>
	</div>
-->
</div>

<?php endif; ?>


<?php if (!empty($searchData)): ?>

		<div class="searchbar">
			<div class="container">


				<script>
					var searchData = <?php echo json_encode($searchData); ?>;
					function change_modelos(marca){
						console.log(marca);
						if(marca){
							if(!jQuery('#selcodmodelo').data('original')){
								jQuery('#selcodmodelo').data('original',jQuery('#selcodmodelo').html());
							}
							var options = '<option value="">Modelo</option>';
							for (i in searchData[marca]){
								options += '<option value="'+searchData[marca][i].model+'">'+searchData[marca][i].model+'</option>';
							}
							jQuery('#selcodmodelo').html(options);
						} else {
							if(jQuery('#selcodmodelo').data('original')) {
								jQuery('#selcodmodelo').html(jQuery('#selcodmodelo').data('original'));
							}
						}
						jQuery('#selcodmodelo').val('').trigger('change');
					}
				</script>

				<h4>Encontre Seu Veículo:</h4>

				<div class="searchbar-container">

					<form method="get" action="busca" class="busca1">
						<div class="busca-field">
							<input type="text" name="termo" placeholder="Pesquise por marca, modelo, ano, etc">
						</div>
						<div class="busca-field">
							<button type="submit">Buscar</button>
						</div>
					</form>

					<form method="get" action="busca" class="busca2">

						<div class="busca-field">
							<select name="marca" id="codfabricante" onchange="change_modelos(this.value);"">
								<option selected="selected" value="">Marca</option>
								<?php foreach($searchData as $marca=>$produto): ?>
									<option value="<?php echo $marca; ?>"><?php echo $marca; ?></option>
								<?php endforeach; ?>
							</select>
						</div>


						<div class="busca-field">
							<select name="modelo" id="selcodmodelo">
								<option value="" selected>Modelo</option>
								<?php
								$modelos = [];
								foreach($searchData as $marca=>$produtos):
									foreach($produtos as $produto):
										$modelos[] = $produto->model;
									endforeach;
								endforeach;
								sort($modelos);
								foreach($modelos as $modelo): ?>
								<option value="<?php echo $modelo; ?>"><?php echo $modelo; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<?php $anos = range(2000,date('Y')); ?>
					<div class="busca-field">
						<select name="ano">
							<option selected="selected" value="">Ano</option>
							<?php foreach($anos as $ano): ?>
								<option value="<?php echo $ano; ?>"><?php echo $ano; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="busca-field">
						<button type="submit">Buscar</button>
					</div>

				</form>
			</div>

		</div>
	</div>

<?php endif; ?>

	<?php echo $content ?? ''; ?>


<footer>
  <div class="container">
    <div class="footer-content">
  		<h6><a href="<?php echo site_url(''); ?>">Leco Motos</a></h6>
  		<div class="address">
  		<address>
				Rua Herval Mirim, 499 - Gressler<br>
  			Venâncio Aires/RS
  		</address>
  		<!-- <a href="mailto:email@email.com.br">email@email.com.br</a> -->
  		</div>
  		<div class="contact">
  			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>
  			<a target="_blank" href="https://api.whatsapp.com/send?phone=5551994537661" class="footer-whatsapp">51 <strong>99453 7661</strong></a><br>
  		</div>
  		<!-- <div class="fb-widget-container"> -->
  			<!-- (Facebook) -->
  		<!-- </div> -->
    </div>
	</div>
</footer>

<a target="_blank" href="https://api.whatsapp.com/send?phone=5551994537661"><div class="bt-whats_fixo">
	<i></i> Deixe uma mensagem
</div></a>


<script>
var captcha_id;
  var onloadCaptcha = function() {
  	if(jQuery('#captchaSubmit').length==0) return;
  	if(typeof captcha_id !== 'undefined' && captcha_id !== null) return; // Evita renderização múltipla
    captcha_id = grecaptcha.render('captchaSubmit', {
      'sitekey' : '6LdAdEUsAAAAADHV8ER7sfBBErFnaszQzvzcjIOc',
      'callback' : onSubmitFn
    });
  };
</script>
<script src='https://www.google.com/recaptcha/api.js?onload=onloadCaptcha&render=explicit' async defer></script>

<div class="footer-group">Parceiros <a href="https://carrosnovale.com.br" title="Carros no Vale - Compra e Venda Carros Usados e Seminovos" target="_blank">Carros no Vale</a> • <a href="https://carroreview.com" title="Carro Review, Melhores Indicações de Produtos Automotivos" target="_blank">Carro Review</a> • <a href="https://sulcarro.com.br" title="Sul Carro, compre e venda carros usados, seminovos e zero km no RS" target="_blank">Sul Carro</a>. Todos os direitos reservados.</div></body>
</html>