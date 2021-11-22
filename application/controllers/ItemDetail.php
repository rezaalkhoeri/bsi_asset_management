<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemDetail extends CI_Controller
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
        $data['get'] = $this->m_data->join_table_detail_item()->result();

        // print_r($data);

        $data['type'] = $this->m_data->tampil_data_sort('tb_item','jenis')->result();
        $data['title'] = 'Asset Management | Item Details';
        $this->load->view('itemDetail/itemDetail', $data);
    }

    public function tambah()
    {
        $this->load->view('itemDetail');
    }

    public function tambah_aksi()
    {
        // Get Input Data
        $jenis = $this->input->post('type');
        $serialnumber = $this->input->post('serialnumber');
        $assetnumber = $this->input->post('assetnumber');
        $valueprice = $this->input->post('valueprice');
        $condition = $this->input->post('condition');

        // Data Multiple insert
        $data = array();
        for ($i=0; $i < count($serialnumber); $i++) {
          array_push($data, array(
              'id_item' => $jenis[$i],
              'serial_number' => $serialnumber[$i],
              'asset_number' => $assetnumber[$i],
              'value_price' => $valueprice[$i],
              'condition' => $condition[$i]
          ));
        }

        //  Get ID ITEM yang di select
        $value = array(
          'id_item' => $jenis,
        );

        // Sortir Data ID ITEM
        sort($value['id_item']);


        // Get New Stok Data For Updating Item Data Table
          $aItem = 0;
          $aJumlah = 0;

          $stok = array();
          for ($a=0; $a < count($value['id_item']); $a++) {
                  if($a == 0){
                    $aItem = $value['id_item'][$a];
                    $aJumlah++;
                  } else {
                    if($value['id_item'][$a] == $aItem){
                      $aJumlah++;
                    } else {
                      array_push($stok, array(
                          'id_item' => $aItem,
                          'stok_input' => $aJumlah
                      ));

                      $aItem = $value['id_item'][$a];
                      $aJumlah = 1;
                    }
                  }
          }

          if($a == count($value['id_item'])){
            array_push($stok, array(
                'id_item' => $aItem,
                'stok_input' => $aJumlah
            ));
          }


          // Get Old Stok Data FROM ITEM Table
          $itemID = array();
          for ($i=0; $i < count($stok); $i++) {
            $itemID[] = array(
              'id'=> $stok[$i]['id_item']
            );
          }

          $itemData = array();
          for ($i=0; $i < count($itemID) ; $i++) {
            $itemData[] = $this->db->select('stok')->get_where('tb_item', $itemID[$i])->result();
          }


          $resultData = array();
          for ($i=0; $i < count($stok); $i++) {
            array_push($resultData, array(
                'id' => $stok[$i]['id_item'],
                'stok' => $stok[$i]['stok_input'] + $itemData[$i][0]->stok,
                'status' => 1
            ));
          }

          // echo '<pre>',print_r($itemData[0][0]->stok),'</pre>';
          // echo '<pre>',print_r($resultData),'</pre>';
          // die;

        // // echo '<pre>',print_r($stokData),'</pre>';
        // die;

        $this->m_data->multiple_update('tb_item', $resultData,'id');
        $this->m_data->multiple_insert($data, 'tb_detail_item');
        redirect('itemDetail/index');

    }

    public function update($id)
    {
        $jenis = $this->input->post('type');
        $serialnumber = $this->input->post('serialnumber');
        $assetnumber = $this->input->post('assetnumber');
        $valueprice = $this->input->post('valueprice');
        $condition = $this->input->post('condition');

        $where = array(
            'id' => $id
        );

        $data = array(
            'id_item' => $jenis,
            'serial_number' => $serialnumber,
            'asset_number' => $assetnumber,
            'value_price' => $valueprice,
            'condition' => $condition
        );

        // echo '<pre>',print_r($where),'</pre>';
        // echo '<pre>',print_r($data),'</pre>';
        // die;

        $this->m_data->update_data($where, $data,'tb_detail_item');
        redirect('itemDetail/index');
    }

    // public function hapus($id){
    //     $where = array('id' => $id);
    //     $this->m_data->hapus_data($where,'tb_item');
    //     redirect('itemDetail/index');
    // }
}