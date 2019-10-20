<?php

    namespace App\Config;

    class Database
    {
        public function conn()
        {
            try
            {
                $return = new \PDO("". DRIVER .":hostname=". HOST .";dbname=". DB ."", "". USER ."", "". PASS ."");
            }
            catch (\PDOException $e)
            {
                $return =
                    [
                        'code'     =>$e->getCode(),
                        'mgs'      =>$e->getMessage(),
                        'line'     =>$e->getLine(),
                        'data'     =>null,
                    ];
                echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                    print_r($return);
                echo "</pre>";
            }
            return $return;
        }
    }

