<?php
namespace At2com\MediaBundle\Services;

class FileCore
{
    protected $document_root; // La racine du site
    protected $directory;     // Le repertoire spécifique du fichier
    protected $radical;       // Le radical du nom de fichier
    protected $extension;     // L'extension du nom de fichier
    protected $filename;      // Le nom complet du fichier
    protected $file;          // Le fichier

    private $fileContent;     // Le contenu du fichier

    public function __construct()
    {
        $this -> document_root = $_SERVER['DOCUMENT_ROOT'];
    }

    /**
     * [directory_exist Contrôle l'existence du répertoire de destination, le crée s'il n'existe pas]
     * @return [boolean] [Retourne le résultat de la fonction]
     */
    protected function directory_exist() {
        if (!file_exists($this -> getTheFilePath())) {
            return mkdir($this -> getTheFilePath(), 0777, true);
        } else {
          return true;
        }
    }

    /**
     * [getTheFilePath Retourne le chemin vers le fichier]
     * @return [string] [Le chemin d'accès au fichier]
     */
    protected function getTheFilePath()
    {
        return $this -> document_root . $this -> directory;
    }

    /**
     * [getTheFullFilePath retourne le chemin d'accès à un fichier]
     * @return [string] [La chaine du fichier]
     */
    public function getTheFullFilePath()
    {
        return $this -> document_root . $this -> directory ."/". $this -> filename;
    }

    /**
     * [setFilename Défini le radical du fichier]
     */
    public function setRadical($radical = null)
    {
        if (null === $radical) {
            $date = new \Datetime();
            $radical = $date -> format("Y-m-d_H:i:s");
            if (
                isset($this -> md5)
                && $this -> md5 == true
            ) {
                $radical = md5($radical);
            }
        }
        $this -> radical = $radical;
    }

    /**
     * [getRadical Retourne le radical du nom du fichier]
     * @return [string] [Le radical]
     */
    public function getRadical()
    {
        return $this -> radical;
    }

    public function setExtension($extension)
    {
        $this -> extension = $extension;
    }

    public function getExtension()
    {
        return $this -> extension;
    }

    public function getFilename()
    {
        return $this -> filename;
    }

    /**
     * [createFile Crée un fichier]
     * @return [resource] [Le fichier]
     */
    public function create_file()
    {
        $this -> setRadical();
        $this -> filename = $this -> getRadical() .".". $this -> extension;
        $this -> file = fopen($this -> getTheFullFilePath(), "w+");
    }

    /**
     * [closeFile Ferme le fichier]
     * @return [type] [description]
     */
    public function close_file()
    {
      fclose($this -> file);
    }

}
