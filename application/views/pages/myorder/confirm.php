<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Konfirmasi</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li><a href="<?= base_url('myorder') ?>">My Order</a></li>
                    <li>Konfirmasi Order</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <?php $this->load->view('layouts/_alert') ?>

            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Konfirmasi Order #<?= $order->invoice ?>
                            <div class="float-right">
                                <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                            </div>
                        </div>
                        <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                        <?= form_hidden('id_orders', $order->id); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Transaksi</label>
                                <input type="text" class="form-control" value="<?= $order->invoice ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Dari Rekening a/n</label>
                                <input type="text" name="account_name" value="<?= $input->account_name ?>"
                                    class="form-control">
                                <?= form_error('account_name') ?>
                            </div>
                            <div class="form-group">
                                <label for="">No Rekening</label>
                                <input type="text" name="account_number" value="<?= $input->account_number ?>"
                                    class="form-control">
                                <?= form_error('account_number') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Sebesar</label>
                                <input type="number" name="nominal" value="<?= $input->nominal ?>" class="form-control">
                                <?= form_error('nominal') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control">-</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Bukti Transfer</label> <br>
                                <input type="file" name="image" id="">
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                <small
                                    class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>