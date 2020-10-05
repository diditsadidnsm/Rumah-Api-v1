<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends MY_Controller
{

    public function index()
    {
        $data['title']    = 'Kontak Kami';
        $data['site_desc']    = 'PT. Tigris Berkat Sejati menyediakan layanan perencanaan sistem kebakaran, pelaksanaan instalasi sistem kebakaran dan perawatan sistem kebakaran Anda. Perencanaan yang tepat menghasilkan sistem kebakaran menjadi lebih akurat.';
        $data['site_key']    = 'jual apar murah, alat pemadam kebakaran, alat pemadam murah terdekat, jual alat pemadam murah, kebakaran, kerusakan, pemadaman';
        $data['page']    = 'pages/contact/index';

        $this->view($data);
    }
}

/* End of file Contact.php */