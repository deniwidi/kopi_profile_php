<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model
{
    private $_table = 'article';

    // Rules validasi untuk form tambah & edit artikel
    public function rules()
    {
        return [
            [
                'field' => 'title',
                'label' => 'Judul',
                'rules' => 'required|min_length[3]|max_length[128]',
                'errors' => [
                    'required'   => 'Judul artikel wajib diisi.',
                    'min_length' => 'Judul artikel minimal 3 karakter.',
                    'max_length' => 'Judul artikel maksimal 128 karakter.'
                ]
            ],
            [
                'field' => 'draft',
                'label' => 'Status Draft',
                'rules' => 'required|in_list[true,false]',
                'errors' => [
                    'required' => 'Status draft wajib dipilih.',
                    'in_list'  => 'Status draft hanya boleh bernilai true atau false.'
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

    public function get_published($limit = null, $offset = null)
    {
        $this->db->order_by('created_at', 'DESC');
        if (!$limit && !$offset) {
            $query = $this->db->get_where($this->_table, ['draft' => 'false']);
        } else {
            $query = $this->db->get_where($this->_table, ['draft' => 'false'], $limit, $offset);
        }
        return $query->result();
    }

    public function find($id)
    {
        if (!$id) {
            return;
        }
        $query = $this->db->get_where($this->_table, ['id' => $id]);
        return $query->row();
    }

    public function find_by_slug($slug)
    {
        if (!$slug) {
            return;
        }
        $query = $this->db->get_where($this->_table, ['slug' => $slug]);
        return $query->row();
    }

    public function insert($article)
    {
        return $this->db->insert($this->_table, $article);
    }

    public function update($article)
    {
        if (!isset($article['id'])) {
            return;
        }
        return $this->db->update($this->_table, $article, ['id' => $article['id']]);
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
