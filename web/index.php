<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
	session_start();
	if (!empty($_SESSION["emailUsuario"])|| !empty($_SESSION["senhaUsuario"]) || !empty($_SESSION['idUsuario']) || !empty($_SESSION['user']))
		header("location: home.php");
	if (!empty($_COOKIE["tempo"]))
		header("location: home.php");
?>
<!doctype html>
<html>
	<?php include("head.php");?>
	<body>
		<div class="header" id="home">
			<?php include("menu.php"); ?>
			
			<div class="header-banner">
					<!-- Top Navigation -->
					<?php
						include("meio1.php");
						include("aplicacoes.php");
					?>
					
			</div>
			<div class="our-work" id="our-work">
				<?php
					include("mini_galeria.php");
				?>
			</div>
			<!--<div class="testimonials">
				<?php
					//include("comentarios.php");
				?>
			</div>
			</div>
			<section class="slider">
				<?php //include("slider.php"); ?>
			</section>
			<div class="subscribe-label">
				<?php //include("subscribe.php"); ?>
			</div>
			<div class="social-feeds">
			<div class="container">
				<?php //include("slider2.php"); ?>
			</div>
            </div>-->
            <div class="clearfix"></div>
			</div>
			<? include ("rodape.php"); ?>
			<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</body>
</html>
