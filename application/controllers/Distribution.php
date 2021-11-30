<?php

class Distribution extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
    $this->load->helper('url');

    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  function index()
  {
    $data['get'] = $this->m_data->join_table_distribution()->result();
    $data['title'] = 'Asset Management | Distribution';
    $this->load->view('Distribution/distribution', $data);
  }

  function index_input()
  {
    $data['get'] = $this->m_data->join_table_requisition()->result();
    $data['location'] = $this->m_data->tampil_data_sort('tb_lokasi', 'nama_lokasi')->result();
    $data['title'] = 'Distribution Form';

    $first = "SI";
    $name  = "BSI";
    $date = Date('dmY');
    $reqCode = "DSTRB";
    $noUrut = rand(0, 999999);
    $kode = $name . '/' . $first . '/' . $date . '/' . $reqCode . '/' . $noUrut;
    $data['kode'] = $kode;

    $this->load->view('Distribution/distribution_input', $data);
  }

  function detail($id)
  {
    $data['get'] = $this->m_data->join_table_detail_distribution($id)->result();
    $data['item_detail'] = $this->m_data->join_table_detail_distribution_item($id)->result();
    $data['title'] = 'Asset Management | Distribution';
    $this->load->view('Distribution/distribution_details', $data);
  }

  function tambah_aksi()
  {
    $ticket = $this->input->post('ticket');
    $receiptnumber = $this->input->post('receiptnumber');
    $recipient = $this->input->post('recipient');
    $giver = $this->input->post('giver');
    $date = $this->input->post('date');
    $location = $this->input->post('location');
    $description = $this->input->post('description');

    $timestamp = strtotime($date);
    $acttualDate = date("Y-m-d", $timestamp);

    $data['tiket'] = $this->m_data->join_table_distribution_get_req_id($ticket)->result();

    $data = array(
      'id_requisition' => $data['tiket'][0]->id,
      'transactionCode' => $receiptnumber,
      'id_lokasi' => $location,
      'recipient' => $recipient,
      'giver' => $giver,
      'date' => $acttualDate,
      'status' => 0,
      'deskripsi' => $description,
    );

    $this->m_data->input_data($data, 'tb_tr_distribution');
    redirect('Distribution/index');
  }

  function handover($id)
  {
    $data['get'] = $this->m_data->join_table_detail_distribution($id)->result();
    $ReqID = $data['get'][0]->id_requisition;

    $where_req = array('id' => $ReqID);
    $req = array('status' => 3);

    $where = array('id' => $id);
    $data = array('status' => 1);

    $this->m_data->update_data($where, $data, 'tb_tr_distribution');
    $this->m_data->update_data($where_req, $req, 'tb_tr_requisition');
    redirect('Distribution/index');
  }

  function distribute($id)
  {
    $data['get'] = $this->m_data->join_table_detail_distribution($id)->result();
    $ReqID = $data['get'][0]->id_requisition;

    $where_req = array('id' => $ReqID);
    $req = array('status' => 4);

    $where = array('id' => $id);
    $data = array('status' => 2);

    $this->m_data->update_data($where, $data, 'tb_tr_distribution');
    $this->m_data->update_data($where_req, $req, 'tb_tr_requisition');
    redirect('Distribution/index');
  }

  function canceled($id)
  {
    $data['get'] = $this->m_data->join_table_detail_distribution($id)->result();
    $ReqID = $data['get'][0]->id_requisition;

    $where_req = array('id' => $ReqID);
    $req = array('status' => 5);

    $where = array('id' => $id);
    $data = array('status' => 3);

    $this->m_data->update_data($where, $data, 'tb_tr_distribution');
    $this->m_data->update_data($where_req, $req, 'tb_tr_requisition');
    redirect('Distribution/index');
  }
}
