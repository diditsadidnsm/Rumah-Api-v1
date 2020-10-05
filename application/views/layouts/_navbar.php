<header id="header" class="fixed-top">
    <div class="container">

        <div class="logo float-left">
            <h1 class="text-light"><a href="<?= base_url('') ?>"><img src="<?= base_url() ?>/assets/img/logo.png"
                        style="width:200px;" alt="Logo Rumah Api Indonesia" class="img-fluid"></a>
            </h1>
        </div>

        <nav class="nav-menu float-right d-none d-lg-block">
            <ul>
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="drop-down"><a href="<?= base_url('shop') ?>">Produk</a>
                    <ul>
                        <?php foreach (getCategories() as $category) : ?>
                        <li><a href="<?= base_url("/shop/category/$category->slug") ?>">
                                <i class="bx bx-chevron-right"></i> <?= $category->title ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li><a href="<?= base_url('about') ?>">Tentang Kami</a></li>
                <li><a href="<?= base_url('contact') ?>">Kontak</a></li>
                <li><a href="https://idepagi.com/" target="_blank">Blog</a></li>
                <li><a href="<?= base_url('careers') ?>">Karir</a></li>
                <?php if (!$this->session->userdata('is_login')) : ?>
                <li class="drop-down"><a href="">Masuk / Daftar</a>
                    <ul>
                        <li><a href="<?= base_url('/login') ?>"><i class="bx bx-lock"></i> Masuk</a></li>
                        <li><a href="<?= base_url('/register') ?>"><i class="bx bx-key"></i> Daftar</a></li>
                    </ul>
                </li>
                <?php else : ?>
                <li class="drop-down"><a href=""><i class="bx bx-user"></i> <?= $this->session->userdata('name') ?></a>
                    <ul>
                        <li><a href="<?= base_url('/profile') ?>"><i class="bx bx-user"></i> Profile</a></li>
                        <li><a href="<?= base_url("/myorder") ?>"><i class="bx bx-list-check"></i> My Order</a></li>
                        <li><a href="<?= base_url('/logout') ?>"><i class="bx bx-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li><a href=<?= base_url('cart') ?>><i class="bx bx-cart"></i> Cart <?= getCart(); ?></a></li>
                <?php endif ?>
                <?php if ($this->session->userdata('role') == 'admin') : ?>
                <li class="drop-down"><a href=""><i class="bx bx-user"></i> Admin</a>
                    <ul>
                        <li><a href="<?= base_url('departments') ?>"><i class="bx bx-briefcase"></i> Jobs
                                Departments</a></li>
                        <li><a href="<?= base_url('employment') ?>"><i class="bx bx-briefcase"></i> Jobs
                                Employment</a></li>
                        <li><a href="<?= base_url('jobs') ?>"><i class="bx bx-briefcase"></i> Jobs
                                Title</a></li>
                        <li><a href="<?= base_url('category') ?>"><i class="bx bx-duplicate"></i> Kategori</a></li>
                        <li><a href="<?= base_url('product') ?>"><i class="bx bx-layer-plus"></i> Produk</a></li>
                        <li><a href="<?= base_url('order') ?>"><i class="bx bx-box"></i> Orderan</a></li>
                        <li><a href="<?= base_url('user') ?>"><i class="bx bx-user-plus"></i> Pelanggan</a></li>
                    </ul>
                </li>
                <?php endif ?>
            </ul>
        </nav>

    </div>
</header>