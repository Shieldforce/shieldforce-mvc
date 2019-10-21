<?php


    namespace App\Controllers;


    class Error404Controller
    {
        public function __construct()
        {
            $return =
                [
                    'code'     =>404,
                    'mgs'      =>'Page not Found',
                    'line'     =>19,
                    'data'     =>null,
                ];
            echo "<pre style='background-color: black;color: red;padding: 20px;'>";
            print_r($return);
            echo "</pre>";
        }
    }