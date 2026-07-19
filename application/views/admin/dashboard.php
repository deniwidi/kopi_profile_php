<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('admin/_partials/head') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('admin/_partials/side_nav') ?>

        <div class="content">
            <h1>Dashboard</h1>
            <p class="text-gray">Selamat datang di panel admin Kopi Nusantara.</p>

            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number"><?= $total_articles ?></div>
                    <div class="text-gray">Artikel</div>
                    <a href="<?= site_url('admin/post') ?>" class="button button-small button-primary">Kelola Artikel</a>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?= $total_feedbacks ?></div>
                    <div class="text-gray">Feedback</div>
                    <a href="<?= site_url('admin/feedback') ?>" class="button button-small button-primary">Lihat Feedback</a>
                </div>
            </div>

            <?php $this->load->view('admin/_partials/footer') ?>
        </div>
    </main>
</body>

</html>
