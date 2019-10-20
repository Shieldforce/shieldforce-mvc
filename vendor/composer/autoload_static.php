<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08f337e2c38abbce316fc8ff5bd2d048
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SF\\' => 
        array (
            0 => __DIR__ . '/..' . '/ShieldForce',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08f337e2c38abbce316fc8ff5bd2d048::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08f337e2c38abbce316fc8ff5bd2d048::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
