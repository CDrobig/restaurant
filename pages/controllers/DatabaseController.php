<?php

namespace App;

class DatabaseController
{
    private $_link = null;

    public function __construct()
    {
        $this->conn();
    }

    public function conn()
    {
        $this->_link = new \mysqli("localhost:3306", "root", "root", "restaurant");

        /* check connection */
        if ($this->_link->connect_errno) {
            printf("Connect failed: %s\n", $this->_link->connect_error);
            exit();
        }
    }

    public function showAlkoholfrei()
    {
        $query = "SELECT * FROM drinks WHERE kategorie='alkoholfrei';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showHeißgetränke ()
    {
        $query = "SELECT * FROM drinks WHERE kategorie='heißgetränke';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showBier ()
    {
        $query = "SELECT * FROM drinks WHERE kategorie='bier';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showWein ()
    {
        $query = "SELECT * FROM drinks WHERE kategorie='wein';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function compare_user_credentials(String $user, String $passwort)
    {
        $query = "SELECT * FROM user WHERE ID='" . $user . "' AND passwort='" . $passwort. "';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);

        if (count($parsed) == 0) {
            return false;
        } else {
            return $parsed;
        }
    }

    private function get_as_array($data)
    {
        $array = array();
        $tmp = array();

        while ($row = $data->fetch_assoc()) {
            foreach ($row as $key => $value) {
                $tmp[$key] = $row[$key];
            }
            $array[] = $tmp;
        }

        return $array;
    }

}