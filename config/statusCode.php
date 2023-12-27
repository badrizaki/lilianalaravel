<?php

return [
    'php_error' => [
        'statusCode'=> 1000,
        'message' 	=> 'Sorry an error occurred',
    ],
    'database_error' => [
        'statusCode'=> 1001,
        'message' 	=> 'Database Error',
    ],
    'validator_invalid' => [
        'statusCode'=> 1002,
        'message' 	=> 'Not valid',
    ],
    'login_invalid' => [
        'statusCode'=> 1003,
        'message'   => 'Wrong Email or password',
    ],
    'not_verified' => [
        'statusCode'=> 1004,
        'message'   => 'Akun Anda belum di verifikasi Admin, kami akan periksa data Anda, dan akan segera kami email.',
    ],
    'data_null' => [
        'statusCode'=> 1005,
        'message'   => 'Data kosong',
    ],


    'status_cannot_null' => [
        'statusCode'=> 2003,
        'message'   => 'Status tidak boleh kosong',
        'errors'    => 'Status tidak boleh kosong',
    ],

    'file_cannot_null' => [
        'statusCode'=> 2004,
        'message'   => 'File/Image tidak boleh kosong',
        'errors'    => 'File/Image tidak boleh kosong',
    ],

    'success' => [
        'statusCode'=> 200,
        'message' 	=> 'Success',
    ],
];