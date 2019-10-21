<?php


    namespace App\Controllers\Errors;

    use App\Controllers\Controller;
    use SF\Classes\Render;

    /**
     * Descrição para Error404Controller
     *
     * @autor Alexandre Ferreira
     *
     */
    class Error404Controller extends Render implements Controller
    {
        public function index()
        {
            return $this->view("Errors.viewNotFound",['title'=>'View Not Found']);
        }
    }