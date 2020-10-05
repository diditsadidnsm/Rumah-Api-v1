<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Produk</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li>Produk</li>
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
                            <span>Produk</span>
                            <a href="<?= base_url('product/create') ?>" class="btn btn-sm btn-secondary"><i
                                    class="bx bx-plus"></i> Tambah</a>

                            <div class="float-right">
                                <form action="<?= base_url("product/search") ?>" method="POST">
                                    <div class="input-group">
                                        <input type="text" name="keyword"
                                            class="form-control form-control-sm text-center" placeholder="Cari"
                                            value="<?= $this->session->userdata('keyword') ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-info btn-sm" type="submit">
                                                <i class="bx bx-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($content as $row) : $no++; ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <p>
                                                <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.png") ?>"
                                                    alt="" height="50">
                                                <?= $row->product_title ?>
                                            </p>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary"><i class="bx bx-purchase-tag"></i>
                                                <?= $row->category_title ?></span>
                                        </td>
                                        <td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                        <td><?= $row->is_available ? 'Tersedia' : 'Kosong' ?></td>
                                        <td>
                                            <?= form_open(base_url("/product/delete/$row->id"), ['method' => 'POST']) ?>
                                            <?= form_hidden('id', $row->id) ?>
                                            <a href="<?= base_url("/product/edit/$row->id") ?>" class="btn btn-sm">
                                                <i class="bx bx-edit text-info"></i>
                                            </a>
                                            <button class="btn btn-sm" type="submit"
                                                onclick="return confirm('Apakah yakin ingin menghapus?')">
                                                <i class="bx bx-trash text-danger"></i>
                                            </button>
                                            <?= form_close() ?>
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