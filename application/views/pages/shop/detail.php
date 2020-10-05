<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Produk</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li><?= $rows->title ?></li>
                </ol>
            </div>

        </div>
    </section>

    <section class="about" data-aos="fade-up">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <img src="<?= $rows->image ? base_url("/images/product/$rows->image") : base_url("/images/product/default.png") ?>"
                        class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3><?= $rows->title ?></h3>
                    <h4 class="font-italic">
                        Rp <?= number_format($rows->price, 0, ',', '.') ?>,-
                    </h4>
                    <p>
                        <?= $rows->description ?>
                    </p>
                    <?php if (!$this->session->userdata('is_login')) : ?>
                    <button class="btn btn-primary"
                        onclick="Swal.fire({icon: 'error', title: 'Oops...', text: 'Silahkan masuk akun terlebih dulu', footer: '<a href>Daftar Akun jika belum punya</a>'})"><i
                            class="icofont-cart"></i> Beli
                        Sekarang</button>
                    <?php else : ?>
                    <form action="<?= base_url("/cart/add") ?>" method="POST">
                        <input type="hidden" name="id_product" value="<?= $rows->id ?>">
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

        </div>
    </section>

    <section class="facts section-bg" data-aos="fade-up">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">232</span>
                    <p>Telah Menghubungi</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">521</span>
                    <p>Menyimpan di Keranjang</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">1,463</span>
                    <p>Melihat Detail</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">15</span>
                    <p>Transaksi Sukses</p>
                </div>

            </div>

        </div>
    </section>

</main>