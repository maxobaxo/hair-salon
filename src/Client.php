<?php
    class Client
    {
        private $name_cl;
        private $stylist_id;
        private $id;

        function __construct($name_cl, $stylist_id, $id = null)
        {
            $this->name_cl = $name_cl;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function setName($new_name_cl)
        {
            $this->name_cl = (string) $new_name_cl;
        }

        function getName()
        {
            return $this->name_cl;
        }

        function getId()
        {
            return $this->id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO clients (name_cl, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()})");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function find($search_id)
        {
            $found_client = null;
            $returned_clients = $GLOBALS['DB']->prepare("SELECT * FROM clients WHERE id = :id");
            $returned_clients->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_clients->execute();
            foreach($returned_clients as $client) {
                $name_cl = $client['name_cl'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                if ($id == $search_id) {
                    $found_client = new Client($name_cl, $stylist_id, $id);
                }
            }
            return $found_client;
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $all_clients = array();
            foreach($returned_clients as $client) {
                $name_cl = $client['name_cl'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client ($name_cl, $stylist_id, $id);
                array_push($all_clients, $new_client);
            }
            return $all_clients;
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM clients;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        function update($new_name_cl)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE clients SET name_cl = '{$new_name_cl}' WHERE id = {$this->getId()};");
            if ($executed) {
                $this->setName($new_name_cl);
                return true;
            } else {
                return false;
            }
        }

        function delete()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
