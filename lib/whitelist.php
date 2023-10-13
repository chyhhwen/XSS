<?php
    class clist
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

        public function check($ip)
        {
            $check = false;
            $pdo = $this->conn();
            $sql = "SELECT * FROM `". $this->db ."`";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            try
            {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    if($row[$this->field[1]] == $ip)
                    {
                        $check = true;
                    }
                }
            }
            catch (PDOException $e)
            {
                die();
            }
            unset($pdo);
            return $check;
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

        public function login_check($user,$pass)
        {
            $check = false;
            $pdo = $this->conn();
            $sql = "SELECT * FROM `". $this->db ."`";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            try
            {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    if($row[$this->field[2]] == $user)
                    {
                        if($row[$this->field[3]] == $pass)
                        {
                            $check = true;
                        }
                    }
                }
            }
            catch (PDOException $e)
            {
                die();
            }
            unset($pdo);
            return $check;
        }
    }
?>