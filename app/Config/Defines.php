<?php

    namespace App\Config;

    class Defines
    {
        public function env()
        {
            return
                [

                    //Connection DB
                    define("HOST"               , "localhost"),
                    define("DB"                 , "course_pdo"),
                    define("USER"               , "root"),
                    define("PASS"               , ""),
                    define("CHARSET"            , "utf8"),
                    define("DRIVER"             , "mysql"),
                    //---------

                    //App Infor
                    define("APP_NAME"           , "Framework-ShieldForce"),
                    define("APP_HOST"           , "http://course-pdo"),
                    define("APP_MODE"           , "dev"), // dev = development | prod = production
                    define("APP_HASH"           , "3502794511571543148")
                    //---------

                ];
        }
    }