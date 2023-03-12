<?php
require 'vendor/autoload.php';
require 'interface/EmailServerInterface.php';
require 'class/MyEmailServer.php';
require 'class/EmailSender.php';

$emailServer = new MyEmailServer();
$emailSender = new EmailSender($emailServer);
$emailSender->send("lanngocdo2479@gmail.com", "Ngọc Lan", "Điểm Danh_11/3", "Đỗ Ngọc Lan 62TH5");

?>