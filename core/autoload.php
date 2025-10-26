<?php
// hàm khởi tạo
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Khởi tạo các session
if(!isset($_SESSION['user'])) $_SESSION['user'] = [];
if(!isset($_SESSION['toast'])) $_SESSION['toast'] = [];
if(!isset($_SESSION['canvas'])) $_SESSION['canvas'] = '';

// Khởi tạo cookie
if(!isset($_COOKIE['mode_light'])) setcookie('mode_light','off',time()+84000*365,'/');