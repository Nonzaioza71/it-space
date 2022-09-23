<?php
    Class BaseModel
    {
        public $host;
        public $user;
        public $pass;
        public $db;
    
        public function __construct()
        {
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "root123456";
            $this->db = "it_space";
        }
        
        public function connect()
        {
            $link = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if ($link->connect_error) {
                die("Connection failed: " . $link->connect_error);
            }
            return $link;
        }
    }