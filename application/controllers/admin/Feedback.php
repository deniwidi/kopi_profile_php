<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('feedback_model');
    }

    // Halaman daftar feedback dari pengguna
    public function index()
    {
        $data['feedbacks'] = $this->feedback_model->get();
        $this->load->view('admin/feedback_list', $data);
    }

    // Hapus feedback
    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $this->feedback_model->delete($id);

        $this->session->set_flashdata('message', 'Feedback berhasil dihapus');
        redirect(site_url('admin/feedback'));
    }
}
