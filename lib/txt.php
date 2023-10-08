<?php
    class txt
    {
        public $comment;
        public function put_test($data)
        {
            $this -> comment = $data;
        }
        public function write()
        {
            $data = $this -> comment;
            $dir = './log/'.$GLOBALS['time'];
            $filename = $dir.'.txt';
            if($fp = fopen($filename, 'w+'))
            {
                fwrite($fp, $data);
                fclose($fp);
            }
        }
    }
?>