<?php

// hatalar
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Timeout sonsuz
set_time_limit(0);


// Oturum başlatma
session_start();


// Gzip
if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'],'gzip')){
    ob_start("ob_gzhandler");
}else{
    ob_start();
}




// Veritabanı ayarları
define('DB_HOST', 'localhost');
define('DB_NAME', 'site_veritabani');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');


// Ana Domain
define('SITE_LANG', 'tr');
define('SITE_URL', 'http://localhost/');