<?php

namespace Core\Request;

interface ArrayAccess {};

class Get implements ArrayAccess{

public $name;
private $get = array();

public function __construct($name,$value){
   $this-> $_GET['$name'] = $value ;
}

public function __get($name){
    return $_GET['$name'] ;
}

public function __isset($name){
    return isset($_GET['$name']);
}

public function __unset($name){
    unset($_GET['$name']);
}

public function offsetExists(mixed $offset): bool{
    return isset($this->get[$offset]);
}

public function offsetSet(mixed $offset, mixed $value): void{
    $this->__isset($offset,$value);
}

public function offsetGet(mixed $offset): mixed{
    $this ->__get($offset);
}

public function offsetUnset(mixed $offset): void{
    $this ->__unset($offset);
}
}