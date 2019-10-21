<?php


    namespace App\Routes;

    /**
     * Descrição para Web
     *
     * @autor Alexandre Ferreira
     *
     */
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