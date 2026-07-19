<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model
{
    private $_table = 'feedback';

    // Rules validasi untuk form feedback (nama, email, pesan)
    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'required|max_length[32]',
                'errors' => [
                    'required'   => 'Nama wajib diisi.',
                    'max_length' => 'Nama maksimal 32 karakter.'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[32]',
                'errors' => [
                    'required'    => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'max_length'  => 'Email maksimal 32 karakter.'
                ]
            ],
            [
                'field' => 'message',
                'label' => 'Pesan',
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Pesan wajib diisi.',
                    'min_length' => 'Pesan minimal 10 karakter.'
                ]
            ]
        ];
    }

    public function get()
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function insert($feedback)
    {
        if (!$feedback) {
            return;
        }
        return $this->db->insert($this->_table, $feedback);
    }

    public function delete($id)
    {
        if (!$id) {
            return;
        }
        return $this->db->delete($this->_table, ['id' => $id]);
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }
}
