<?php

use App\Utilities\Zipper;
// //* php has a zipper class to deal with zip called ZipArchive();
// $zip = new ZipArchive();
// $zip->open('downloadable.zip');
// $zip->addFile('.gitignore');
// $zip->close();
//!but we want to wrap it with class
require_once "vendor/autoload.php";

$zipper = new Zipper();
$zipper->createOrModify("downloadable.zip")
->addFiles(['test1.txt', 'text2.txt'])
->addDirectories('playground')->addFiles('.gitignore');
echo $zipper->count();
echo count($zipper);
$zipper->close();