<?php

//automation means something is usually happens and it's boor to do it 
// so we make a file that's make it by itself without a human doing a thing
// let's give an example:

$file = realpath(dirname(__FILE__)). "/log/log.txt";
if(is_file($file)) {
  $file_handler = fopen($file, "a+");
  fputs($file_handler, "Hey it's now: " . date("y-m-d h:i:s") . PHP_EOL);
}
// now it's a file 
//? who to run
//!in linux or OR based of linux it's crontab
//!in windows it's schtasks