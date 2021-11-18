<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        if (!$this->session->userdata('email'))
        {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['get'] = $this->m_data->tampil_data_sort('tb_item','jenis')->result();
        $data['title'] = 'Asset Management | Items';
        $this->load->view('Item/item', $data);
    }

    public function tambah()
    {
        $this->load->view('item');
    }

    public function tambah_aksi()
    {
        $jenis = $this->input->post('type');
        $merek = $this->input->post('brand');

        $data = array(
            'jenis' => $jenis,
            'merek' => $merek,
            'stok' => 0
        );
        $this->m_data->input_data($data, 'tb_item');
        redirect('Item/index');

    }

    public function update($id)
    {
        $jenis = $this->input->post('type');
        $merek = $this->input->post('brand');

        $where = array(
            'id' => $id
        );

        $data = array(
            'jenis' => $jenis,
            'merek' => $merek
        );

        $this->m_data->update_data($where, $data, 'tb_item');
        redirect('Item/index');
    }

    public function hapus($id){
        $where = array('id' => $id);
        $this->m_data->hapus_data($where,'tb_item');
        redirect('Item/index');
    }
}