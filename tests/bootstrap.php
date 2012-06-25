<?php
require_once __DIR__.'/../vendor/classloader/Symfony/Component/ClassLoader/UniversalClassLoader.php';
use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'ProductFeedAdapter'          => array(__DIR__.'/../src', __DIR__)
));

$loader->register();