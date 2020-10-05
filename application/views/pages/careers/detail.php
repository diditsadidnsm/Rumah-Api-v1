<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Details Jobs</h2>

                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li><a href="<?= base_url('careers') ?>">Karir</a></li>
                    <li><?= $rows->title ?></li>
                </ol>
            </div>

        </div>
    </section>

    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="assets/img/blog-post-1.jpg" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="blog-single.html"><?= $rows->title ?></a>
                        </h2>

                        <div class="entry-content">
                            <p>
                                <?= $rows->description ?>
                            </p>
                            <blockquote>
                                <i class="icofont-quote-left quote-left"></i>
                                <p>
                                    <?= $rows->quotes ?>
                                </p>
                                <i class="las la-quote-right quote-right"></i>
                                <i class="icofont-quote-right quote-right"></i>
                            </blockquote>

                        </div>

                    </article>

                    <div class="blog-comments">

                        <div class="reply-form">
                            <h4>Apply for this job</h4>
                            <p>Contact us</p>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <a href="https://api.whatsapp.com/send?phone=6281315841625&text=Tigris Fire, Saya Berminat untuk Melamar Pekerjaan Sebagai Posisi <?= $rows->code ?>"
                                        class="btn btn-success"><i class="icofont-whatsapp"></i> WhatsApp</a>
                                </div>
                                <div class="col-md-3 form-group">
                                    <a href="https://m.me/tigrisfire" class="btn btn-info"><i
                                            class="icofont-facebook"></i> Messenger</a>
                                </div>
                                <div class="col-md-3 form-group">
                                    <a href="https://www.instagram.com/tigrisfire/" class="btn btn-secondary"><i
                                            class="icofont-instagram"></i> Instagram</a>
                                </div>
                                <div class="col-md-3 form-group">
                                    <a href="mailto:sales@rumahapi.com?subject=<?= $rows->code ?>"
                                        class="btn btn-danger"><i class="icofont-email"></i> Email us</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>