<?php
/**
 * Uso de cookies
 *
 * @author Eloy
 *
 * @version 0.1
 *
 */

 if(!isset ($_COOKIE['borrar'])){
	setcookie('borrar',false, httponly: true);
 }else{
	 if($_COOKIE['borrar']==true){
		 foreach($_COOKIE as $cookie){
			 setcookie($cookie, expires_or_options: time()-1);	
			}
		}
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Triki: el monstruo de las Cookies</title>
		<link rel="stylesheet" href="/css/<?=$_COOKIE['estilo']??'dark'?>.css">
	</head>

	<body>
		<?php
			if (!isset ($_COOKIE['estilo'])){
				setcookie('estilo', 'dark', httponly: true);
				header('location: act1triki.php');
			}else{
				if($_GET['estilo']==light){
					setcookie('estilo', 'light', httponly: true);
					header('location: act1triki.php');
				}
				if($_GET['estilo']==dark){
					setcookie('estilo', 'dark', httponly: true);
					header('location: act1triki.php');
				}
			}
			if (!isset ($_COOKIE['permite'])){
				setcookie('permite', true, expires_or_options: time()+60, httponly: true);
				header('location: act1triki.php');
			} 
		
			if($_COOKIE['permite']!=true){
				?>
		<div id="cookies">
			Este sitio web utiliza cookies propias y puede que de terceros.<br>
			Al utilizar nuestros servicios, aceptas el uso que hacemos de las cookies.<br>
			<div><a href="">ACEPTAR</a></div>
		</div>
		<?php
		}
		?>

		<h1>Bienvenido a la web de Triki, el monstruo de las cookies</h1>
		
		<h2>Bienvenido a la web donde no se gestionan las cookies, se devoran.</h2>
		<img src="/img/triki.jpg" alt="Imagen de triki mirando una galleta">
		
		<div id="botones">
			<a href="act1triki.php?estilo=light" class="styleButton">Claro</a>
			<a href="act1triki.php?estilo=dark" class="styleButton">Oscuro</a>
		</div>
		<br>

		<div><a href="act1triki.php?borra=true">Borrar cookies</a></div>
	</body>
</html>