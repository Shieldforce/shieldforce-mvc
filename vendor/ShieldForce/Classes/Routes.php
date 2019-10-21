<?php


    namespace SF\Classes;

    use App\Routes\Web;
    use SF\Traits\TraitURLParser;

    class Routes
    {
        use TraitURLParser;

        private $route;

        public function getRoute()
        {
            $url = $this->parserURL();
            $indice = $url[0];
            //--------------------------------------
            $web = new Web();
            //--------------------------------------

            $this->route = $web->setRoutes();

            if(array_key_exists($indice, $this->route))
            {
                if(file_exists(ROOT_PATH."app/Controllers/{$this->route[$indice]}.php"))
                {
                    return $this->route[$indice];
                }
                else
                {
                    return "Home\HomeController";
                }
            }
            else
            {
                return "Errors\Error404Controller";
            }
        }

    }