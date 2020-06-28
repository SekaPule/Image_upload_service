<?php
require_once ("PDOUsing.php");

class ImagesTakerFromDB extends PDOUsing
{
    private $table;

    function __construct($table){
        parent::__construct();
        $this->table = $table;
    }

    function takeAllImagesFromDB(){
        return $this->selectPDO($this->table,"*");
    }

    function takeUsersImagesFromDB($user_id){
        return $this->selectPDO($this->table,"*","Where user_id = '$user_id'");
    }
}