<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = '465'; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
$config['smtp_crypto'] = 'SSL';
$config['smtp_user'] = 'James00Andy@gmail.com';
$config['smtp_pass'] = '7503839705';
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html';
$config['newline']="\r\n";
//$config['smtp_timeout']='30';
//$config['charset']='utf-8';
//$config['wordwrap'] = TRUE;
