<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Books extends CI_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->helper('url_helper');
        $this->load->library('encryption');
    }

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . base_url('auth/login'));
            exit;
        }
        $data['books'] = $this->book_model->get_books();
        $data['title'] = 'Book List';

        $this->load->view('books/index', $data);
    }

    public function view($id) {
        $data['book'] = $this->book_model->get_books($id);

        if (empty($data['book'])) {
            show_404();
        }

        $data['title'] = $data['book']['title'];

        $this->load->view('books/view', $data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Add Book';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('published_date', 'Published Date', 'required');
        $this->form_validation->set_rules('summary', 'Summary', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('books/create', $data);
        } else {
            $this->book_model->set_books();
            redirect('books');
        }
    }

    public function edit($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['book'] = $this->book_model->get_books($id);

        if (empty($data['book'])) {
            show_404();
        }

        $data['title'] = 'Edit Book';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('published_date', 'Published Date', 'required');
        $this->form_validation->set_rules('summary', 'Summary', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('books/edit', $data);
        } else {
            $this->book_model->update_books($id);
            redirect('books');
        }
    }

    public function delete($id) {
        $this->book_model->delete_books($id);
        redirect('books');
    }
}
