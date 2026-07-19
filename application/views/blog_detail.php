<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('_partials/head') ?>
</head>

<body>
    <?php $this->load->view('_partials/navbar') ?>

    <section class="page-banner" style="background-image: linear-gradient(rgba(30, 20, 12, 0.7), rgba(30, 20, 12, 0.7)), url('<?= base_url('assets/img/beans-roasted.jpg') ?>');">
        <div class="container">
            <h1><?= $article->title ?></h1>
            <p>
                Dipublikasikan pada <?= $article->created_at ?>
                <?php if ($article->draft === 'true'): ?>
                    &bull; <b>[DRAFT]</b>
                <?php endif ?>
            </p>
        </div>
    </section>

    <article class="container section article-detail">
        <div class="article-content">
            <?= nl2br($article->content) ?>
        </div>
        <br>
        <a href="<?= site_url('blog') ?>" class="button">&larr; Kembali ke Artikel</a>
    </article>

    <?php $this->load->view('_partials/footer') ?>
</body>

</html>
