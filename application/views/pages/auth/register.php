<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Silahkan Mendaftar</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li>Daftar</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <?php $this->load->view('layouts/_alert') ?>

            <div class="row">

                <div class="col-lg-12">
                    <?= form_open('register', ['method' => 'POST', 'class' => 'php-email-form']) ?>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <?= form_input(['type' => 'number', 'name' => 'telp', 'value' => $input->telp, 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('telp') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control',  'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Password</label>
                        <?= form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password yang sama', 'required' => true]) ?>
                        <?= form_error('password_confirmation') ?>
                    </div>
                    <div class="text-center"><button type="submit" class="btn-block btn-sm"><i class="icofont-key"></i>
                            DAFTAR SEKARANG</button>
                    </div>
                    <?= form_close() ?>
                </div>

            </div>

        </div>
    </section>

</main>