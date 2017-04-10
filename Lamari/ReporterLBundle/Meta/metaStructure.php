<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lamari\ReporterLBundle\Meta;

/**
 * Description of metaStructure
 *
 * @author houceml
 */
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Lamari\ReporterLBundle\Meta\metaStructureInterface;

class metaStructure implements metaStructureInterface
{

    protected $_schema = array();
    protected $_sm;

    public function __construct(AbstractSchemaManager $sm) {
        $this->_sm = $sm;
    }

    public function getmetaDescription() {
        /*
         * if the schema is empty
         */
        if (empty($this->_schema)) {
            $tables = $this->_sm->listTables();

            foreach ($tables as $t) {
                //foreign keys of the table
                $foreignKeys = array();
                foreach ($t->getForeignKeys() as $key => $value) {
                    $foreignKeys[$key] = array(
                        'attachedTo' => $value->getForeignTableName(),
                        'columns' => $value->getForeignColumns()
                    );
                }
                $this->_schema[$t->getName()] = array(
                    'columns' => $t->getColumns(),
                    'index' => $t->getIndexes(),
                    'attachedTo' => $foreignKeys
                );
            }
        }
        return $this->_schema;
    }

    public function alterDescription() {
        
    }

    public function flushDescriptionReporter() {
        
    }

}
