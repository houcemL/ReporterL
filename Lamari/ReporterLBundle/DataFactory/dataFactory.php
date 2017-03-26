<?php

/**
 * Description of dataFactory
 *
 * @author houceml
 */

namespace Lamari\ReporterLBundle\DataFactory;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class dataFactory
{

    protected $serializer;

    public function __construct(Serializer $sirializer = null, $encoders = array()) {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $norm = new ObjectNormalizer();
        $normalizers = array($norm);

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function serialise($data, $type = 'json') {
        return $this->serializer->serialize($data, $type);
    }

}
