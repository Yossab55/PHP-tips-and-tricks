<?php

// in js if you want to destruct array ...[1,3,8,2]
// in php older virgen
$list = [1, 2, 3];
[$one, $two] = $list;

echo '<pre>';
var_dump($one, $two);
echo '</pre>';
//what if you want to skip a number
[$one, , $three] = $list;
echo '<pre>';
var_dump($one, $three);
echo '</pre>';
//! in key array
$user = [
  "name" => "yossab",
  "age" => 20,
  "gender" => 'M'
];
['name' => $name, "gender" => $gender] = $user;
echo '<pre>';
var_dump($name, $gender);
echo '</pre>';
//* ex:

$url = ['host' => $host, "query" => $query] = parse_url("https://youtube.com?q=123");
echo '<pre>';
var_dump($url, $query);
echo '</pre>';
//? what if there is no query
$defaults = [
  'query' => null
];
$url = ['host' => $host, "query" => $query] = parse_url("https://youtube.com") + $defaults;
echo '<pre>';
var_dump($url, $query);
echo '</pre>';