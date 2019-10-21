<?php


    namespace App\Controllers\Home;

    use App\Controllers\Controller;
    use SF\Classes\Render;

    /**
     * Descrição para HomeController
     *
     * @autor Alexandre Ferreira
     *
     */
    class HomeController extends Render implements Controller
    {
        public function index()
        {
            return $this->view("Home.index",
                [
                    'title'=>'Página Principal'
                ]
            );
        }

        public function show()
        {
            return $this->view("Home.show",
                [
                    'title'=>'Amostra única'
                ]
            );
        }

    }