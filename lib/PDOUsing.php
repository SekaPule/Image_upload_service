<?php
session_start();
if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = date("H:i:s");
}

class PDOUsing
{
    private $MPDO;

    function __construct($dbname = "image_upload_service", $hostname = "localhost", $user = "root", $password = ""){
        try {
            $this->MPDO = new PDO("mysql:dbname={$dbname};host={$hostname}",$user,$password);
            return $this->MPDO;
        }catch (PDOException $e){
            echo "Database connection error!".$e->getMessage();
        }
    }

    function selectPDO($tb, $cols, $where="", $order="", $limit=""){
        $sql ="SELECT {$cols} FROM  `{$tb}` {$where} {$order} {$limit}";
        $rs = $this->MPDO->query($sql);
        $rs->execute();
        if($where != ""){
            $row = $rs->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            $row = $rs->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }

    function insertPDO($tb, $cols, $values){
        $sql = "INSERT INTO {$tb}({$cols}) VALUES ({$values})";
        $rs = $this->MPDO->prepare($sql);
        $rs->execute();
    }

    function deletePDO($tb, $where){
        $sql = "DELETE FROM {$tb} {$where}";
        $rs = $this->MPDO->prepare($sql);
        $rs->execute();
    }
}