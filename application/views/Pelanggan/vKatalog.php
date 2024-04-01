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

<section class="product spad mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="filter__controls">
					<li class="active" data-filter="*">All</li>
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
							<span class="label">New</span>

						</div>
						<div class="product__item__text">
							<h6><?= $value->nama_obat ?></h6>
							<a href="<?= base_url('Pelanggan/cKatalog/add_cart/' . $value->id_obat) ?>" class="add-cart">+ Add To Cart</a>
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

<!-- Categories Section Begin -->
<section class="categories spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="categories__text">
					<h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="categories__hot__deal">
					<img src="img/product-sale.png" alt="">
					<div class="hot__deal__sticker">
						<span>Sale Of</span>
						<h5>$29.99</h5>
					</div>
				</div>
			</div>
			<div class="col-lg-4 offset-lg-1">
				<div class="categories__deal__countdown">
					<span>Deal Of The Week</span>
					<h2>Multi-pocket Chest Bag Black</h2>
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
					<a href="#" class="primary-btn">Shop now</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->