<?php

/*
 *
 */

namespace Lamari\ReporterLBundle\Meta;

/**
 *
 * @author houceml
 */
interface metaDescriptionInterface 
{
    public function getmetaDescription();
    public function alterDescription();
    public function flushDescriptionReporter();
}
