<?php
//namespacenya
namespace App\Entities;
//use
use CodeIgniter\Entity;
use CodeIgniter\Entity\Entity as EntityEntity;

class Users extends EntityEntity
{
    public function setPassword(string $pass) //untuk salt / has
    {
        $salt = uniqid('', true);
        $this->attributes['salt'] = $salt; //mengambil isi salt
        $this->attributes['password'] = md5($salt . $pass); //password di isi has md5 dengan parameter pass dan salt

        return $this; //mengembalikan this
    }
}
