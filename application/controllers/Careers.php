<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Careers extends MY_Controller
{

    public function index($page = null)
    {
        $data['title']    = 'Peluang Karir dari Berbagai Lulusan dan Jurusan';
        $data['site_desc']    = 'PT. Tigris Berkat Sejati menyediakan layanan perencanaan sistem kebakaran, pelaksanaan instalasi sistem kebakaran dan perawatan sistem kebakaran Anda. Perencanaan yang tepat menghasilkan sistem kebakaran menjadi lebih akurat.';
        $data['site_key']    = 'jual apar murah, alat pemadam kebakaran, alat pemadam murah terdekat, jual alat pemadam murah, kebakaran, kerusakan, pemadaman';
        $data['content']    = $this->careers->select(
            [
                'jobs.id', 'jobs.slug AS jobs_slug', 'jobs.title AS jobs_title', 'location',
                'departments.title AS departments_title', 'employment.title AS employment_title'
            ]
        )
            ->join('departments')
            ->join('employment')
            ->paginate($page)
            ->get();
        $data['total_rows']    = $this->careers->count();
        $data['pagination']    = $this->careers->makePagination(
            base_url('careers'),
            2,
            $data['total_rows']
        );
        $data['page']        = 'pages/careers/index';

        $this->view($data);
    }

    public function detail()
    {
        $slug = $this->uri->segment(3);
        $data['title']          = $slug;
        $data['rows']           = $this->db->get_where('jobs', ['slug' => $slug])->row();
        $data['page']           = 'pages/careers/detail';

        $this->view($data);
    }
}

/* End of file Careers.php */