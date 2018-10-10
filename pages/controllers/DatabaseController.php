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
        $this->_link = new \mysqli("localhost", "thedish", "Ced55344", "restaurant");

        /* check connection */
        if ($this->_link->connect_errno) {
            printf("Connect failed: %s\n", $this->_link->connect_error);
            exit();
        }
        mysqli_query($this->_link, 'set names utf8');
    }

    public function showAlkoholfrei()
    {
        $query = "SELECT * FROM drinks WHERE kategorie='alkoholfrei';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showHeißgetraenke()
    {
        $query = "SELECT * FROM drinks WHERE kategorie='heißgetränke';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showBier()
    {
        $query = "SELECT * FROM drinks WHERE kategorie='bier';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showWein()
    {
        $query = "SELECT * FROM drinks WHERE kategorie='wein';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showVorspeise()
    {
        $query = "SELECT * FROM menu WHERE kategorie='vorspeise';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showHauptgang()
    {
        $query = "SELECT * FROM menu WHERE kategorie='hauptgang';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }


    public function showDessert()
    {
        $query = "SELECT * FROM menu WHERE kategorie='dessert';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showBeilagen()
    {
        $query = "SELECT * FROM menu WHERE kategorie='beilagen';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showSpecial()
    {
        $query = "SELECT * FROM menu WHERE kategorie='special';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showSpecial1()
    {
        $query = "SELECT * FROM menu WHERE ID='501';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function showKindergericht()
    {
        $query = "SELECT * FROM kids WHERE kategorie='kindergericht';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);
        return $parsed;

    }

    public function compare_user_credentials(String $user, String $passwort)
    {
        $query = "SELECT * FROM user WHERE ID='" . $user . "' AND passwort='" . $passwort . "';";
        $result = $this->_link->query($query);

        $parsed = $this->get_as_array($result);

        if (count($parsed) == 0) {
            return false;
        } else {
            return $parsed;
        }
    }

    public function bestell_position_einfuegen($tisch, $tabelle, $gericht_id)
    {
        $query = "INSERT INTO `bestellung`(`tischnummer`, `gericht_id`, `tabelle`) VALUES ($tisch, '$gericht_id', '$tabelle');"; // zuerst bestellung neu anlegen
        $result = $this->_link->query($query);
        $bestellung = mysqli_insert_id($this->_link);
        return $bestellung;
    }

    public function showRechnung()
    {

        $tisch = $_SESSION['auth']['tischnummer'];

        $result = array();

        $drinks = "SELECT b.ID as 'ID', b.tischnummer as 'Tischnummer', d.name as 'Name', d.price as 'Preis' FROM bestellung b INNER JOIN drinks d on b.gericht_id = d.ID WHERE tischnummer = $tisch ORDER BY b.tischnummer, b.ID;";
        $menu = "SELECT b.ID as 'ID', b.tischnummer as 'Tischnummer', m.name as 'Name', m.price as 'Preis' FROM bestellung b INNER JOIN menu m on b.gericht_id = m.ID WHERE tischnummer = $tisch ORDER BY b.tischnummer, b.ID";
        $kids = "SELECT b.ID as 'ID', b.tischnummer as 'Tischnummer', k.name as 'Name', k.price as 'Preis' FROM bestellung b INNER JOIN kids k on b.gericht_id = k.ID WHERE tischnummer = $tisch ORDER BY b.tischnummer, b.ID";
        $getraenke = $this->_link->query($drinks);
        $getraenke = $this->get_as_array($getraenke);
        foreach ($getraenke as $element) {
            if (isset($element)) {
                array_push($result, $element);
            }
        }
        $speisen = $this->_link->query($menu);
        $speisen = $this->get_as_array($speisen);
        foreach ($speisen as $element) {
            if (isset($element)) {
                array_push($result, $element);
            }
        }
        $kinder = $this->_link->query($kids);
        $kinder = $this->get_as_array($kinder);
        foreach ($kinder as $element) {
            if (isset($element)) {
                array_push($result, $element);
            }
        }

        return $result;
    }

    public function show_bestellungen()
    {
        // SELECT b.ID as "ID", CONCAT(d.name,'', m.name) as "Name", CONCAT(d.price,'', m.price) as "Preis" FROM bestellung b LEFT JOIN drinks d on b.gericht_id = d.ID LEFT JOIN menu m ON b.gericht_id = m.ID
        $tischnummern = "SELECT tischnummer FROM bestellung GROUP BY tischnummer";
        $ids = $this->_link->query($tischnummern);
        $ids = $this->get_as_array($ids);
        $result = array();
        foreach ($ids as $nummer) {
            $result[$nummer['tischnummer']] = array();
            $drinks = "SELECT b.ID as 'ID', b.tischnummer as 'Tischnummer', d.name as 'Name', d.price as 'Preis' FROM bestellung b INNER JOIN drinks d on b.gericht_id = d.ID WHERE tischnummer = " . $nummer['tischnummer'] . " ORDER BY b.tischnummer, b.ID;";
            $menu = "SELECT b.ID as 'ID', b.tischnummer as 'Tischnummer', m.name as 'Name', m.price as 'Preis' FROM bestellung b INNER JOIN menu m on b.gericht_id = m.ID WHERE tischnummer = " . $nummer['tischnummer'] . " ORDER BY b.tischnummer, b.ID";
            $kids = "SELECT b.ID as 'ID', b.tischnummer as 'Tischnummer', k.name as 'Name', k.price as 'Preis' FROM bestellung b INNER JOIN kids k on b.gericht_id = k.ID WHERE tischnummer = " . $nummer['tischnummer'] . " ORDER BY b.tischnummer, b.ID";
            $getraenke = $this->_link->query($drinks);
            $getraenke = $this->get_as_array($getraenke);
            foreach ($getraenke as $element) {
                if (isset($element)) {
                    array_push($result[$nummer['tischnummer']], $element);
                }
            }
            $speisen = $this->_link->query($menu);
            $speisen = $this->get_as_array($speisen);
            foreach ($speisen as $element) {
                if (isset($element)) {
                    array_push($result[$nummer['tischnummer']], $element);
                }
            }
            $kinder = $this->_link->query($kids);
            $kinder = $this->get_as_array($kinder);
            foreach ($kinder as $element) {
                if (isset($element)) {
                    array_push($result[$nummer['tischnummer']], $element);
                }
            }
            /*
            echo "<pre>";
            print_r($result);
            echo "</pre>";
            */
        }
        return $result;
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