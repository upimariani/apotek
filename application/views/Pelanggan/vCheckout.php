<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Male_Fashion Template">
	<meta name="keywords" content="Male_Fashion, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>APOTEK AGRA MEDIKA</title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="<?= base_url('asset/malefashion-master/') ?>css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('asset/malefashion-master/') ?>css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('asset/malefashion-master/') ?>css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('asset/malefashion-master/') ?>css/magnific-popup.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('asset/malefashion-master/') ?>css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('asset/malefashion-master/') ?>css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('asset/malefashion-master/') ?>css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('asset/malefashion-master/') ?>css/style.css" type="text/css">
</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Offcanvas Menu Begin -->
	<div class="offcanvas-menu-overlay"></div>
	<div class="offcanvas-menu-wrapper">
		<div class="offcanvas__option">
			<div class="offcanvas__links">
				<a href="#">Sign in</a>
			</div>

		</div>
		<div class="offcanvas__nav__option">
			<a href="#" class="search-switch"><img src="<?= base_url('asset/malefashion-master/') ?>img/icon/search.png" alt=""></a>
			<a href="#"><img src="img/icon/heart.png" alt=""></a>
			<a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
			<div class="price">$0.00</div>
		</div>
		<div id="mobile-menu-wrap"></div>
		<div class="offcanvas__text">
			<p>Free shipping, 30-day return or refund guarantee.</p>
		</div>
	</div>
	<!-- Offcanvas Menu End -->

	<!-- Header Section Begin -->
	<header class="header">
		<div class="header__top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-7">
						<div class="header__top__left">
							<p>Selamat Datang Pelanggan...</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-5">
						<div class="header__top__right">
							<div class="header__top__links">
								<a href="#">Sign in</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="header__logo">
						<a href="./index.html"><img src="img/logo.png" alt=""></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<nav class="header__menu mobile-menu">
						<ul>
							<li class="active"><a href="<?= base_url('Pelanggan/cKatalog') ?>">Home</a></li>
							<li><a href="<?= base_url('Pelanggan/cPesananSaya') ?>">Pesanan Saya</a></li>

							<li><a href="<?= base_url('Pelanggan/cChatting') ?>">Customer Service</a></li>
						</ul>
					</nav>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="header__nav__option">
						<?php
						$qty = 0;
						foreach ($this->cart->contents() as $key => $value) {
							$qty += $value['qty'];
						}
						?>
						<a href="<?= base_url('Pelanggan/cKatalog/cart') ?>"><img src="<?= base_url('asset/malefashion-master/') ?>img/icon/cart.png" alt=""> <span><?= $qty ?></span></a>
						<div class="price">Rp. <?= number_format($this->cart->total())  ?></div>
					</div>
				</div>
			</div>
			<div class="canvas__open"><i class="fa fa-bars"></i></div>
		</div>
	</header>
	<!-- Header Section End -->
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__text">
						<h4>Check Out</h4>
						<div class="breadcrumb__links">
							<a href="./index.html">Home</a>
							<a href="./shop.html">Shop</a>
							<span>Check Out</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->

	<!-- Checkout Section Begin -->
	<section class="checkout spad">
		<div class="container">
			<div class="checkout__form">
				<form action="<?= base_url('Pelanggan/cCheckout/order') ?>" method="POST">
					<div class="row">
						<div class="col-lg-8 col-md-6">
							<h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
									here</a> to enter your code</h6>
							<h6 class="checkout__title">Billing Details</h6>
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Fist Name<span>*</span></p>
										<input type="text">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Last Name<span>*</span></p>
										<input type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Provinsi<span>*</span></p>
										<select name="provinsi" class="form-control" required>

										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Kota<span>*</span></p>
										<select name="kota" class="form-control mb-4" required>

										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Expedisi<span>*</span></p>
										<select name="expedisi" class="form-control mb-4" required>

										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Paket<span>*</span></p>
										<select name="paket" class="form-control mb-4" required>

										</select>
									</div>
								</div>
							</div>






						</div>
						<div class="col-lg-4 col-md-6">
							<div class="checkout__order">
								<h4 class="order__title">Your order</h4>
								<div class="checkout__order__products">Product <span>Total</span></div>
								<ul class="checkout__total__products">
									<?php
									foreach ($this->cart->contents() as $key => $value) {
									?>
										<li><?= $value['qty'] ?> x <?= $value['name'] ?><span>Rp. <?= number_format($value['qty'] * $value['price']) ?></span></li>
									<?php
									}
									?>

								</ul>
								<ul class="checkout__total__all">
									<li>Subtotal <span>Rp. <?= number_format($this->cart->total()) ?></span></li>
									<li>Ongkir <span id="ongkir"></span></li>
									<li>Total <span id="total_bayar"></span></li>
								</ul>

								<p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
									ut labore et dolore magna aliqua.</p>

								<button type="submit" class="site-btn">PLACE ORDER</button>
							</div>
						</div>
					</div>
					<input type="text" name="estimasi">
					<input type="text" name="ongkir">
					<input type="text" name="total_bayar">

				</form>
			</div>
		</div>
	</section>


	<!-- Js Plugins -->
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/bootstrap.min.js"></script>
	<!-- <script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.countdown.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.slicknav.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/mixitup.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/owl.carousel.min.js"></script> -->
	<script src="<?= base_url('asset/malefashion-master/') ?>js/main.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				type: "POST",
				url: "http://localhost/apotek/Pelanggan/Ongkir/provinsi",
				success: function(hasil_provinsi) {
					console.log(hasil_provinsi);
					$("select[name=provinsi]").html(hasil_provinsi);
				}
			});
			$("select[name=provinsi]").on("change", function() {
				var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
				$.ajax({
					type: "POST",
					url: "http://localhost/sumi-butik/pelanggan/ongkir/kota",
					data: 'id_provinsi=' + id_provinsi_terpilih,
					success: function(hasil_kota) {
						$("select[name=kota]").html(hasil_kota);
					}
				});
			});

			$("select[name=kota]").on("change", function() {
				$.ajax({
					type: "POST",
					url: "http://localhost/sumi-butik/pelanggan/ongkir/expedisi",
					success: function(hasil_expedisi) {
						$("select[name=expedisi]").html(hasil_expedisi);
					}
				});
			});


			$("select[name=expedisi]").on("change", function() {
				//mendapatkan expedisi terpilih
				var expedisi_terpilih = $("select[name=expedisi]").val()

				//mendapatkan id kota tujuan terpilih
				var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');

				//alert(total_berat);
				$.ajax({
					type: "POST",
					url: "http://localhost/sumi-butik/pelanggan/ongkir/paket",
					data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=1000',
					success: function(hasil_paket) {
						$("select[name=paket]").html(hasil_paket);
					}
				});
			});


			$("select[name=paket]").on("change", function() {
				//menampilkan ongkir
				var dataongkir = $("option:selected", this).attr('ongkir');
				var reverse = dataongkir.toString().split('').reverse().join(''),
					ribuan_ongkir = reverse.match(/\d{1,3}/g);
				ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
				//alert(dataongkir);
				$("#ongkir").html("Rp. " + ribuan_ongkir)
				//menghitung total bayar
				var ongkir = $("option:selected", this).attr('ongkir');
				var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);

				// //pelanggan istimewa
				// var istimewa = parseInt(total_bayar) - 50000;

				// var reverse3 = istimewa.toString().split('').reverse().join(''),
				// 	ribuan_istimewa = reverse3.match(/\d{1,3}/g);
				// ribuan_istimewa = ribuan_istimewa.join(',').split('').reverse().join('');
				// $("#pelanggan_istimewa").html("Rp. " + ribuan_istimewa);

				var reverse2 = total_bayar.toString().split('').reverse().join(''),
					ribuan_total = reverse2.match(/\d{1,3}/g);
				ribuan_total = ribuan_total.join(',').split('').reverse().join('');
				$("#total_bayar").html("Rp. " + ribuan_total);

				//estimasi dan ongkir
				var estimasi = $("option:selected", this).attr('estimasi');
				$("input[name=estimasi]").val(estimasi);
				$("input[name=ongkir]").val(dataongkir);
				$("input[name=total_bayar]").val(total_bayar);
				// $("input[name=istimewa]").val(istimewa);
			});

		});
	</script>
</body>

</html>