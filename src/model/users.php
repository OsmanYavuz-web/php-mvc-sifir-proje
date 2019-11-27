<?php

class Users extends Model
{

    public function getAll()
    {
        return $this->db->from('uyeler')->all();
    }

    public function getLike($value){

        $query = $this->db->from('uyeler')
            ->like('uye_eposta', $value)
            ->all();

        if($query){
            return $query;
        }else{
            return 'error';
        }

    }

}