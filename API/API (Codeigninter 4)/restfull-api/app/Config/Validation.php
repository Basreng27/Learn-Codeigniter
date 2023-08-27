<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    //validation untuk menginput data jika kosong atau tidaknya
    public $register = [ //untuk menambahkan data baru
        'username' => [
            'rules' => 'required|min_length[5]|is_unique[users.username]', //dibutuhkan, panjangnya minimal 5, berbeda dengan yang lain
            'errors' => [
                'required' => 'Username is required.'
            ]
        ],
        'password' => [
            'rules' => 'required',
            'password' => [
                'required' => 'Username is required.'
            ]
        ],
        'firstname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Firstname is required.'
            ]
        ],
        'lastname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Lastname is required.'
            ]
        ],
        'address' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Address is required.'
            ]
        ],
        'age' => [
            'rules' => 'required|is_natural', //dibutuhkan, angka positif dari mulai 0 dst
            'errors' => [
                'required' => 'Age is required.'
            ]
        ]
    ];

    //validation untuk update data jika kosong atau tidaknya
    public $update_user = [ //untuk menambahkan data baru
        'username' => [
            'rules' => 'required|min_length[5]|is_unique[users.username,id,{id}]', //dibutuhkan, panjangnya minimal 5, berbeda dengan yang lain, mengambil id{}
            'errors' => [
                'required' => 'Username is required.'
            ]
        ],
        'password' => [
            'rules' => 'required',
            'password' => [
                'required' => 'Username is required.'
            ]
        ],
        'firstname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Firstname is required.'
            ]
        ],
        'lastname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Lastname is required.'
            ]
        ],
        'address' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Address is required.'
            ]
        ],
        'age' => [
            'rules' => 'required|is_natural', //dibutuhkan, angka positif dari mulai 0 dst
            'errors' => [
                'required' => 'Age is required.'
            ]
        ]
    ];
}
