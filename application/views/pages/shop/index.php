<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Produk Kami</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li>Produk</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <?php foreach ($content as $row) : ?>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png") ?>"
                                class="img-fluid" alt="">
                            <div class="social">
                                <a href="<?= base_url("/shop/detail/$row->product_slug") ?>">
                                    <i class="icofont-info"></i> Detail Produk
                                </a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4><?= $row->product_title ?></h4>
                            <span>Rp <?= number_format($row->price, 0, ',', '.') ?>,-</span>
                        </div>
                        <?php if (!$this->session->userdata('is_login')) : ?>
                        <button class="btn btn-primary"
                            onclick="Swal.fire({icon: 'error', title: 'Oops...', text: 'Silahkan masuk akun terlebih dulu', footer: '<a href>Daftar Akun jika belum punya</a>'})"><i
                                class="icofont-cart"></i> Beli
                            Sekarang</button>
                        <?php else : ?>
                        <form action="<?= base_url("/cart/add") ?>" method="POST">
                            <input type="hidden" name="id_product" value="<?= $row->id ?>">
                            <div class="input-group">
                                <input type="number" name="qty" value="1" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="icofont-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </form>
                        <?php endif ?>
                    </div>
                </div>

                <?php endforeach ?>

            </div>

        </div>
    </section>
</main>