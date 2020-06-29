<?php
require_once ("PDOUsing.php");

class User extends PDOUsing
{
    private $table;

    public function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }

    public function getUserWhereLogin($login){
        return $this->selectPDO($this->table, "*", "f","WHERE login = '$login'");
    }

    public function AddUser($login, $password){
        $this->insertPDO($this->table,"`login`,`password`", [$login,$password]);
    }
}