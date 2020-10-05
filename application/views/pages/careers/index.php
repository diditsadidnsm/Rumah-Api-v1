<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Careers Tigris Fire</h2>
                <ol>
                    <li><a href="<?= base_url('') ?>">Home</a></li>
                    <li>Karir</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="services">
        <div class="container">
            <?php $this->load->view('layouts/_alert') ?>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">Dedication</a></h4>
                        <p class="description">Willingness to dedicate efforts for Tigris Fire success, having autonomy
                            with accountability.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box icon-box-cyan">
                        <div class="icon"><i class="bx bx-doughnut-chart"></i></div>
                        <h4 class="title"><a href="">Intellectual Honesty</a></h4>
                        <p class="description">Contribution in creating a safe space to speak up, keeping an open mind
                            to listen to other perspectives.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-box-green">
                        <div class="icon"><i class="bx bx-rotate-right"></i></div>
                        <h4 class="title"><a href="">Curiosity</a></h4>
                        <p class="description">Keenness on identifying the right problems and solving them.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-box-blue">
                        <div class="icon"><i class="bx bx-walk"></i></div>
                        <h4 class="title"><a href="">Humility</a></h4>
                        <p class="description">Ability to celebrate successes and appreciate good work while still
                            striving for improvements.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <input type="text" class="form-control" placeholder="Search Jobs">
                    </div>
                    <div class="col-lg-3">
                        <select class="custom-select">
                            <option selected>All Departments</option>
                            <?php foreach (getDepartments() as $departments) : ?>
                            <option value="<?= $departments->title ?>"><?= $departments->title ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select class="custom-select">
                            <option selected>All Employment Types</option>
                            <?php foreach (getEmployment() as $employment) : ?>
                            <option value="<?= $employment->title ?>"><?= $employment->title ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary" disabled><i class="icofont-search"></i> Search
                            JobNow</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 entries">

                    <?php foreach ($content as $row) : ?>

                    <article class="entry">
                        <h6 class="entry-title">
                            <p><?= $row->jobs_title ?></p>
                        </h6>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <p style="color:black"><i class="icofont-map"></i> <?= $row->location ?>
                                    </p>
                                </li>
                                <li class="d-flex align-items-center">
                                    <p style="color:black"><i class="icofont-wall-clock"></i>
                                        <?= $row->employment_title ?></p>
                                </li>
                                <li class="d-flex align-items-center">
                                    <p style="color:black"><i class="icofont-briefcase"></i>
                                        <?= $row->departments_title ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <div class="read-more">
                                <?php if (!$this->session->userdata('is_login')) : ?>
                                <a type="button"
                                    onclick="Swal.fire({icon: 'error', title: 'Oops...', text: 'Silahkan masuk akun terlebih dulu', footer: '<a href>Daftar Akun jika belum punya</a>'})">Read
                                    More</a>
                                <?php else : ?>
                                <a href="<?= base_url("/careers/detail/$row->jobs_slug") ?>">Read More</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </article>

                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </section>

</main>