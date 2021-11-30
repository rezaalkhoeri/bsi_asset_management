<?php

class Requisition extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
    $this->load->helper('url');
    // $this->load->helper('tanggal');
    // $this->load->helper('date');


    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  function index()
  {
    $data['get'] = $this->m_data->join_table_requisition()->result();
    $data['title'] = 'Asset Management | Requisition';
    $this->load->view('Requisition/requisition', $data);
  }

  function index_input()
  {
    $data['item'] = $this->m_data->detail_item_req()->result();
    $data['title'] = 'Requisition Form';
    $this->load->view('Requisition/requisition_input', $data);
  }

  function tambah_aksi()
  {
    // String TRANSACTION CODE

    $noTiket = $this->input->post('ticket');
    $item = $this->input->post('item');
    $requestor = $this->input->post('requestor');
    $date = $this->input->post('date');
    $status = $this->input->post('status');
    $description = $this->input->post('description');
    $quantity = $this->input->post('quantity');

    $timestamp = strtotime($date);
    $acttualDate = date("Y-m-d", $timestamp);


    $tiket = array(
      'no_tiket' => $noTiket,
      'status' => 1
    );

    $this->m_data->input_data($tiket, 'tb_tiket');
    $getTiketID = $this->db->select('id')->get_where('tb_tiket', $tiket)->result();


    $detailTiket = array();
    for ($i = 0; $i < count($item); $i++) {
      array_push($detailTiket, array(
        'id_tiket' => $getTiketID[0]->id,
        'id_item' => $item[$i]
      ));
    }

    $this->m_data->multiple_insert($detailTiket, 'tb_detail_tiket');

    $first = "SI";
    $name  = "BSI";
    $date = Date('dmY');
    $reqCode = "RQST";
    $reqTiket = $tiket['no_tiket'];
    $kode = $name . '/' . $first . '/' . $date . '/' . $reqCode . '/' . $reqTiket;

    $data = array(
      'id_tiket' => $getTiketID[0]->id,
      'transactionCode' => $kode,
      'quantity' => $quantity,
      'requestor' => $requestor,
      'date' => $acttualDate,
      'deskripsi' => $description,
      'status' => 0
    );

    $detailItem = array();
    for ($i = 0; $i < count($item); $i++) {
      $detailItem[] = array(
        'id' => $item[$i],
        'status' => 2
      );
    }

    // echo '<pre>',print_r($tiket),'</pre>';
    // echo '<pre>', print_r($detailItem), '</pre>';
    // echo '<pre>',print_r($data),'</pre>';
    // die;

    $this->m_data->multiple_update('tb_detail_item', $detailItem, 'id');
    $this->m_data->input_data($data, 'tb_tr_requisition');
    redirect('Requisition/index');
  }

  function hapus($id)
  {
    $where = array('id' => $id);
    $this->m_data->hapus_data($where, 'tb_tr_requisition');
    redirect('Requisition/index');
  }

  function edit()
  {
    $title['title'] = 'Requisition Form';
    $this->load->view('templates/index_sidebar2', $title);
    $this->load->view('Requisition/requisition_edit');
    $this->load->view('templates/index_footer');
  }

  function detail($id)
  {
    $data['title'] = 'Requisition Form';
    $data['get'] = $this->m_data->join_table_requisition_detail($id)->result();
    $data['item_detail'] = $this->m_data->join_table_requisition_item($id)->result();

    $this->load->view('Requisition/requisition_detail', $data);
  }

  function update($id)
  {
    $ticket = $this->input->post('ticket');
    $item = $this->input->post('item');
    $requestor = $this->input->post('requestor');
    $date = $this->input->post('date');
    $status = $this->input->post('status');
    $description = $this->input->post('description');
    $quantity = $this->input->post('quantity');

    $data = array(
      'ticket' => $ticket,
      'item' => $item,
      'requestor' => $requestor,
      'date' => $date,
      'status' => $status,
      'description' => $description,
      'quantity' => $quantity
    );

    $where = array('id' => $id);
    $this->m_data->update_data($where, $data, 'tb_tr_requisition');
    redirect('Requisition/index');
    // var_dump($where);
  }

  function approve($id)
  {
    $request = $this->m_data->selectRequest($id)->result();
    $idtiket = $request[0]->id_tiket;
    $detailItem = $this->m_data->approve_item($idtiket)->result();

    $dataUpdate = [];
    for ($i = 0; $i < count($detailItem); $i++) {
      $dataUpdate[] = [
        'id' => $detailItem[$i]->id,
        'status' => '3'
      ];
    }

    $where = array('id' => $id);
    $data = array('status' => 1);

    $this->m_data->multiple_update('tb_detail_item', $dataUpdate, 'id');
    $this->m_data->update_data($where, $data, 'tb_tr_requisition');
    redirect('Requisition/index');
  }

  function decline($id)
  {
    $request = $this->m_data->selectRequest($id)->result();
    $idtiket = $request[0]->id_tiket;
    $detailItem = $this->m_data->approve_item($idtiket)->result();

    $dataUpdate = [];
    for ($i = 0; $i < count($detailItem); $i++) {
      $dataUpdate[] = [
        'id' => $detailItem[$i]->id,
        'status' => '3'
      ];
    }

    $where = array('id' => $id);
    $data = array('status' => 2);

    $this->m_data->multiple_update('tb_detail_item', $dataUpdate, 'id');
    $this->m_data->update_data($where, $data, 'tb_tr_requisition');
    redirect('Requisition/index');
  }
}
