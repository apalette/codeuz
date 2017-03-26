<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit221213b85cc21fadc7ff88af726e9b8c
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'C' => 
        array (
            'Codeuz\\' => 7,
        ),
        'A' => 
        array (
            'App\\Controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Codeuz\\' => 
        array (
            0 => __DIR__ . '/../..' . '/bootstrap',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit221213b85cc21fadc7ff88af726e9b8c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit221213b85cc21fadc7ff88af726e9b8c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}