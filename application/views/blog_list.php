<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('_partials/head') ?>
</head>

<body>
    <?php $this->load->view('_partials/navbar') ?>

    <section class="page-banner" style="background-image: linear-gradient(rgba(30, 20, 12, 0.7), rgba(30, 20, 12, 0.7)), url('<?= base_url('assets/img/beans-mix.jpg') ?>');">
        <div class="container">
            <h1>Artikel Kopi Nusantara</h1>
            <p>Cerita, tips, dan pengetahuan seputar dunia kopi Indonesia.</p>
        </div>
    </section>

    <section class="container section">
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
                        <p><?= substr(strip_tags($article->content), 0, 130) ?>...</p>
                        <span class="read-more">Baca selengkapnya &rarr;</span>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </section>

    <?php $this->load->view('_partials/footer') ?>
</body>

</html>
