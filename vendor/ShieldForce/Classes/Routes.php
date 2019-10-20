<?php


    namespace SF\Classes;

    use App\Routes\Web;
    use SF\Traits\TraitURLParser;

    class Routes
    {
        private $route;

        public function getRoute()
        {
            $traitURLParser = new TraitURLParser();
            $url = $traitURLParser->parserURL();
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
                    return "Error404Controller";
                }
            }
            else
            {
                return "Error404Controller";
            }
        }

    }