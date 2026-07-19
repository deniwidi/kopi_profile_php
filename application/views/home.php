<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('_partials/head') ?>
</head>

<body>
    <?php $this->load->view('_partials/navbar') ?>

    <section class="hero" style="background-image: linear-gradient(rgba(30, 20, 12, 0.75), rgba(30, 20, 12, 0.75)), url('<?= base_url('assets/img/beans-roasted.jpg') ?>');">
        <div class="container hero-content">
            <h1>Kopi Asli Nusantara,<br>Diseduh dengan Cinta</h1>
            <p>Kami menghadirkan biji kopi pilihan dari petani lokal Indonesia &mdash; dari Gayo hingga Toraja &mdash; langsung ke cangkirmu.</p>
            <a href="<?= site_url('blog') ?>" class="button button-primary">Baca Artikel Kami</a>
            <a href="<?= site_url('page/contact') ?>" class="button button-light">Hubungi Kami</a>
        </div>
    </section>

    <section class="container section">
        <h2 class="section-title">Tentang Kami</h2>
        <p>
            <b>Kopi Nusantara</b> adalah perusahaan kopi yang berdiri sejak 2010. Kami bekerja sama langsung
            dengan petani kopi di berbagai daerah di Indonesia untuk menghadirkan kopi berkualitas terbaik.
            Mulai dari biji kopi single origin, kopi bubuk, hingga kedai kopi &mdash; semua kami kerjakan
            dengan satu misi: memperkenalkan kekayaan rasa kopi Indonesia ke seluruh dunia.
        </p>

        <div class="features">
            <div class="feature-card">
                <h3>&#127793; Biji Pilihan</h3>
                <p>Biji kopi dipetik langsung dari kebun petani lokal dengan standar kualitas ekspor.</p>
            </div>
            <div class="feature-card">
                <h3>&#128293; Roasting Sendiri</h3>
                <p>Proses roasting dilakukan in-house untuk menjaga konsistensi rasa di setiap batch.</p>
            </div>
            <div class="feature-card">
                <h3>&#129309; Fair Trade</h3>
                <p>Kami membeli langsung dari petani dengan harga yang adil dan berkelanjutan.</p>
            </div>
        </div>
    </section>

    <section class="section section-alt">
        <div class="container">
            <h2 class="section-title">Produk Kami</h2>
            <p class="text-gray">Dari kebun hingga cangkir &mdash; inilah perjalanan biji kopi Nusantara.</p>

            <div class="product-grid">
                <div class="product-card">
                    <div class="product-img">
                        <img src="<?= base_url('assets/img/coffee-cherries.jpg') ?>" alt="Ceri kopi merah segar">
                    </div>
                    <div class="product-body">
                        <h3>Ceri Kopi Pilihan</h3>
                        <p>Dipanen saat matang sempurna, hanya ceri merah terbaik yang kami proses.</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img">
                        <img src="<?= base_url('assets/img/beans-green.jpg') ?>" alt="Green bean kopi">
                    </div>
                    <div class="product-body">
                        <h3>Green Beans</h3>
                        <p>Biji kopi mentah grade ekspor untuk roastery dan pembeli grosir.</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img">
                        <img src="<?= base_url('assets/img/beans-mix.jpg') ?>" alt="Berbagai tingkat roasting biji kopi">
                    </div>
                    <div class="product-body">
                        <h3>Blend Nusantara</h3>
                        <p>Racikan spesial dari berbagai origin dengan beragam tingkat roasting.</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img">
                        <img src="<?= base_url('assets/img/beans-roasted.jpg') ?>" alt="Biji kopi sangrai">
                    </div>
                    <div class="product-body">
                        <h3>Roasted Beans</h3>
                        <p>Biji sangrai segar, dikirim maksimal 3 hari setelah roasting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container section">
        <h2 class="section-title">Artikel Terbaru</h2>
        <?php if (empty($articles)): ?>
            <p class="text-gray">Belum ada artikel yang terbit.</p>
        <?php endif ?>
        <div class="article-grid">
            <?php
            $thumbs = ['beans-roasted.jpg', 'coffee-cherries.jpg', 'beans-mix.jpg', 'beans-green.jpg'];
            foreach ($articles as $i => $article): ?>
                <a class="article-card" href="<?= site_url('blog/view/' . $article->slug) ?>">
                    <div class="article-img">
                        <img src="<?= base_url('assets/img/' . $thumbs[$i % count($thumbs)]) ?>" alt="<?= $article->title ?>">
                    </div>
                    <div class="article-body">
                        <h3><?= $article->title ?></h3>
                        <small class="text-gray"><?= $article->created_at ?></small>
                        <p><?= substr(strip_tags($article->content), 0, 110) ?>...</p>
                        <span class="read-more">Baca selengkapnya &rarr;</span>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </section>

    <?php $this->load->view('_partials/footer') ?>
</body>

</html>
