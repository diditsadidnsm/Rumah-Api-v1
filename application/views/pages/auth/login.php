<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Silahkan Masuk</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li>Masuk</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <?php $this->load->view('layouts/_alert') ?>

            <div class="row">

                <div class="col-lg-12">
                    <?= form_open('login', ['method' => 'POST', 'class' => 'php-email-form']) ?>
                    <div class="form-group">
                        <label for="">Email</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="text-center"><button type="submit" class="btn-block btn-sm"><i class="icofont-lock"></i>
                            MASUK SEKARANG JUGA</button>
                    </div>
                    <?= form_close() ?>
                </div>

            </div>

        </div>
    </section>

</main>