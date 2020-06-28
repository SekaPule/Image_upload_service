<?php
require_once ("PDOUsing.php");

class User extends PDOUsing
{
    private $table;

    function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }

    function getUserWhereLogin($login){
        return $this->selectPDO($this->table, "*", "WHERE login = '$login'");
    }

    function AddUser($login, $password){
        $this->insertPDO($this->table,"`login`,`password`", "\"$login\", \"$password\"");
    }
}