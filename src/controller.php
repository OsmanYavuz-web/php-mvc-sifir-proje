<?php

class Controller {

    /**
     * @desc view klasörü altındaki sayfaları çağırma
     * @param $name
     * @param array $data
     */
    public function view($name, $data = [])
    {
        extract($data);
        require __DIR__ . '/view/static/header.php';
        require __DIR__ . '/view/' . strtolower($name) . '.php';
        require __DIR__ . '/view/static/footer.php';
    }

    /**
     * @desc Veritabanı işlemlerinde çağırma
     * @param $name
     * @return mixed
     */
    public function model($name)
    {
        require __DIR__ . '/model/' . strtolower($name) . '.php';
        return new $name();
    }
}