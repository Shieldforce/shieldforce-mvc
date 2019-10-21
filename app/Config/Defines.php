<?php

    namespace App\Config;
    use SF\Classes\Routes;

    /**
     * Descrição para Defines
     *
     * @autor Alexandre Ferreira
     *
     */
    class Defines
    {
        public function env()
        {
            try
            {
                $getURL = new Routes();

                $return =
                    [
                        //Config Start
                        define("FOLDER_INTERNAL"    , "shieldforce-framework"),
                        define("DS"                 , DIRECTORY_SEPARATOR),
                        define("ROOT_PATH"          , substr($_SERVER['DOCUMENT_ROOT'], -1)=='/' ? str_replace(["/public"],[""], $_SERVER['DOCUMENT_ROOT']) : str_replace(["/public"],[""], $_SERVER['DOCUMENT_ROOT'])."/"),
                        define("PUBLIC_PATH"        , substr($_SERVER['DOCUMENT_ROOT'], -1)=='/' ? $_SERVER['DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT']."/"),
                        define("ROOT_URL"           , $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/"),
                        define("APP_PATH"           , "app"),
                        define("APP_TIMEZONE"       , $this->timezones('RJ')),
                        define("URL_PARAMS"         , isset($_GET['URL']) ? $_GET['URL'] : ''),

                        //Connection DB
                        define("HOST"               , "localhost"),
                        define("DB"                 , "course_pdo"),
                        define("USER"               , "root"),
                        define("PASS"               , ""),
                        define("CHARSET"            , "utf8"),
                        define("DRIVER"             , "mysql"),
                        //---------

                        //App Infor
                        define("APP_NAME"           , "Framework-ShieldForce"),
                        define("APP_HOST"           , "http://course-pdo"),
                        define("APP_MODE"           , "dev"), // dev = development | prod = production
                        define("APP_HASH"           , "3502794511571543148"),
                        //---------

                        //Directories Asset's
                        define("DIR_ASSET"           , $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/public/"),
                        define("DIR_PANEL"           , $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/public/PanelP"),
                        define("DIR_HOME"            , $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/public/HomeP"),

                        //System Routes
                        define("GET_CONTROLLER"      , $getURL->getRoute())

                        //---------
                    ];
            }
            catch (\Exception $e)
            {
                $return =
                    [
                        'code'     =>$e->getCode(),
                        'mgs'      =>$e->getMessage(),
                        'line'     =>$e->getLine(),
                        'data'     =>null,
                    ];
                echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                print_r($return);
                echo "</pre>";
            }
            return $return;
        }

        public function timezones($uf=null)
        {
           switch ($uf)
           {
               case 'GO':
               case 'AC':
                    return 'America/Rio_branco';
                    break;
               case 'AL':
               case 'SE':
                   return 'America/Maceio';
                   break;
               case 'AP':
               case 'PA':
                   return 'America/Belem';
                   break;
               case 'AM':
                   return 'America/Manaus';
                   break;
               case 'BA':
                   return 'America/Bahia';
                   break;
               case 'CE':
               case 'MA':
               case 'PB':
               case 'PI':
               case 'RN':
                   return 'America/Fortaleza';
                   break;
               case 'SP':
               case 'DF':
               case 'MG':
               case 'PR':
               case 'ES':
               case 'RJ':
               case 'RS':
               case 'SC':
                   return 'America/Sao_Paulo';
                   break;
               case 'MT':
                   return 'America/Cuiaba';
                   break;
               case 'MS':
                   return 'America/Campo_Grande';
                   break;
               case 'PE':
                   return 'America/Recife';
                   break;
               case 'RO':
                   return 'America/Porto_Velho';
                   break;
               case 'RR':
                   return 'America/Boa_Vista';
                   break;
               case 'TO':
                   return 'America/Araguaia';
                   break;
           }
           return 'America/Sao_Paulo';
        }
    }