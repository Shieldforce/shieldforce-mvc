<?php


    namespace App\Routes;


    class Web
    {
        public function setRoutes()
        {
            return
                [
                    ""                          => "Home\HomeController",
                    "home"                      => "Home\HomeController",
                ];
        }
    }