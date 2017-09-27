<?php
// src/At2com/MediaBundle/Services/DocumentFile.php

namespace At2com\MediaBundle\Services;

use At2com\MediaBundle\Services\FileCore;

class DocumentFile extends FileCore
{
    protected $directory = "/uploads/documents";

    public function __construct()
    {
        
    }
}
