<?php

namespace App\Utilities;



class Collection implements \IteratorAggregate, \Countable
{
  protected $items = [];
  public function __construct($items)
  {
    $this->add($items);
  }
  public function getIterator(): \Traversable
  {
    return new \ArrayIterator($this->items);
  }
  public function add($items) 
  {
    if(array_keys($items)) {
      foreach(array_keys($items) as $key) {
        $this->items[$key] = $items[$key]; 
      }
    } else {
      array_push($this->items, $items);
    }
  }
  public function put($key, $value) 
  {
    $this->items[$key] = $value;
  }
  public function all() {
    return $this->items;
  }
  public function first()
  {
    return reset($this->items);
  }
  public function last()
  {
    return end($this->items);
  }
  public function flip()
  {
    //! like this it won't work with objects
    return array_flip($this->items);
  }
  public function merge($items)
  {
    // if there is duplication it will add the with different index element
    return array_merge($this->items, $items);
  }
  public function merge_recursive($items) {
    //Instead of override the keys, the array_merge_recursive() function makes the value as an array.
    return array_merge_recursive($this->items, $items);
  }
  public function union($items)
  {
    // if there is duplication will add one copy of it
    return $this->items + $items;
  }
  public function combine($values)
  {
    return array_combine($this->items, $values);
  }
  public function count() :int 
  {
    return count($this->items);
  }
  public function contains($key) 
  {
    $keys = array_keys($this->items);

    return in_array($key, $keys);
  }
  public function only($keys) 
  {
    if(is_string($keys)) {
      if($this->contains($keys)) return $this->items[$keys];
    } // else if(is_array($keys)) {
    //   $result = [];
    //   foreach($keys as $key) {
    //     if($this->contains($key)) 
    //       $result[$key] = $this->items[$key];
    //   }
    //   return $result;
    // }
    //!or 
    if(is_array($keys)) {
      return array_intersect_key($this->items, array_flip($keys));
    }
    return false;
  }

  public function except($keys) 
  {
    $original = $this->items;
  
    if(is_string($keys)) {
      unset($original[$keys]);
    }
  
    if(is_array($keys)) {
      foreach($keys as $key)
          unset($original[$key]);
      }
    return $original;
  }
  public function flatten() 
  {
    return Arr::flatten($this->items);
  }
  public function map(callable $call) 
  {
    return array_map($call, $this->items);
  }
  public function filter(callable $call)
  {
    return array_filter($this->items, $call);
  }
}