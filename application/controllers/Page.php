<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('feedback_model');
    }

    // Halaman depan (profil perusahaan)
    public function index()
    {
        $data['articles'] = $this->article_model->get_published(3);
        $this->load->view('home', $data);
    }

    // Halaman contact + form feedback dengan validasi
    public function contact()
    {
        $this->load->library('form_validation');

        if ($this->input->method() === 'post') {
            $rules = $this->feedback_model->rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === FALSE) {
                return $this->load->view('contact');
            }

            $feedback = [
                'id'      => uniqid('', true),
                'name'    => $this->input->post('name'),
                'email'   => $this->input->post('email'),
                'message' => $this->input->post('message')
            ];

            $saved = $this->feedback_model->insert($feedback);

            if ($saved) {
                $this->session->set_flashdata('message', 'Terima kasih! Pesan kamu berhasil dikirim.');
                return redirect(site_url('page/contact'));
            }
        }

        $this->load->view('contact');
    }
}
