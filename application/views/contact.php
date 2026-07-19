<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('_partials/head') ?>
</head>

<body>
    <?php $this->load->view('_partials/navbar') ?>

    <section class="page-banner" style="background-image: linear-gradient(rgba(30, 20, 12, 0.7), rgba(30, 20, 12, 0.7)), url('<?= base_url('assets/img/coffee-cherries.jpg') ?>');">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Punya pertanyaan, kritik, atau saran? Hubungi kami melalui form berikut.</p>
        </div>
    </section>

    <section class="container section">

        <form action="" method="post" style="max-width: 600px;">
            <div>
                <label for="name">Nama*</label>
                <input type="text" name="name"
                    class="<?= form_error('name') ? 'invalid' : '' ?>"
                    placeholder="Nama kamu" value="<?= set_value('name') ?>" />
                <div class="invalid-feedback"><?= form_error('name') ?></div>
            </div>

            <div>
                <label for="email">Email*</label>
                <input type="text" name="email"
                    class="<?= form_error('email') ? 'invalid' : '' ?>"
                    placeholder="Alamat email kamu" value="<?= set_value('email') ?>" />
                <div class="invalid-feedback"><?= form_error('email') ?></div>
            </div>

            <div>
                <label for="message">Pesan*</label><br>
                <textarea name="message" cols="30" rows="5"
                    class="<?= form_error('message') ? 'invalid' : '' ?>"
                    placeholder="Tulis pesan kamu..."><?= set_value('message') ?></textarea>
                <div class="invalid-feedback"><?= form_error('message') ?></div>
            </div>

            <div style="display: flex; gap: 1rem">
                <input type="submit" class="button button-primary" value="Kirim">
                <input type="reset" class="button" value="Reset">
            </div>
        </form>
    </section>

    <?php $this->load->view('_partials/footer') ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if ($this->session->flashdata('message')): ?>
        <script>
            // Pesan sukses menggunakan SweetAlert2
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= $this->session->flashdata('message') ?>',
                confirmButtonColor: '#6f4e37'
            });
        </script>
    <?php endif ?>
</body>

</html>
