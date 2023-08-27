<?php
//namesapcenya 
namespace App\Models;

//use
use CodeIgniter\Model;

class UsersModel extends Model
{
    //biasanya 1 model 1 tabel
    protected $table = 'users'; //nama tabel
    protected $primaryKey = 'id'; //primarykey
    protected $allowedFields = [ //file apa saja yang boleh di edit
        'username', 'firstname', 'lastname', 'address', 'age', 'avatar', 'password', 'salt', 'created_by', 'created_date', 'updated_by', 'updated_date'
    ];
    protected $returnType = 'App\Entities\Users'; //menggunakan entity //untuk menyingkat code
    protected $useTimestamps = false; //karna tidak digunakan

    //cari berdasarkan id
    public function findById($id)
    {
        $data = $this->find($id);
        if ($data) {
            // return true;
            return $data; //jadi bisa di gunakan di delete update findby
        }
        return false;
    }
}
