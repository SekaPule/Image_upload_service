<?php
require_once ("PDOUsing.php");

class ImagesAdder extends PDOUsing
{
    private $table;
    private $directory;

    function __construct($table,$directory){
        parent::__construct();
        $this->table = $table;
        $this->directory = $directory;
    }

    function addImagesIntoDB($userID,$filename,$extension){
        $this->insertPDO($this->table, "`user_id`,`path`,`name`,`extension`", "\"$userID\",\"$this->directory\",\"$filename\",\"$extension\"");
    }

    function addImagesIntoDir($images,$filename,$extension){
        move_uploaded_file($images['tmp_name'], $this->directory."/".$filename.".".$extension);
    }

}