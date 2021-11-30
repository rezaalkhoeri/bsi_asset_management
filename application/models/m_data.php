<?php

class M_data extends CI_Model
{

    // GET DATA UNIVERSAL
    function tampil_data($table)
    {
        return $this->db->get($table);
    }

    // GET DATA USER
    function join_table_users()
    {
        $sql = "SELECT tb_user.*, tb_user_role.role
        FROM tb_user JOIN tb_user_role ON tb_user.role_id = tb_user_role.id";
        $query = $this->db->query($sql);
        return $query;
    }

    // GET DATA ITEM ORDER BY
    function tampil_data_sort($table, $column)
    {
        $this->db->order_by($column, 'ASC');
        $query = $this->db->get($table);
        return $query;
    }



    // SINGLE INSERT DATA
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // MULTIPLE INSERT
    public function multiple_insert($data, $table)
    {
        $this->db->insert_batch($table, $data);
    }

    // EDIT DATA
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // HARD DELETE
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // UPDATE DATA
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // MULTIPLE UPDATE
    function multiple_update($table, $data, $where)
    {
        $this->db->update_batch($table, $data, $where);
    }

    // DETAIL ITEM
    function join_table_detail_item()
    { //item
        $sql = "SELECT D.*, I.jenis, I.merek FROM tb_detail_item D JOIN tb_item I ON D.id_item = I.id";
        $query = $this->db->query($sql);
        return $query;
    }


    function join_table_requisition()
    {
        $sql = "SELECT tb_tr_requisition.*, tb_tiket.no_tiket FROM tb_tr_requisition JOIN tb_tiket ON tb_tiket.id = tb_tr_requisition.id_tiket";
        $query = $this->db->query($sql);
        return $query;
    }

    function join_table_requisition_item($id)
    {
        $sql = "SELECT tb_detail_item.*, tb_item.jenis, tb_item.merek FROM tb_detail_item JOIN tb_item ON tb_detail_item.id_item = tb_item.id
                JOIN tb_detail_tiket ON tb_detail_tiket.id_item = tb_detail_item.id
                JOIN tb_tiket ON tb_tiket.id = tb_detail_tiket.id_tiket
                JOIN tb_tr_requisition ON tb_tr_requisition.id_tiket = tb_tiket.id
                WHERE tb_tr_requisition.id =" . $id;
        $query = $this->db->query($sql);
        return $query;
    }

    function join_table_requisition_detail($id)
    {
        $sql = "SELECT tb_tr_requisition.*, tb_tiket.no_tiket FROM tb_tr_requisition JOIN tb_tiket ON tb_tiket.id = tb_tr_requisition.id_tiket WHERE tb_tr_requisition.id =" . $id;
        $query = $this->db->query($sql);
        return $query;
    }

    public function selectRequest($id)
    {
        $sql = "SELECT * FROM tb_tr_requisition WHERE id = " . $id;
        $query = $this->db->query($sql);
        return $query;
    }

    function approve_item($id)
    {
        $sql = "SELECT tb_detail_item.*
        FROM tb_tiket 
        JOIN tb_detail_tiket ON tb_detail_tiket.id_tiket = tb_tiket.id
        JOIN tb_detail_item ON tb_detail_item.id = tb_detail_tiket.id_item
        WHERE tb_tiket.id = " . $id;
        $query = $this->db->query($sql);
        return $query;
    }

    function detail_item_req()
    { //item
        $sql = "SELECT D.*, I.jenis, I.merek FROM tb_detail_item D JOIN tb_item I ON D.id_item = I.id WHERE D.status = 1";
        $query = $this->db->query($sql);
        return $query;
    }

    function join_table_distribution()
    {
        $sql = "SELECT tb_tr_distribution.*, tb_lokasi.nama_lokasi, tb_tiket.no_tiket, tb_tr_requisition.quantity
        FROM tb_tr_distribution
        JOIN tb_lokasi ON tb_tr_distribution.id_lokasi = tb_lokasi.id
        JOIN tb_tr_requisition ON tb_tr_requisition.id = tb_tr_distribution.id_requisition
        JOIN tb_tiket ON tb_tiket.id = tb_tr_requisition.id_tiket ";
        $query = $this->db->query($sql);
        return $query;
    }

    function join_table_detail_distribution($id)
    {
        $sql = "SELECT tb_tr_distribution.*, tb_tr_requisition.quantity, tb_tiket.no_tiket
        FROM tb_tr_distribution
        JOIN tb_tr_requisition ON tb_tr_distribution.id_requisition = tb_tr_requisition.id
        JOIN tb_tiket ON tb_tr_requisition.id_tiket = tb_tiket.id
        where tb_tr_distribution.id = " . $id;
        $query = $this->db->query($sql);
        return $query;
    }

    function join_table_detail_distribution_item($id)
    {
        $sql = "SELECT tb_tr_distribution.*, tb_item.jenis, tb_item.merek, tb_detail_item.serial_number, tb_detail_item.asset_number,
        tb_detail_item.value_price, tb_detail_item.condition, tb_tr_requisition.quantity
        FROM tb_tr_distribution
        JOIN tb_tr_requisition ON tb_tr_distribution.id_requisition = tb_tr_requisition.id
        JOIN tb_tiket ON tb_tr_requisition.id_tiket = tb_tiket.id
        JOIN tb_detail_tiket ON tb_tiket.id = tb_detail_tiket.id_tiket
        JOIN tb_detail_item ON tb_detail_tiket.id_item = tb_detail_item.id
        JOIN tb_item ON tb_item.id = tb_detail_item.id_item
        WHERE tb_tr_distribution.id = " . $id;
        $query = $this->db->query($sql);
        return $query;
    }

    function join_table_distribution_get_req_id($no_tiket)
    {
        $sql = "SELECT tb_tr_requisition.*, tb_tiket.no_tiket
                FROM tb_tr_requisition
                JOIN tb_tiket ON tb_tiket.id = tb_tr_requisition.id_tiket
                WHERE tb_tiket.no_tiket = '$no_tiket'";
        $query = $this->db->query($sql);
        return $query;
    }
}
