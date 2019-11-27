<?php

class Uyeler extends Controller
{

    public function index(){

        $usersModel = $this->model('users');
        $users = $usersModel->getAll();

        $this->view('uyeler', [
            'users' => $users
        ]);
    }

    public function post(){

        $username = $_POST['username'];

        $userModel = $this->model('users');
        $users = $userModel->getLike($username);

        if($users == "error"){
            $this->view('uyeler', [
                'users' => '0',
                'message' => '<b>Kayıt bulunamadı</b>'
            ]);
        }else {
            $this->view('uyeler', [
                'users' => $users
            ]);
        }
    }

}