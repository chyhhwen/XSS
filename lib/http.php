<?php
class http
{
    public $ip;
    public function client_ip()
    {
        if (!empty($_SERVER["HTTP_CLIENT_IP"]))
        {
            $this->ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            $this->ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (!empty($_SERVER["REMOTE_ADDR"]))
        {
            $this->ip = $_SERVER["REMOTE_ADDR"];
        }
        else
        {
            $this->ip = "NULL";
        }
        if ($this->ip === "::1")
        {
            $this->ip = '127.0.0.1';
        }
        return $this->ip;
    }
    public function time()
    {
        return date('Y-m-d-H-i-s');
    }
}
?>