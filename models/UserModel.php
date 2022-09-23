<?php
    $path = dirname(__FILE__);
    require_once($path.'./BaseModel.php');
    class UserModel extends BaseModel {
        private $baseModel;
        private $connect;
        
        public function __construct() {
            $this->baseModel = new BaseModel();
            $this->connect = $this->baseModel->connect();
        }

        public function getUserLoginBy($input)
        {
            $sql = "
                SELECT * FROM `tb_users`
                WHERE username = '".addslashes($input['username'])."'
                AND password = '".addslashes($input['password'])."'
            ";
            $result = $this->connect->query($sql);
            $data = $result->fetch_assoc();
            return $data;
        }

        public function insertUserBy($input)
        {
            $sql = "
                INSERT INTO `tb_users` (
                    `user_id`, 
                    `username`, 
                    `password`, 
                    `user_prefix`, 
                    `user_name`, 
                    `user_lastname`, 
                    `user_address`, 
                    `user_phone`, 
                    `user_role`, 
                    `user_role_name`
                ) VALUES (
                    NULL, 
                    '".addslashes($input['username'])."', 
                    '".addslashes($input['password'])."', 
                    '".addslashes($input['prefix'])."', 
                    '".addslashes($input['user_name'])."', 
                    '".addslashes($input['user_lastname'])."', 
                    '".addslashes($input['user_address'])."', 
                    '".addslashes($input['user_phone'])."', 
                    'member', 
                    'สมาชิกทั่วไป'
                )
            ";
            $result = $this->connect->query($sql);
            return $result;
        }
    }

