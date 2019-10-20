<?php

    namespace SF\Traits;

    class TraitURLParser
    {
        public function parserURL()
        {
            return explode("/", rtrim(URL_PARAMS), FILTER_SANITIZE_URL);
        }
    }
