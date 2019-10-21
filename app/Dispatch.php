<?php


    namespace App;

    use SF\Classes\Routes;

    class Dispatch extends Routes
    {

        protected $method;
        protected $params = [];
        protected $obj;

        protected function getMethod(){ return $this->method; }
        public function setMethod($method): void{ $this->method = $method; }

        protected function getParams(){ return $this->params; }
        public function setParams($params): void{ $this->params = $params; }


        //Method Constructor
        public function __construct()
        {
            self::addController();
        }

        //Method Add Controller
        private function addController()
        {
            $routeController = $this->getRoute();
            $namespace = "App\\Controllers\\{$routeController}";
            $this->obj = new $namespace;
            self::addMethod();
        }

        //Method Add Method
        private function addMethod()
        {
            $method = isset($this->parserURL()[1]) ? $this->parserURL()[1] : 'index';

            if(method_exists($this->obj, $method))
            {
                $this->setMethod("{$method}");
                self::addParams();
                call_user_func_array([$this->obj, $this->getMethod()], $this->getParams());
            }
            else
            {
                self::addParams();
                call_user_func_array([$this->obj, "index"], $this->getParams());
            }
        }

        //Method Add Params
        private function addParams()
        {
            $contArray = count($this->parserURL());

            if($contArray > 2)
            {
                foreach ($this->parserURL() as $key => $value)
                {
                    if($key > 1)
                    {
                        $this->setParams($this->params += [$key => $value]);
                    }
                }
            }
        }
    }