<?php

class DB
{

//    private $host = 'localhost';
//    private $db_name = 'ebtvvbpk_m3';
//    private $username = 'root';
//    private $password = '';

    private $host = 'localhost';
    private $db_name = 'ebtvvbpk_m3';
    private $username = 'ebtvvbpk';
    private $password = 'rVGrAg';

    private $conn;

    public function getConnection()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        mysqli_set_charset($this->conn, 'utf8');
        return $this->conn;

//        try {
//            $this->conn = mysqli_connect("$this->host", "$this->username", "$this->password", "$this->db_name");
//            if (!$this->conn) {
//                throw new Exception(mysqli_connect_error());
//            }
//
//        } catch (Exception $e) {
//            echo 'Подключение не удалось: ' . $e->getMessage();
//        }

    }


}