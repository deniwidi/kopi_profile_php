<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
    }

    // Halaman daftar artikel
    public function index()
    {
        $data['articles'] = $this->article_model->get();
        $this->load->view('admin/post_list', $data);
    }

    // Halaman tambah artikel
    public function new()
    {
        $this->load->library('form_validation');

        if ($this->input->method() === 'post') {
            // Lakukan validasi sebelum menyimpan ke model
            $rules = $this->article_model->rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === FALSE) {
                return $this->load->view('admin/post_new_form');
            }

            // Buat id unik dan slug dari judul
            $id   = uniqid('', true);
            $slug = url_title($this->input->post('title'), 'dash', TRUE) . '-' . $id;

            $article = [
                'id'      => $id,
                'title'   => $this->input->post('title'),
                'slug'    => $slug,
                'content' => $this->input->post('content'),
                'draft'   => $this->input->post('draft')
            ];

            $saved = $this->article_model->insert($article);

            if ($saved) {
                $this->session->set_flashdata('message', 'Artikel berhasil disimpan');
                return redirect('admin/post');
            }
        }

        $this->load->view('admin/post_new_form');
    }

    // Halaman edit artikel
    public function edit($id = null)
    {
        $this->load->library('form_validation');

        $data['article'] = $this->article_model->find($id);

        if (!$id || !$data['article']) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // Lakukan validasi sebelum menyimpan ke model
            $rules = $this->article_model->rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === FALSE) {
                return $this->load->view('admin/post_edit_form', $data);
            }

            $article = [
                'id'      => $id,
                'title'   => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'draft'   => $this->input->post('draft')
            ];

            $updated = $this->article_model->update($article);

            if ($updated) {
                $this->session->set_flashdata('message', 'Artikel berhasil diperbarui');
                return redirect('admin/post');
            }
        }

        $this->load->view('admin/post_edit_form', $data);
    }

    // Hapus artikel
    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->article_model->delete($id);

        if ($deleted) {
            $this->session->set_flashdata('message', 'Artikel berhasil dihapus');
            redirect('admin/post');
        }
    }
}
