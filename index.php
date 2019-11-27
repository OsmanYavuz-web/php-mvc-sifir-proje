<?php

// Autoload yükle
require 'vendor/autoload.php';

// Dil Sistemi
$lang = new \Adamlar\Helpers\language();
$lang::$gLang = SITE_LANG;
$lang::langLoad();



// Rota Sistemi
$route = new \Adamlar\Routes\Route();



// Sabit linkler
/*$route::$SiteUrl = [
    '/',
    '/uyeler',
    '/uye/{url}',
    '/profil/sifre-degistir'
];*/

// Rotasyon
$route::run('/', 'anasayfa@index');
$route::run('/{lang}', 'anasayfa@index');
$route::run('/{lang}/uyeler', 'uyeler@index');
$route::run('/{lang}/uyeler', 'uyeler@post', 'post');
$route::run('/{lang}/uye/{url}', 'uye@index');
$route::run('/{lang}/profil/sifre-degistir', 'profile/changepassword@index');


// ingilizce için
$route::run('/{lang}/accounts', 'uyeler@index');





