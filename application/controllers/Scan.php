<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('m_data');
        $this->load->library('user_agent');
    }

    public function index()
    {
        // data pengaturan website
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO META
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        if ($this->agent->is_mobile('iphone')) {
            $this->load->view('frontend/v_header', $data);
            $this->load->view('frontend/v_scan_mobile', $data);
            $this->load->view('frontend/v_footer', $data);
        } elseif ($this->agent->is_mobile()) {
            $this->load->view('frontend/v_header', $data);
            $this->load->view('frontend/v_scan_mobile', $data);
            $this->load->view('frontend/v_footer', $data);
        } else {
            $this->load->view('frontend/v_header', $data);
            $this->load->view('frontend/v_scan', $data);
            $this->load->view('frontend/v_footer', $data);
        }
    }

    public function cek_id()
    {
        $result_code = $this->input->post('id_qr');

        // echo $result_code;
        redirect(base_url() . "" . $result_code);
    }
}
