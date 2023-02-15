<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contacto | Emmisa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/x-icon" href="media\images\box.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- header.php -->
	<?php include("header-center.php"); ?>
	
	<!-- Title page -->
	<section class="how-overlay2 bg-img1" style="background-image: url(images/bg-07.jpg);">
		<div class="container">
			<div class="txt-center p-t-160 p-b-165">
				<h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
					PLATIQUEMOS
				</h2>

				<span class="txt-m-201 cl0 flex-c-m flex-w">
					<a href="index.php" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
						Inicio
					</a>

					<span>
						/ Contacto
					</span>
				</span>
			</div>
		</div>
	</section>
	
	<!-- Form Contact -->
	<section class="bg0 p-t-145 p-b-100">
		<div class="container">
			<div class="size-a-1 flex-col-c-m p-b-70">
				<div class="txt-center cl10 how-pos1-parent m-b-14">
					Contáctanos

					<div class="how-pos1">
						<img src="images/icons/symbol-02.png" alt="IMG">
					</div>
				</div>

				<h3 class="txt-center txt-l-101 cl3 respon1">
					ENVIANOS UN MENSAJE
				</h3>
			</div>

			<form id="contact-form" class="validate-form" method="post" action="includes/contact-form.php" name="contact">
				<div class="row">
					<div class="col-sm-6 p-b-30">
						<div class="validate-input" data-validate = "El nombre es Requerido">
							<input class="txt-s-101 cl3 plh1 size-a-46 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="name" placeholder="Nombre Completo *">
						</div>
					</div>

					<div class="col-sm-6 p-b-30">
						<div class="validate-input" data-validate = "Porfavor ingresa un Correo Válido">
							<input class="txt-s-101 cl3 plh1 size-a-46 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="email" placeholder="Correo Electrónico *">
						</div>
					</div>

					<div class="col-sm-6 p-b-30">
						<div>
							<input class="txt-s-101 cl3 plh1 size-a-46 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="address" placeholder="Dirección">
						</div>
					</div>

					<div class="col-sm-6 p-b-30">
						<div class="validate-input" data-validate = "El Télefono es Requerido">
							<input class="txt-s-101 cl3 plh1 size-a-46 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="phone" placeholder="Télefono *">
						</div>
					</div>

					<div class="col-12 p-b-30">
						<div class="validate-input" data-validate = "El Mensaje es Requerido">
							<textarea class="txt-s-101 cl3 plh1 size-a-47 bo-all-1 bocl15 focus1 p-rl-20 p-tb-10" name="msg" placeholder="Tu mensaje *"></textarea>
						</div>	
					</div>
				</div>

				<div class="flex-c p-t-10">
					<button class="flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04">
						Enviar
					</button>
				</div>
			</form>
		</div>
	</section>

	<!-- Contact -->
	<section class="container p-t-90 p-b-45">
		<div class="row">
			<div class="col-sm-6 col-lg-3 p-b-50">
				<div class="flex-col-c-m p-rl-25">
					<div class="wrap-pic-max-s p-b-25">
						<img src="images/icons/icon-address.png" alt="IMG">
					</div>

					<h5 class="txt-m-114 cl3 txt-center p-b-9">
						Dirección
					</h5>

					<span class="txt-s-101 cl6 txt-center">
						Alambiques 435 Bodega 1
						<br>
						Col Álamo Industrial
						<br>
						C.P. 44490 
					</span>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<div class="flex-col-c-m p-rl-25">
					<div class="wrap-pic-max-s p-b-25">
						<img src="images/icons/icon-phone-03.png" alt="IMG">
					</div>

					<h5 class="txt-m-114 cl3 txt-center p-b-9">
						Télefonos
					</h5>

					<span class="txt-s-101 cl6 txt-center">
						33-43-55-5025 (Oficina)
					</span>

					<span class="txt-s-101 cl6 txt-center">
						33-43-55-5026 (Oficina)
					</span>

					<span class="txt-s-101 cl6 txt-center">
						33 14-66-2151 (Celular)
					</span>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<div class="flex-col-c-m p-rl-25">
					<div class="wrap-pic-max-s p-b-25 p-t-5">
						<img src="images/icons/icon-mail-03.png" alt="IMG">
					</div>

					<h5 class="txt-m-114 cl3 txt-center p-b-9">
						Correo Electrónico
					</h5>

					<span class="txt-s-101 cl6 txt-center">
						compras@emmisa.com.mx
					</span>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<div class="flex-col-c-m p-rl-25">
					<div class="wrap-pic-max-s p-b-25">
						<img src="images/icons/icon-phone-03.png" alt="IMG">
					</div>

					<h5 class="txt-m-114 cl3 txt-center p-b-9">
						Whatsapp
					</h5>

					<span class="txt-s-101 cl6 txt-center">
						Área Comercial: <br> (61-41-91-2208)
					</span>

					<span class="txt-s-101 cl6 txt-center">
						Atención a Cliente: <br> (33-14-66-2155)
					</span>
				</div>
			</div>
		</div>
	</section>

	<!-- Map -->
	<div class="map">
		<div class="contact-map size-h-7"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d933.5559591962106!2d-103.33157055189187!3d20.619731160182802!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b353350caf87%3A0x36dfa7472aa808f7!2sEmpaques%20Microcorrugados%20Industriales!5e0!3m2!1ses!2smx!4v1676134651638!5m2!1ses!2smx" style="border:0; height: 100%; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
	</div>

	<!-- footer.php -->
	<?php include("footer.php"); ?>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
<!--===============================================================================================-->
	<script src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/contact.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>