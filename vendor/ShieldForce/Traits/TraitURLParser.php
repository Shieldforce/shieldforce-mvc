<?php

    namespace SF\Traits;

    trait TraitURLParser
    {
        public function parserURL()
        {
            return explode("/", rtrim(URL_PARAMS), FILTER_SANITIZE_URL);
        }
    }
