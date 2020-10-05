<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employment extends MY_Controller
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
        $data['content']    = $this->employment->paginate($page)->get();
        $data['total_rows']    = $this->employment->count();
        $data['pagination']    = $this->employment->makePagination(
            base_url('employment'),
            2,
            $data['total_rows']
        );
        $data['page']        = 'pages/employment/index';

        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('employment'));
        }

        $keyword    = $this->session->userdata('keyword');
        $data['title']         = 'Admin: Category';
        $data['content']       = $this->employment->like('title', $keyword)->paginate($page)->get();
        $data['total_rows']    = $this->employment->like('title', $keyword)->count();
        $data['pagination']    = $this->employment->makePagination(
            base_url('employment/search'),
            3,
            $data['total_rows']
        );
        $data['page']        = 'pages/employment/index';

        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input    = (object) $this->employment->getDefaultValues();
        } else {
            $input    = (object) $this->input->post(null, true);
        }

        if (!$this->employment->validate()) {
            $data['title']            = 'Create employment';
            $data['input']            = $input;
            $data['form_action']      = base_url('employment/create');
            $data['page']             = 'pages/employment/form';

            $this->view($data);
            return;
        }

        if ($this->employment->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('employment'));
    }

    public function edit($id)
    {
        $data['content'] = $this->employment->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('employment'));
        }

        if (!$_POST) {
            $data['input']    = $data['content'];
        } else {
            $data['input']    = (object) $this->input->post(null, true);
        }

        if (!$this->employment->validate()) {
            $data['title']            = 'Ubah Kategori';
            $data['form_action']    = base_url("employment/edit/$id");
            $data['page']            = 'pages/employment/form';

            $this->view($data);
            return;
        }

        if ($this->employment->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('employment'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('employment'));
        }

        if (!$this->employment->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan.');
            redirect(base_url('employment'));
        }

        if ($this->employment->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('employment'));
    }
}

/* End of file Employment.php */