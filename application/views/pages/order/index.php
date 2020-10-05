<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Orderan Masuk</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li>Orderan</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <?php $this->load->view('layouts/_alert') ?>

            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header">
                            <span>Orderan</span>

                            <div class="float-right">
                                <?= form_open(base_url('order/search'), ['method' => 'POST']) ?>
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control form-control-sm text-center"
                                        placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-info btn-sm" type="submit">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($content as $row) : ?>
                                    <tr>
                                        <td>
                                            <a
                                                href="<?= base_url("/order/detail/$row->id") ?>"><strong>#<?= $row->invoice ?></strong></a>
                                        </td>
                                        <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                                        <td>Rp<?= number_format($row->total, 0, ',', '.') ?>,-</td>
                                        <td>
                                            <?php $this->load->view('layouts/_status', ['status' => $row->status]);  ?>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation example">
                                <?= $pagination ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>