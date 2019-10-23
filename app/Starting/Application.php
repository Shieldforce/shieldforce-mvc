<?php

    namespace App\Starting;

    use App\Config\Database;
    use App\Config\Defines;
    use App\Dispatch;
    use App\Models\Users;

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
            error_reporting(0);

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

            // Despachente do controller
            $dispatch = new Dispatch();

            $obj = new Users();


            if(APP_MODE=='dev')
            {
                if(error_get_last())
                {
                    $return =
                        [
                            'ERROR' =>
                                [
                                    'type'=>error_get_last()['type'],
                                    'message'=>error_get_last()['message'],
                                    'file'=>error_get_last()['file'],
                                    'line'=>error_get_last()['line'],
                                ]
                        ];
                    echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                    print_r($return);
                    echo "</pre>";
                }
            }

            echo "<pre>";
                print_r($users);
            echo "</pre>";
        }
    }
