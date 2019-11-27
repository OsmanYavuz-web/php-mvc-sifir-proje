<?php

class Database
{

    protected $db;

    /**
     * Database constructor.
     * BasicDB ile veritabanı sınıfı oluşturma
     */
    public function __construct()
    {
        $this->db = new basicdb(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
    }

}