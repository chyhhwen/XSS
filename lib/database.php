<?php

class sql
{
    public $user;
    public $pass;
    public $dbname;
    public $db;
    public $field;

    public function config($u,$p,$dn,$db)
    {
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $dn;
        $this->db = $db;
    }

    public function put_data($data)
    {
        $this->field=$data;
    }

    public function conn()
    {
        try
        {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname;charset=utf8",$this->user,$this->pass);
        }
        catch (PDOException $e)
        {
            throw new PDOException($e->getMessage());
        }
        return $pdo;
    }

    public function add($val)
    {
        $pdo = $this->conn();
        $sql = "INSERT INTO `". $this->db ."` VALUES".$val;
        $sth = $pdo->prepare($sql);
        try
        {
            if (!($sth->execute($this->field)))
            {
                die();
            }

        }
        catch (PDOException $e)
        {
            die();
        }
        unset($pdo);
    }

    public function sel()
    {
        $pdo = $this->conn();
        $sql = "SELECT * FROM `". $this->db ."`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $comments = array();
        try
        {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                array_push($comments, array(
                    "id" => $row[$this->field[0]],
                    "data" => $row[$this->field[1]],
                    "time" => $row[$this->field[2]]
                ));
            }
        }
        catch (PDOException $e)
        {
            die();
        }
        unset($pdo);
        return $comments;
    }

    public function del($val , $id)
    {
        $pdo = $this->conn();
        $sql = "DELETE FROM `". $this->db ."` WHERE `". $val ."` = \"". $id ."\"";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        try
        {
            if (!($stmt->rowCount() > 0))
            {
                die();
            }
        }
        catch (PDOException $e)
        {
            die();
        }
        unset($pdo);
    }

    public function ref($a)
    {
        header('refresh:'.$a[0].';url="'.$a[1].'"');
    }
}
?>