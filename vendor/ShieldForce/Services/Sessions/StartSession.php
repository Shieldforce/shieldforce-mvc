<?php

    namespace SF\Services\Sessions;

    /**
     * Descrição para StartSession
     *
     * @autor Alexandre Ferreira
     *
    */
    class StartSession
    {
        static function sec_session_start(bool $regenerate = FALSE)
        {
            $cookiesParams = session_get_cookie_params();

            session_set_cookie_params($cookiesParams['lifetime'], $cookiesParams['path'], $cookiesParams['domain'],FALSE, TRUE);

            session_start([
                'name'                      =>'sec_session_id',
                'use_only_cookies'          =>1,
            ]);

            if($regenerate):
                session_regenerate_id($regenerate);
            endif;
        }
    }