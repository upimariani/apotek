<!-- Hero Section Begin -->
<section class="hero">
	<div class="hero__slider owl-carousel">
		<img style="width: auto;" src="<?= base_url('asset/malefashion-master/') ?>img/hero/banner.png">
		<img style="width: auto;" src="<?= base_url('asset/malefashion-master/') ?>img/hero/APOTEK.png">


	</div>
</section>
<!-- Hero Section End -->



<!-- Product Section Begin -->
<hr>
<?php
if ($this->session->userdata('success') != '') {
?>
	<div class="alert alert-success" role="alert">
		<?= $this->session->userdata('success') ?>
	</div>
<?php
}
?>
<!-- Banner Section Begin -->
<hr class="mt-5">
<?php
//menampilkan produk yang terlaris
$dt_produk_terlaris = $this->db->query("SELECT SUM(qty) as terjual, obat.id_obat, nama_obat, foto, harga FROM `detail_obat` JOIN obat ON detail_obat.id_obat=obat.id_obat GROUP BY obat.id_obat ORDER BY terjual DESC LIMIT 4")->result();
?>
<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="filter__controls">
					<li>Best Sellers</li>
				</ul>
			</div>
		</div>
		<div class="row product__filter">
			<?php
			foreach ($dt_produk_terlaris as $key => $value) {

			?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
					<div class="product__item">
						<div class="product__item__pic set-bg" data-setbg="<?= base_url('asset/foto-obat/' . $value->foto) ?>">

							<ul class="product__hover">
								<li><a href="<?= base_url('Pelanggan/cKatalog/detail/' . $value->id_obat) ?>"><img src="<?= base_url('asset/malefashion-master/') ?>img/icon/search.png" alt=""><span>Detail</span></a></li>
							</ul>
						</div>
						<div class="product__item__text">
							<h6><?= $value->nama_obat ?></h6>
							<small>Terjual: <strong><?= $value->terjual ?></strong></small>
							<?php
							if ($this->session->userdata('id_pelanggan') != '') {
							?>
								<a href="<?= base_url('Pelanggan/cKatalog/add_cart/' . $value->id_obat . '/0') ?>" class="add-cart">+ Add To Cart</a>
							<?php
							}
							?>

							<!-- <div class="rating">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</div> -->
							<h5>Rp. <?= number_format($value->harga) ?></h5>

						</div>
					</div>
				</div>

			<?php
			}
			?>

		</div>
	</div>
</section>
<!-- Product Section End -->
<!-- Banner Section Begin -->
<hr class="mt-5">
<?php
//menampilkan produk yang terlaris
$dt_produk_terlaris = $this->db->query("SELECT SUM(qty) as terjual, obat.id_obat, nama_obat, foto, harga FROM `detail_obat` JOIN obat ON detail_obat.id_obat=obat.id_obat GROUP BY obat.id_obat ORDER BY terjual ASC LIMIT 4")->result();
?>
<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="filter__controls">
					<li>Produk Diskon</li>
				</ul>
			</div>
		</div>
		<div class="row product__filter">
			<?php
			foreach ($dt_produk_terlaris as $key => $value) {

			?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
					<div class="product__item">
						<div class="product__item__pic set-bg" data-setbg="<?= base_url('asset/foto-obat/' . $value->foto) ?>">

							<ul class="product__hover">
								<li><a href="<?= base_url('Pelanggan/cKatalog/detail/' . $value->id_obat) ?>"><img src="<?= base_url('asset/malefashion-master/') ?>img/icon/search.png" alt=""><span>Detail</span></a></li>
							</ul>
						</div>
						<div class="product__item__text">
							<h6><?= $value->nama_obat ?></h6>
							<small>Diskon: <strong>3%</strong></small>
							<?php
							if ($this->session->userdata('id_pelanggan') != '') {
							?>
								<a href="<?= base_url('Pelanggan/cKatalog/add_cart/' . $value->id_obat . '/1') ?>" class="add-cart">+ Add To Cart</a>
							<?php
							}
							?>

							<!-- <div class="rating">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</div> -->
							<h5>Rp. <?= number_format($value->harga - ((3 / 100) * $value->harga))  ?> <del>Rp. <?= number_format($value->harga) ?></del></h5>

						</div>
					</div>
				</div>

			<?php
			}
			?>

		</div>
	</div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="categories__text">
					<h2>Kesehatan <br /> <span>Apotek Agra Medika</span></h2>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="categories__hot__deal">
					<img src="<?= base_url('asset/malefashion-master/') ?>img/product-sale.png" alt="">
					<div class="hot__deal__sticker">
						<span>Potongan Hingga</span>
						<h5>15%</h5>
					</div>
				</div>
			</div>
			<div class="col-lg-4 offset-lg-1">
				<div class="categories__deal__countdown">
					<h2>Diskon Untuk Member Gold</h2>
					<div class="categories__deal__countdown__timer" id="countdown">
						<div class="cd-item">
							<span>3</span>
							<p>Days</p>
						</div>
						<div class="cd-item">
							<span>1</span>
							<p>Hours</p>
						</div>
						<div class="cd-item">
							<span>50</span>
							<p>Minutes</p>
						</div>
						<div class="cd-item">
							<span>18</span>
							<p>Seconds</p>
						</div>
					</div>
					<a href="#" class="primary-btn">Belanja Sekarang</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->
<!-- Banner Section End -->
<section class="product spad mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="filter__controls">
					<li class="active" data-filter="*">Semua</li>
					<?php
					foreach ($kategori as $key => $value) {
						$kategori = $value->nama_kategori;
						$code = str_replace(" ", "-", $kategori);
					?>
						<li data-filter=".<?= $code ?>"><?= $value->nama_kategori ?></li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
		<div class="row product__filter">
			<?php
			foreach ($produk as $key => $value) {
				$kategori = $value->nama_kategori;
				$code = str_replace(" ", "-", $kategori);
			?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix <?= $code ?>">
					<div class="product__item">
						<div class="product__item__pic set-bg" data-setbg="<?= base_url('asset/foto-obat/' . $value->foto) ?>">

							<ul class="product__hover">
								<li><a href="<?= base_url('Pelanggan/cKatalog/detail/' . $value->id_obat) ?>"><img src="<?= base_url('asset/malefashion-master/') ?>img/icon/search.png" alt=""><span>Detail</span></a></li>
							</ul>
						</div>
						<div class="product__item__text">
							<h6><?= $value->nama_obat ?></h6>
							<?php
							if ($this->session->userdata('id_pelanggan') != '') {
							?>
								<a href="<?= base_url('Pelanggan/cKatalog/add_cart/' . $value->id_obat . '/0') ?>" class="add-cart">+ Add To Cart</a>
							<?php
							}
							?>

							<!-- <div class="rating">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</div> -->
							<h5>Rp. <?= number_format($value->harga) ?></h5>

						</div>
					</div>
				</div>
			<?php
			}
			?>


		</div>
	</div>
</section>
<!-- Product Section End -->