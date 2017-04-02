<?php

/**
 * Description of dataFactory
 *
 * @author houceml
 */

namespace Lamari\ReporterLBundle\Tests\DataFactory;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class dataFactoryTest
{
    public function __construct(Serializer $sirializer, $encoders = array()) {
        $this->srializer = $sirializer;
               
    }

    public function serialise($data, $type = 'json') {
        $this->serializer->serialize($data, $type);
    }
}
