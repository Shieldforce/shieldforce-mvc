<?php

    namespace SF\Classes;

    use SF\Traits\Compact;

    /**
     * Descrição para Render
     *
     * @autor Alexandre Ferreira
     *
     */
    class Render
    {
        use Compact;

        public function view($path_view, array $compact=null)
        {
            $this->setCompact($compact);
            $view = str_replace(".", "/", $path_view);
            if($path_view!=null & file_exists(ROOT_PATH."app/Views/".$view.".flix.html"))
            {
                //extract($this->getCompact());
                $tpl = file_get_contents(ROOT_PATH."app/Views/".$view.".flix.html");

                $vars = array_merge($this->getCompact(), get_defined_constants());

                //Informações e variáveis vindo do controller
                $links = explode("&", "[[-- #" . implode(" --]]&[[-- #", array_keys($vars)) . " --]]");
                echo str_replace($links, array_values($vars), preg_replace(["#(\s)+#"], " ", str_replace(["[[--#", "--]]"], ["[[-- #", " --]]"], $tpl)));

                return true;
            }
            return include_once(ROOT_PATH."app/Views/Errors/viewNotFound.flix.html");
        }
    }