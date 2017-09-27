<?php
// src/At2com/MediaBundle/Services/CsvFile.php

namespace At2com\MediaBundle\Services;

use At2com\MediaBundle\Services\FileCore;

class CsvFile extends FileCore
{
    protected $directory = "/downloads/csv";
    protected $extension = "csv";
    protected $fileHeaders;

    /**
     * [__construct contruction du fichier CSV]
     * @param array $headers [Les entêtes du fichier]
     * @param array $data [Les données du fichier]
     * @param bool $md5 [Détermine s'il faudra utiliser la fonction MD5 pour créer le nom du fichier]
     */
    public function __construct(Array $headers = array(), Array $data = array(), Bool $md5 = true )
    {
        $this -> document_root = $_SERVER['DOCUMENT_ROOT'];
        $this -> headers = $headers;
        $this -> content = $data;
        $this -> md5 = $md5;

        $this -> directory_exist();
        $this -> create_file();
        $this -> write_file();
        $this -> close_file();
    }

    protected function write_file()
    {
        fprintf($this -> file, chr(0xEF).chr(0xBB).chr(0xBF));  // Compatibilité avec excel

        $this -> write_file_row($this -> headers);              // Ecriture des entêtes

        $this -> write_file_content();                          // Ecriture des données
    }

    private function write_file_row($row)
    {
        fputcsv($this -> file, $row, ';');
    }

    private function write_file_content()
    {
        foreach ($this -> content as $key => $row) {
            fputcsv($this -> file, $row, ';');
        }
    }
}
