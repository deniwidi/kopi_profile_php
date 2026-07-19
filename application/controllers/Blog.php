<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
    }

    // Daftar artikel yang sudah terbit (bukan draft)
    public function index()
    {
        $data['articles'] = $this->article_model->get_published();
        $this->load->view('blog_list', $data);
    }

    // Detail artikel berdasarkan slug
    public function view($slug = null)
    {
        $data['article'] = $this->article_model->find_by_slug($slug);

        if (!$data['article']) {
            show_404();
        }

        $this->load->view('blog_detail', $data);
    }
}
