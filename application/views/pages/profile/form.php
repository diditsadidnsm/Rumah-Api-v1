<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Edit Profile</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li><a href="<?= base_url('profile') ?>">Profile</a></li>
                    <li>Edit Profile</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <?php $this->load->view('layouts/_alert') ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Edit Profile
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart($form_action, ['method' => 'POST', 'class' => 'php-email-form']) ?>
                            <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                                <?= form_error('name') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <?= form_input(['type' => 'number', 'name' => 'telp', 'value' => $input->telp, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                                <?= form_error('telp') ?>
                            </div>
                            <div class="form-group">
                                <label for="">E-Mail</label>
                                <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                                <?= form_error('email') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                                <?= form_error('password') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <br>
                                <?= form_upload('image') ?>
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                <small
                                    class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                                <?php if (isset($input->image)) : ?>
                                <img src="<?= base_url("/images/user/$input->image") ?>" alt="" height="150">
                                <?php endif ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>