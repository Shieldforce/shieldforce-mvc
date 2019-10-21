<?php


    namespace App\Controllers\Errors;

    use SF\Classes\Render;

    class Error404Controller extends Render
    {
        public function __construct()
        {
            $return =
                [
                    'code'     =>404,
                    'mgs'      =>'Controller not Found',
                    'line'     =>19,
                    'data'     =>null,
                ];
            echo "<pre style='background-color: black;color: red;padding: 20px;'>";
            print_r($return);
            echo "</pre>";
        }

        public function notMethod()
        {
            $return =
                [
                    'code'     =>404,
                    'mgs'      =>'Method not Found',
                    'line'     =>20,
                    'data'     =>null,
                ];
            echo "<pre style='background-color: black;color: red;padding: 20px;'>";
            print_r($return);
            echo "</pre>";
        }

    }