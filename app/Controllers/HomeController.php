<?php


    namespace App\Controllers;


    class HomeController
    {
        public function index()
        {

        }

        public function show($var1, $var2, $var3)
        {
            echo 'Parâmetro 1: '.$var1.'<br>';
            echo 'Parâmetro 2: '.$var2.'<br>';
            echo 'Parâmetro 3: '.$var3.'<br>';
        }

    }