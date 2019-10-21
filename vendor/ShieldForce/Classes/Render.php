<?php

    namespace SF\Classes;

    use SF\Traits\Compact;

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
                $links = explode("&", "[[-- #" . implode(" --]]&[[-- #", array_keys($this->getCompact())) . " --]]");
                echo str_replace($links, array_values($this->getCompact()), preg_replace(["#(\s)+#"], " ", str_replace(["[[--#", "--]]"], ["[[-- #", " --]]"], $tpl)));
                return true;
            }
            return include_once(ROOT_PATH."app/Views/Errors/viewNotFound.flix.html");
        }
    }