<?php


class ChangePassword extends Controller
{
    public function index(){

        $this->view('sifredegistir', [
            //'users' => $users
        ]);

    }
}