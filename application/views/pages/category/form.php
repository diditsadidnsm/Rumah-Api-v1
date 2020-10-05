<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Kategori Barang</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li><a href="<?= base_url('category') ?>">Kategori</a></li>
                    <li>Tambah Kategori</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-12">
                    <?= form_open($form_action, ['method' => 'POST', 'class' => 'php-email-form']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                        <?= form_error('slug') ?>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary"><i class="bx bx-save"></i> Simpan</button>
                    <?= form_close() ?>
                </div>

            </div>

        </div>
    </section>

</main>