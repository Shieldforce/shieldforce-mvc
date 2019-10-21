<?php

    namespace App\Starting;

    use App\Config\Database;
    use App\Config\Defines;
    use App\Dispatch;

    /**
     * Descrição para Classes
     *
     * @autor Alexandre Ferreira
     *
     */
    class Application
    {
        public $parserURL;

        public function __construct()
        {
            //Defines
            $db = new Defines();
            $db->env();

            //Configuration
            ob_start();
            ini_set('display_errors', 1);
            set_time_limit(0);
            date_default_timezone_set(APP_TIMEZONE);

            //Connection
            $db = new Database();
            $db->conn();

            //Start Session
            \SF\Services\Sessions\StartSession::sec_session_start();

            $dispatch = new Dispatch();

        }
    }
