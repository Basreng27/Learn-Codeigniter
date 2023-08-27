<?php
//restfull apinya
//namespacenya
namespace App\Controllers;
//usenya menggunakan resourcecontroller untuk api
use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\UsersModel'; //meload model
    protected $format = 'json'; //format menggunakan json

    //memanggil validationnya di __construct
    public function __construct()
    {
        //supaya sekali panggil
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return $this->respond($this->model->findAll()); //mengambil semua data dari user model  
    }

    //method create
    public function create()
    {
        //insert data menggunakan post
        $data = $this->request->getPost(); //mengirim data
        $validate = $this->validation->run($data, 'register'); //mengirim '$data' ke dalam function bernama 'register' yang ada di validation
        //cek ada error atau tidak
        $errors = $this->validation->getErrors();

        if ($errors) { //jika ada error
            return $this->fail($errors);
        }

        //membuat users entities baru
        $user = new \App\Entities\Users();
        $user->fill($data); //mengirimkan data ke entities
        $user->created_by = 0; //isi dari 'created_by'
        $user->created_date = date("Y-m-d H:i:s"); //isi dari 'created_date'

        if ($this->model->save($user)) { //jika user atas berhasil di save/create
            return $this->respondCreated($user, 'user created'); //sudah disediakan o;eh ci responcreated
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput(); //get id
        $data['id'] = $id; //mengambil dan menyimpan id
        $validate = $this->validation->run($data, 'update_user'); // sama seperti atas
        $errors = $this->validation->getErrors();

        if ($errors) { //jika ada error
            return $this->fail($errors);
        }

        if (!$this->model->findById($id)) { //kalau id tidak ditemukan
            return $this->fail('id tidak ditemukan');
        }

        //membuat users entities baru
        $user = new \App\Entities\Users();
        $user->fill($data); //mengirimkan data ke entities
        $user->updated_by = 0; //isi dari 'created_by'
        $user->updated_date = date("Y-m-d H:i:s"); //isi dari 'created_date'

        if ($this->model->save($user)) { //jika user atas berhasil di save/create
            return $this->respondUpdated($user, 'user updated'); //sudah disediakan o;eh ci responcreated
        }
    }

    public function delete($id = null)
    {
        if (!$this->model->findById($id)) { //kalau id tidak ditemukan
            return $this->fail('id tidak ditemukan');
        }

        if ($this->model->delete($id)) { //jika delete berhasil
            return $this->respondDeleted(['id' => $id . ' Deleted']);
        }
    }

    public function show($id = null)
    {
        $data = $this->model->findById($id);

        if ($data) { //jika datanya ada
            return $this->respond($data);
        }

        return $this->fail('errors');
    }
}
