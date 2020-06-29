<?php
session_start();
if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = date("H:i:s");
}

class PDOUsing
{
    private $MPDO;

    public function __construct($dbname = "image_upload_service", $hostname = "localhost", $user = "root", $password = ""){
        try {
            $this->MPDO = new PDO("mysql:dbname={$dbname};host={$hostname}",$user,$password);
            return $this->MPDO;
        }catch (PDOException $e){
            echo "Database connection error!".$e->getMessage();
        }
    }

    public function selectPDO($tb, $cols, $special,$where="", $order="", $limit=""){
        $sql ="SELECT {$cols} FROM  `{$tb}` {$where} {$order} {$limit}";
        $rs = $this->MPDO->query($sql);
        $rs->execute();
        if($special === "f"){
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            return $row;
        }else if($special === "fa"){
            $row = $rs->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }

    public function insertPDO($tb, $cols, $values){
        $values_count = count($values);
        $questions = array_fill(0, $values_count, '?');
        $tokens = implode(', ', $questions);
        $sql = "INSERT INTO {$tb}({$cols}) VALUES ($tokens)";
        $rs = $this->MPDO->prepare($sql);
        $rs->execute($values);
    }

    public function deletePDO($tb, $where){
        $sql = "DELETE FROM {$tb} {$where}";
        $rs = $this->MPDO->prepare($sql);
        $rs->execute();
    }
}