<?php
//namespacenya
namespace App\Database\Migrations;

// Users = sesuai nama tatel nanti
class Users extends \CodeIgniter\Database\Migration
{
    //function up dan down harus ada
    public function up()
    {
        //manipulasi db / membuat
        $this->forge->addField([ //membuat struktur field database
            'id' => [
                'type' => 'INT', //tipedata
                'constraint' => 11, //panjang nilai
                'unsigned' => true,
                'auto_increment' => true, //autoincrement
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255 //panjangnya
            ],
            'firstname' => [
                'type' => 'TEXT',
            ],
            'lastname' => [
                'type' => 'TEXT',
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'password' => [
                'type' => 'TEXT', //karena akan di has
            ],
            'salt' => [ //untuk pasword
                'type' => 'TEXT',
            ],
            'avatar' => [ //untuk gambar
                'type' => 'TEXT',
                'null' => true //data boleh kosong
            ],
            'role' => [ //hak si users
                'type' => 'INT',
                'constraint' => 1,
                'default' => 1 //jika nilainya tidak di isi
            ],
            'created_by' => [ //dibuatnya
                'type' => 'INT',
                'constraint' => 11
            ],
            'created_date' => [ //tanggal dibuatnya
                'type' => 'DATETIME',
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ],
            'updated_date' => [
                'type' => 'DATETIME',
                'nul' => true
            ]
        ]);

        //menambahkan primary key
        $this->forge->addPrimaryKey('id', true); //primary key 'id'
        //membuat tabel
        $this->forge->createTable('users'); //buat tabel dengan nama 'users'
    }

    public function down()
    {
        //menghapus table yang telah dibuat
        //menghapus table
        $this->forge->dropTable('users'); //drop table dengan nama 'users'
    }
}
