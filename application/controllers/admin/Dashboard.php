<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->model('article_model');
        $this->load->model('feedback_model');

        // Jumlah artikel dan feedback untuk dashboard
        $data['total_articles']  = $this->article_model->count();
        $data['total_feedbacks'] = $this->feedback_model->count();

        $this->load->view('admin/dashboard', $data);
    }
}
