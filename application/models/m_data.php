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
}
