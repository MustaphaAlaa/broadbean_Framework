<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcca951b2a99821964f48907987d61866
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Library\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Library\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Libraries',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcca951b2a99821964f48907987d61866::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcca951b2a99821964f48907987d61866::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
