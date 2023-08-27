<?php
class Mahasiswa_model extends CI_Model
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->database();
    //     // $this->load->model('Mahasiswa_model', 'mahasiswa');
    // }

    function getMahasiswa($id = null)
    {
        if ($id === null) { //cek jika $id kosong
            return $this->db->get('mahasiswa')->result_array(); //untuk mengambil semua data di database
        } else {
            return $this->db->get_where('mahasiswa', ['id' => $id])->result_array(); //mengambil data berdasarkan id
        }

        // $this->db->select('*');
        // $this->db->from('mahasiswa');
        // $query = $this->db->get();
        // return $query;
        // var_dump($mahasiswa);
    }
    function deleteMahasiswa($id)
    {
        $this->db->delete('mahasiswa', ['id' => $id]); //untuk menghapus data berdasarkan id yang di kirim di database
        return $this->db->affected_rows(); //baris yang terpengaruh dalam tabel
    }

    function createMahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data); //untuk memasukan data baru  di database
        return $this->db->affected_rows(); //baris yang terpengaruh dalam tabel
    }

    function updateMahasiswa($data, $id)
    {
        $this->db->update('mahasiswa', $data, ['id' => $id]); //untuk mengubah data baru  di database
        return $this->db->affected_rows(); //baris yang terpengaruh dalam tabel
    }
}
