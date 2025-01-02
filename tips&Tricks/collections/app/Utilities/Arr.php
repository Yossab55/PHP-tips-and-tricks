<?php
namespace App\Utilities;

class Arr 
{
  public static function flatten($array, $depth = 256) {
    $result = [];
    foreach($array as $item) {
      $item = $item instanceof Collection ? $item->all() : $item;

      if(!is_array($item)) {
        $result[] = $item;
      } else {
        $values = $depth === 1 ? $item: static::flatten($item, $depth - 1);
        foreach($values as $value) {
          $result[] = $value;
        }
      }
    }
    return $result;
  }
}