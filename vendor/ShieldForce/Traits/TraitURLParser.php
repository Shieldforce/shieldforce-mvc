<?php

    namespace SF\Traits;

    /**
     * Descrição para TraitURLParser
     *
     * @autor Alexandre Ferreira
     *
     */
    trait TraitURLParser
    {
        public function parserURL()
        {
            return explode("/", rtrim(URL_PARAMS), FILTER_SANITIZE_URL);
        }
    }
