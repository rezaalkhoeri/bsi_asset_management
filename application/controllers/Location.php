<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller 
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        if (!$this->session->userdata('email'))
        {
            redirect('auth');
        }
    }
    
    function index()
    {
        $data['get'] = $this->m_data->tampil_data('tb_lokasi')->result();
        $data['title'] = 'Asset Management | Location';
        $this->load->view('lokasi/location', $data);
    }

    function tambah()
    {
        $this->load->view('location');
    }

    function tambah_aksi(){
        $nama_lokasi = $this->input->post('location');
        $deskripsi = $this->input->post('description');

        $data = array(
            'nama_lokasi' => $nama_lokasi,
            'deskripsi' => $deskripsi
        );
        $this->m_data->input_data($data, 'tb_lokasi');
        redirect('Location/index');
        
    }

    function update($id){
        $nama_lokasi = $this->input->post('location');
        $deskripsi = $this->input->post('description');

        $where = array(
            'id' => $id
        );
        $data = array(
            'nama_lokasi' => $nama_lokasi,
            'deskripsi' => $deskripsi
        );
        $this->m_data->update_data($where, $data, 'tb_lokasi');
        redirect('Location/index');
    }
}