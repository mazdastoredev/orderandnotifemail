<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'rajainfo@danuweb.my.id';
    public string $fromName   = 'Order System';

    public string $protocol   = 'smtp';
    public string $SMTPHost   = 'mail.danuweb.my.id';
    public string $SMTPUser   = 'rajainfo@danuweb.my.id';
    public string $SMTPPass   = 'Mazdastore1453!@#'; // pakai password email hosting
    public int    $SMTPPort   = 465;   // coba dulu SSL
    public int    $SMTPTimeout = 10;
    public bool   $SMTPKeepAlive = false;
    public string $SMTPCrypto = 'ssl'; // gunakan ssl untuk port 465

    public bool   $wordWrap   = true;
    public int    $wrapChars  = 76;
    public string $mailType   = 'html';
    public string $charset    = 'UTF-8';
    public bool   $validate   = true;
    public int    $priority   = 3;
    public string $CRLF       = "\r\n";
    public string $newline    = "\r\n";
}
