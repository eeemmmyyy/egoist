<?php

class Users
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login($data)
    {
        if ($this->validate($data)) {
            $sql = "SELECT * FROM user WHERE login='$data->login' AND password='$data->password'";
            $this->conn->query($sql);
            return ['message' => 'success', 'status' => 201];
        } else {
            return ['message' => 'validationError', 'status' => 401];
        }

    }

    public function register($data)
    {
        if ($this->validate($data)) {

            $sql = "INSERT INTO user (login, email, password) VALUES ('$data->login', '$data->email', '$data->password')";
            $this->conn->query($sql);
            return ['message' => 'success', 'status' => 201];
        } else {
            return ['message' => 'validationError', 'status' => 401];
        }

    }

    public function validate($data)
    {
        if (strlen($data->password) <= 5) {
            return false;
        } else {
            return true;
        }
    }
    public function logout()
    {
        $sql = "";
        $this->conn->query($sql);

    }
}