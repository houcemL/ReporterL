<?php
echo __LINE__.'<pre/>' ;
use \Doctrine\Common\Annotations\AnnotationRegistry;echo __LINE__;
use \Composer\Autoload\ClassLoader;echo __LINE__;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';echo __LINE__;
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));echo __LINE__;

include_once __DIR__ .'/../vendor/autoload.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use \Lamari\ReporterLBundle\DataFactory\dataFactory;



$factory = new dataFactory();
class Person
{
    private $age;
    private $name;
    private $sportsman;

    // Getters
    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    // Issers
    public function isSportsman()
    {
        return $this->sportsman;
    }

    // Setters
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setSportsman($sportsman)
    {
        $this->sportsman = $sportsman;
    }
}
$person = new Person();
$person->setName('foo');
$person->setAge(99);
$person->setSportsman(false);
$json = $factory->serialise($person, 'json');
echo $json;