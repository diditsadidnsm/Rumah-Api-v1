<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Produk</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li><a href="<?= base_url('product') ?>">Produk</a></li>
                    <li>Tambah Produk</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-12">
                    <?= form_open_multipart($form_action, ['method' => 'POST', 'class' => 'php-email-form']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="">Produk</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <?= form_textarea(['name' => 'description', 'value' => $input->description, 'row' => 4, 'class' => 'form-control']) ?>
                        <?= form_error('description') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <?= form_input(['type' => 'number', 'name' => 'price', 'value' => $input->price, 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('price') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control']) ?>
                        <?= form_error('id_category') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Ada Stock ?</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 1 ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Tersedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 0, 'checked' => $input->is_available == 0 ? true : false, 'form-check-input']) ?>
                            <label for="" class="form-check-label">Kosong</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <br>
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                        <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif ?>
                        <?php if ($input->image) : ?>
                        <img src="<?= base_url("/images/product/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                        <?= form_error('slug') ?>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary"><i class="bx bx-save"></i>
                        Simpan</button>
                    <?= form_close() ?>
                </div>

            </div>

        </div>
    </section>

</main>