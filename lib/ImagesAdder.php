<?php
require_once ("PDOUsing.php");

class ImagesAdder extends PDOUsing
{
    private $table;
    private $directory;

    public function __construct($table,$directory){
        parent::__construct();
        $this->table = $table;
        $this->directory = $directory;
    }

    public function addImagesIntoDB($userID,$filename,$extension){
        $this->insertPDO($this->table, "`user_id`,`path`,`name`,`extension`", [$userID,$this->directory,$filename,$extension]);
    }

    public function addImagesIntoDir($images,$filename,$extension){
        move_uploaded_file($images['tmp_name'], $this->directory."/".$filename.".".$extension);
    }

}