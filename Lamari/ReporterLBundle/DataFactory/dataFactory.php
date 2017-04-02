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
use Lamari\ReporterLBundle\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class dataFactory
{

    protected $serializer;

    public function __construct(Serializer $serializer = null, $encoders = array()) {
        
        if (!is_null($serializer) and ( !$this->supportsDecoding('json')
                or ! $this->supportsDecoding('xml')
                or ! $this->supportsDecoding('csv'))) {

            $encoders = array(new XmlEncoder(), new JsonEncoder(), new CsvEncoder());

            $norm = new ObjectNormalizer();
            $normalizers = array($norm);
            $this->serializer = new Serializer($normalizers, $encoders);
            
        } else {            
            $this->serializer = $serializer;        
        }
        
    }

    public function serialise($data, $type = 'json') {
        return $this->serializer->serialize($data, $type);
    }

}
