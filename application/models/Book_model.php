<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Book_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_books($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('books');
            return $query->result_array();
        }

        $query = $this->db->get_where('books', array('id' => $id));
        return $query->row_array();
    }

    public function set_books() {
        $data = array(
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'published_date' => $this->input->post('published_date'),
            'summary' => $this->input->post('summary')
        );

        return $this->db->insert('books', $data);
    }

    public function update_books($id) {
        $data = array(
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'published_date' => $this->input->post('published_date'),
            'summary' => $this->input->post('summary')
        );

        $this->db->where('id', $id);
        return $this->db->update('books', $data);
    }

    public function delete_books($id) {
        return $this->db->delete('books', array('id' => $id));
    }
}