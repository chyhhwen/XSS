<?php
    class jwt
    {
        public $key;
        public $payload;
        public $signature;
        public function put_key($p,$k)
        {
            $this -> payload = $p;
            $this -> key = $k;
        }

        public function create()
        {
            $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
            $header = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
            $this -> payload = json_encode($this -> payload);
            $this -> payload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($this -> payload));
            $this -> signature = hash_hmac('sha256',$header . "." .  $this -> payload, $this -> key, true);
            $this -> signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($this -> signature));
            return $header . "." . $this -> payload . "." . $this -> signature;
        }

        function verify($token)
        {
            list($header, $payload, $signature) = explode('.', $token);
            $valid = hash_hmac('sha256', $header . "." . $payload, $this -> key, true);
            $valid = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($valid));
            return $signature === $valid;
        }

    }
?>