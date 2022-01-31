<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7f390644c5bda02cd4651e8948dba22f
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Razorpay\\Tests\\' => 15,
            'Razorpay\\Api\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Razorpay\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/razorpay/razorpay/tests',
        ),
        'Razorpay\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/razorpay/razorpay/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Requests' => 
            array (
                0 => __DIR__ . '/..' . '/rmccue/requests/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7f390644c5bda02cd4651e8948dba22f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7f390644c5bda02cd4651e8948dba22f::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7f390644c5bda02cd4651e8948dba22f::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit7f390644c5bda02cd4651e8948dba22f::$classMap;

        }, null, ClassLoader::class);
    }
}
