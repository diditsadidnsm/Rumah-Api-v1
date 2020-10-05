<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Create Jobs</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li><a href="<?= base_url('jobs') ?>">Jobs Title</a></li>
                    <li>Create Jobs</li>
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
                        <label for="">Jobs Title</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jobs Code</label>
                        <?= form_input('code', $input->code, ['class' => 'form-control', 'id' => 'code', 'required' => true]) ?>
                        <?= form_error('code') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jobs Description</label>
                        <?= form_textarea(['name' => 'description', 'value' => $input->description, 'row' => 4, 'class' => 'form-control']) ?>
                        <?= form_error('description') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jobs Quotes</label>
                        <?= form_textarea(['name' => 'quotes', 'value' => $input->quotes, 'row' => 4, 'class' => 'form-control']) ?>
                        <?= form_error('quotes') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jobs Location</label>
                        <?= form_input(['type' => 'text', 'name' => 'location', 'value' => $input->location, 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('location') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jobs Departments</label>
                        <?= form_dropdown('id_departments', getDropdownList('departments', ['id', 'title']), $input->id_departments, ['class' => 'form-control']) ?>
                        <?= form_error('id_departments') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Employment Type</label>
                        <?= form_dropdown('id_employment', getDropdownList('employment', ['id', 'title']), $input->id_employment, ['class' => 'form-control']) ?>
                        <?= form_error('id_employment') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'createSlug', 'required' => true]) ?>
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