<?php defined('BASEPATH') OR exit('No direct script access allowed');

    // Konfigurasi email
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host'=>'ssl://smtp.googlemail.com',
        'smtp_port'=>465,
        'smtp_user' => 'nimeindo32@gmail.com',    // Ganti dengan email gmail kamu
        'smtp_pass' => 'arsian085',      // Password gmail kamu
        'starttls'  => true,
        'newline'   => "\r\n"
    ];
