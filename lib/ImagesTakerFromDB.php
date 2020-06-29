<?php
require_once ("PDOUsing.php");

class ImagesTakerFromDB extends PDOUsing
{
    private $table;

    public function __construct($table){
        parent::__construct();
        $this->table = $table;
    }

    public function takeAllImagesFromDB(){
        return $this->selectPDO($this->table,"*","fa");
    }

    public function takeUsersImagesFromDB($user_id){
        return $this->selectPDO($this->table,"*","fa","Where user_id = '$user_id'");
    }
}