<?php


class Error404 extends Controller
{
    public function index()
    {
        require homeDir() . '/src/view/404.php';
    }
}