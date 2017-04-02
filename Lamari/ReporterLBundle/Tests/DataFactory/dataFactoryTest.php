<?php

/**
 * Description of dataFactory
 *
 * @author houceml
 */

namespace Lamari\ReporterLBundle\Tests\DataFactory;

use Lamari\ReporterLBundle\DataFactory\dataFactory;
use PHPUnit\Framework\TestCase;

class dataFactoryTest extends TestCase
{
    protected $factory;
    
    public function setUp() {
        $this->factory = new dataFactory();
    }

    /**
     * @dataProvider serializeProvider
     */
    public function testserialize($data, $format, $expected) {
        $formatedData = $this->factory->serialize($data, $format);
        $this->assertEquals($formatedData, $expected);
    }

    public function serializeProvider() {
        return [
            [['name' => 'foo', 'age' => 99, 'sportsman' => false], 'json', '{"name":"foo","age":99,"sportsman":false}']
        ];
    }

}
