<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf42d7712f28c505cf9da9748fb701914
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vendor\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vendor\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf42d7712f28c505cf9da9748fb701914::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf42d7712f28c505cf9da9748fb701914::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
