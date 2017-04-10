<?php

/*
 *
 */

namespace Lamari\ReporterLBundle\Meta;

/**
 *
 * @author houceml
 */
interface metaStructureInterface 
{
    public function getmetaDescription();
    public function alterDescription();
    public function flushDescriptionReporter();
}
