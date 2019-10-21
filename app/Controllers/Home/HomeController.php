<?php


    namespace App\Controllers\Home;

    use App\Controllers\Controller;
    use SF\Classes\Render;

    class HomeController extends Render implements Controller
    {

        public function __construct()
        {
            return $this->view("Home.index",[]);
        }

        public function index()
        {
            return $this->view("Home.index",
                [
                    'author'               =>'Alexandre Ferreira',
                    'description'          =>'Sistema Web'
                ]
            );
        }
    }