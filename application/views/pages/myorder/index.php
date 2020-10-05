<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>My Order</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li>My Order</li>
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
                            Daftar Order
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
                                                href="<?= base_url("/myorder/detail/$row->invoice") ?>"><strong>#<?= $row->invoice ?></strong></a>
                                        </td>
                                        <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                                        <td>Rp <?= number_format($row->total, 0, ',', '.') ?>,-</td>
                                        <td>
                                            <?php $this->load->view('layouts/_status', ['status' => $row->status]);  ?>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>