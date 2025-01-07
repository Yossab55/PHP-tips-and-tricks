<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit858240cd22303d4a196934272b1712f5
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit858240cd22303d4a196934272b1712f5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit858240cd22303d4a196934272b1712f5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit858240cd22303d4a196934272b1712f5::$classMap;

        }, null, ClassLoader::class);
    }
}
