<?php

    namespace App\Config;

    /**
     * Descrição para Database
     *
     * @autor Alexandre Ferreira
     *
     */
    class Database
    {
        public function conn()
        {
            try
            {
                $return = new \PDO("". DRIVER .":hostname=". HOST .";dbname=". DB ."", "". USER ."", "". PASS ."");
                $return->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
            }
            catch (\PDOException $e)
            {
                $return =
                    [
                        'code'     =>$e->getCode(),
                        'status'   =>'error',
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

