<?php

//how to make collection in php
// add every object in a collection = array
require_once "vendor/autoload.php";

use App\Utilities\Collection;
use App\User;

// $collection = new  Collection (
//   ["yossab" => new User("yossab Samouel", 20, "student"),
//   "samouel" => new User("Samouel Gohar", 51, "graduated"),
//   "hany" => new User("hany mahrous", 22, "fresh graduated")
//   ]
// );
$collection = new Collection([1, 2, 3]);
echo '<pre>';
var_dump($collection->filter(function ($item) {
  return $item > 1;
}));
echo '</pre>';