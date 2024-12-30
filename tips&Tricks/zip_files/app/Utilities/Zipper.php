<?php
namespace App\Utilities;

use ZipArchive;
use Countable;
class Zipper implements Countable 
{
  protected $zipper;

  public function __construct() {
    $this->zipper = new ZipArchive;
  }
  public function createOrModify(string $filename) 
  {
    //!You could do best
    // if(file_exists($filename)) {
    //   $this->zipper->open($filename, ZipArchive::OVERWRITE);
    // } else {
    //   $this->zipper->open($filename, ZipArchive::CREATE);
    // }
    //* this tells php to create file if not exists or overwrite it if it's there 
    // if you don't put | ZipArchive::OVERWRITE and file exists it throws error
    $this->zipper->open($filename, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    //@ return $this will assure you to make chain
    return $this;
  }
  public function addDirectories(array|string $directories) 
  {
    //* (/*) to add everything in directory;
    //addGlob give it a pattern and will search for this pattern (regex)
    if(is_iterable($directories)) {
      array_map(fn ($directory) => $this->zipper->addGlob($directory . '/*'), $directories);
    } else {
      $this->zipper->addGlob($directories . '/*');
    }
    return $this;
  }
  public function addFiles(iterable|String $filename) 
  {
    if(is_iterable($filename)) {
      foreach($filename as $file) $this->zipper->addFile($file);
    } else {
      $this->zipper->addFile($filename);
    }
    return $this;
  }
  public function close() 
  {
    $this->zipper->close();
  }
  public function count() : int
  {
    //! use count before close()
    return $this->zipper->count();
  }
}