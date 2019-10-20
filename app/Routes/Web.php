<?php


    namespace App\Routes;


    class Web
    {
        public function setRoutes()
        {
            return
                [
                    ""                          => "HomeController",
                    "home"                      => "HomeController",
                    "sitemap"                   => "SitemapController",
                    "produtos"                  => "ProductsController",
                ];
        }
    }