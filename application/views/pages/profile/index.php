<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Profile</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li>Profile</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <?php $this->load->view('layouts/_alert') ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="<?= $content->image ? base_url("/images/user/$content->image") : base_url("/images/user/avatar.png") ?>"
                                        alt="" height="200">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <p>Nama: <?= $content->name ?></p>
                                    <p>Telepon: <?= $content->telp ?></p>
                                    <p>E-Mail: <?= $content->email ?></p>
                                    <a href="<?= base_url("/profile/update/$content->id") ?>"
                                        class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>