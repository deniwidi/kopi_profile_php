<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('admin/_partials/head') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('admin/_partials/side_nav') ?>

        <div class="content">
            <h1>Daftar Artikel</h1>

            <div class="toolbar">
                <a href="<?= site_url('admin/post/new') ?>" class="button button-primary" role="button">+ Tulis Artikel</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th style="width: 15%;" class="text-center">Status</th>
                        <th style="width: 25%;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td>
                                <div><?= $article->title ?></div>
                                <div class="text-gray"><small><?= $article->created_at ?></small></div>
                            </td>
                            <td class="text-center">
                                <?php if ($article->draft === 'true'): ?>
                                    <span class="text-gray">Draft</span>
                                <?php else: ?>
                                    <span class="text-green">Published</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <div class="action">
                                    <a href="<?= site_url('blog/view/' . $article->slug) ?>" class="button button-small" role="button">View</a>
                                    <a href="<?= site_url('admin/post/edit/' . $article->id) ?>" class="button button-small" role="button">Edit</a>
                                    <a href="#"
                                        data-delete-url="<?= site_url('admin/post/delete/' . $article->id) ?>"
                                        class="button button-small button-danger"
                                        role="button"
                                        onclick="deleteConfirm(this)">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <?php $this->load->view('admin/_partials/footer') ?>
        </div>
    </main>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Konfirmasi sebelum menghapus data
        function deleteConfirm(event) {
            Swal.fire({
                title: 'Konfirmasi Hapus!',
                text: 'Apakah kamu yakin ingin menghapus artikel ini?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, Hapus',
                confirmButtonColor: 'red'
            }).then(dialog => {
                if (dialog.isConfirmed) {
                    window.location.assign(event.dataset.deleteUrl);
                }
            });
        }
    </script>

    <?php if ($this->session->flashdata('message')): ?>
        <script>
            // Pesan sukses menggunakan SweetAlert2
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('message') ?>'
            })
        </script>
    <?php endif ?>
</body>

</html>
