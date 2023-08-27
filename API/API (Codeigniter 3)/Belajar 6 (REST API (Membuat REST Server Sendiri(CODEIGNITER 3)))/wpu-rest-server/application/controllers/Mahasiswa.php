<?php

use chriskacerguis\RestServer\RestController as RestServerRestController;
use Restserver\Libraries\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends RestServerRestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mahasiswa');
    }

    public function index_get() //untuk get data dari database
    {
        //mengambil data berdasarkan id
        $id = $this->get('id'); //method untuk get data

        if ($id === null) {
            $mahasiswa = $this->mahasiswa->getMahasiswa(); //mengambil semua data
        } else {
            $mahasiswa = $this->mahasiswa->getMahasiswa($id); //mengambil data berdasarkan id
        }

        if ($mahasiswa) { //mengecek data mahasiswa ada atau tidak
            $this->response([
                'status' => true, //cek statusnya
                'data' => $mahasiswa //data di isi semua data dari $mahasiswa
            ], RestServerRestController::HTTP_OK);
        } else { //cek jika mahasiswa kosong
            $this->response([
                'status' => false, //cek statusnya
                'message' => 'id not found' //data tidak ditemukan
            ], RestServerRestController::HTTP_NOT_FOUND);
        }
        // var_dump($mahasiswa);
    }

    public function index_delete() //untuk delete data dari database
    {
        $id = $this->delete('id'); //method untuk delete data

        if ($id === null) { //jika id tidak ada
            $this->response([
                'status' => false, //cek statusnya
                'message' => 'provide an id!' //data tidak ditemukan
            ], RestServerRestController::HTTP_BAD_REQUEST);
        } else { //jika id ada
            if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
                //ok/jika berhasil
                $this->response([
                    'status' => true, //cek statusnya
                    'id' => $id, //data di isi semua data dari $mahasiswa
                    'message' => 'deleted'
                ], RestServerRestController::HTTP_NOT_ACCEPTABLE); //HTTP_NOT_CONTENT
            } else {
                //id not found/gagal
                $this->response([
                    'status' => false, //cek statusnya
                    'message' => 'id not found!' //data tidak ditemukan
                ], RestServerRestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post() //untuk mrnambahkan data ke database
    {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->mahasiswa->createMahasiswa($data) > 0) {
            //jika berhasil
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been created'
            ], RestServerRestController::HTTP_CREATED); //HTTP_NOT_CONTENT
        } else {
            //id not found/gagal
            $this->response([
                'status' => false, //cek statusnya
                'message' => 'failed to create new data!' //data tidak ditemukan
            ], RestServerRestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put() //untuk mengedit data ke database
    {
        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {
            //jika berhasil
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been updated'
            ], RestServerRestController::HTTP_NOT_ACCEPTABLE); //HTTP_NOT_CONTENT
        } else {
            //id not found/gagal
            $this->response([
                'status' => false, //cek statusnya
                'message' => 'failed to update new data!' //data tidak ditemukan
            ], RestServerRestController::HTTP_BAD_REQUEST);
        }
    }
}
