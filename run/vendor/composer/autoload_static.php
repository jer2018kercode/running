<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2892bd1f7098a7073c991ce72286669f
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'J\\' => 2,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'J\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2892bd1f7098a7073c991ce72286669f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2892bd1f7098a7073c991ce72286669f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
