<?php


    namespace App\Models;

    use SF\Classes\CRUDModel;

    /**
     * Descrição para Users
     *
     * @autor Alexandre Ferreira
     *
     */
    class Users extends CRUDModel
    {
        protected $table = 'users';

        protected $fillable =
            [
                'first_name',
                'last_name',
                'email',
                'passwprd'
            ];
    }