<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhs extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function getdata()
    {
        //mengambil semua data pada database
        $this->db->select('*');
        $this->db->from('mhs');
        $query = $this->db->get();

        return $query;
    }

    function tambahmhs($data)
    {
        //input data ke database
        $this->db->set('no', $data['no']);
        $this->db->set('nama', $data['nama']);
        $this->db->set('jurusan', $data['jurusan']);
        $this->db->insert('mhs');
    }

    function getedit($no)
    {
        //mengambil data untuk diupdate
        $this->db->select('*');
        $this->db->from('mhs');
        $this->db->where('no =', $no);

        $query = $this->db->get();
        return $query;
    }

    function update($no, $data)
    {
        //update data
        $this->db->set('nama', $data['nama']);
        $this->db->set('jurusan', $data['jurusan']);
        $this->db->where('no = ', $no);
        $this->db->update('mhs');
    }

    function delete($no)
    {
        //hapus data
        $this->db->where('no', $no);
        $this->db->delete('mhs');

        return true;
    }

    function ceklogin($login)
    {
        //menyamakan isi dari user dan pass
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('user =', $login['user']);
        $this->db->where('pass =', $login['pass']);

        $query = $this->db->get();

        return $query;
    }

    function regis($data)
    {
        $this->db->set('user', $data['user']);
        $this->db->set('pass', $data['pass']);
        $this->db->set('lvl', $data['lvl']);
        $this->db->insert('login');
    }
}
