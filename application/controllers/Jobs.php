<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jobs extends MY_Controller
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
        $data['title']        = 'Admin: Produk';
        $data['content']    = $this->jobs->select(
            [
                'jobs.id', 'jobs.slug AS jobs_slug', 'jobs.title AS jobs_title',
                'jobs.code AS jobs_code', 'departments.title AS departments_title', 'employment.title AS employment_title'
            ]
        )
            ->join('departments')
            ->join('employment')
            ->paginate($page)
            ->get();
        $data['total_rows']    = $this->jobs->count();
        $data['pagination']    = $this->jobs->makePagination(
            base_url('jobs'),
            2,
            $data['total_rows']
        );
        $data['page']        = 'pages/jobs/index';

        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('jobs'));
        }

        $keyword    = $this->session->userdata('keyword');
        $data['title']        = 'Admin: Produk';
        $data['content']    = $this->jobs->select(
            [
                'jobs.id', 'jobs.slug AS jobs_slug', 'jobs.title AS jobs_title',
                'jobs.code AS jobs_code', 'departments.title AS departments_title', 'employment.title AS employment_title'
            ]
        )
            ->join('departments, employment')
            ->like('jobs.title', $keyword)
            ->orLike('description', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows']    = $this->jobs->like('jobs.title', $keyword)->orLike('description', $keyword)->count();
        $data['pagination']    = $this->jobs->makePagination(
            base_url('jobs/search'),
            3,
            $data['total_rows']
        );
        $data['page']        = 'pages/jobs/index';

        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input    = (object) $this->jobs->getDefaultValues();
        } else {
            $input    = (object) $this->input->post(null, true);
        }

        if (!$this->jobs->validate()) {
            $data['title']            = 'Tambah Produk';
            $data['input']            = $input;
            $data['form_action']    = base_url('jobs/create');
            $data['page']            = 'pages/jobs/form';

            $this->view($data);
            return;
        }

        if ($this->jobs->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('jobs'));
    }

    public function edit($id)
    {
        $data['content'] = $this->jobs->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
            redirect(base_url('jobs'));
        }

        if (!$_POST) {
            $data['input']    = $data['content'];
        } else {
            $data['input']    = (object) $this->input->post(null, true);
        }

        if (!$this->jobs->validate()) {
            $data['title']            = 'Ubah Produk';
            $data['form_action']    = base_url("jobs/edit/$id");
            $data['page']            = 'pages/jobs/form';

            $this->view($data);
            return;
        }


        if ($this->jobs->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('jobs'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('jobs'));
        }

        $jobs = $this->jobs->where('id', $id)->first();

        if (!$jobs) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
            redirect(base_url('jobs'));
        }

        if ($this->jobs->where('id', $id)->delete()) {
            $this->jobs->deleteImage($jobs->image);
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan!');
        }

        redirect(base_url('jobs'));
    }

    public function unique_slug()
    {
        $slug        = $this->input->post('slug');
        $id            = $this->input->post('id');
        $jobs    = $this->jobs->where('slug', $slug)->first();

        if ($jobs) {
            if ($id == $jobs->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
            return false;
        }

        return true;
    }
}

/* End of file Jobs.php */