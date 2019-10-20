<?php

    namespace App\Starting;

    use App\Config\Database;
    use App\Config\Defines;

    class Classes
    {
        public function __construct()
        {
            //Defines
            $db = new Defines();
            $db->env();

            //Connection
            $db = new Database();
            $db->conn();
        }
    }
