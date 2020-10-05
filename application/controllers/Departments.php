<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Departments extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }


    public function index($page = null)
    {
        $data['title']        = 'Admin: Category';
        $data['content']    = $this->departments->paginate($page)->get();
        $data['total_rows']    = $this->departments->count();
        $data['pagination']    = $this->departments->makePagination(
            base_url('departments'),
            2,
            $data['total_rows']
        );
        $data['page']        = 'pages/departments/index';

        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('departments'));
        }

        $keyword    = $this->session->userdata('keyword');
        $data['title']         = 'Admin: Category';
        $data['content']       = $this->departments->like('title', $keyword)->paginate($page)->get();
        $data['total_rows']    = $this->departments->like('title', $keyword)->count();
        $data['pagination']    = $this->departments->makePagination(
            base_url('departments/search'),
            3,
            $data['total_rows']
        );
        $data['page']        = 'pages/departments/index';

        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input    = (object) $this->departments->getDefaultValues();
        } else {
            $input    = (object) $this->input->post(null, true);
        }

        if (!$this->departments->validate()) {
            $data['title']            = 'Create Departments';
            $data['input']            = $input;
            $data['form_action']      = base_url('departments/create');
            $data['page']             = 'pages/departments/form';

            $this->view($data);
            return;
        }

        if ($this->departments->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('departments'));
    }

    public function edit($id)
    {
        $data['content'] = $this->departments->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('departments'));
        }

        if (!$_POST) {
            $data['input']    = $data['content'];
        } else {
            $data['input']    = (object) $this->input->post(null, true);
        }

        if (!$this->departments->validate()) {
            $data['title']            = 'Ubah Kategori';
            $data['form_action']    = base_url("departments/edit/$id");
            $data['page']            = 'pages/departments/form';

            $this->view($data);
            return;
        }

        if ($this->departments->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('departments'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('departments'));
        }

        if (!$this->departments->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan.');
            redirect(base_url('departments'));
        }

        if ($this->departments->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('departments'));
    }
}

/* End of file Departments.php */