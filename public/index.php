<?php

    /**
     * Descrição para Index
     *
     * @autor Alexandre Ferreira
     *
     */

    if(!file_exists("../vendor/autoload.php")):
        die("Execute o composer para gerar o autoload da aplicação!");
    endif;

    include_once '../vendor/autoload.php';

    $startClasses = new \App\Starting\Application();

    echo "<pre>";
        print_r('');
    echo "</pre>";


