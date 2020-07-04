<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelData extends CI_Model
{
    //fungsi cek session logged in
    function is_logged_in()
    {
        return $this->session->userdata('id');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

public function get_makanan(){
        $hasil = $this->db->query('SELECT * FROM makanan');
        return $hasil;
    }
public function get_minuman(){
        $hasil = $this->db->query('SELECT * FROM minuman');
        return $hasil;
    }
public function get_pelanggan(){
        $hasil = $this->db->query('SELECT * FROM pelanggan');
        return $hasil;
    }



public function view($id)
    {
        $query = $this->db->where("id", $id)
                ->get("makanan");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

public function view2($id)
    {
        $query = $this->db->where("id", $id)
                ->get("minuman");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }


public function simpan($data)
    {        
        $query = $this->db->insert("pelanggan", $data);

        if($query){
            return true;
        }else{
            return false;
        }
    }

public function bayar($id)
    {
        $query = $this->db->where("no_pesanan", $id)
                ->get("pelanggan");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('pelanggan', $data);
    }

}