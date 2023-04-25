<?php

namespace Core\Request;

interface ArrayAccess {}

class Session implements ArrayAccess{

public $name;
private $session = array();

public function __construct($name,$value){
   $this-> $_SESSION['$name'] = $value ;
}

public function __get($name){
    return $_SESSION['$name'] ;
}

public function __isset($name){
    return isset($_SESSION['$name']);
}

public function __unset($name){
    unset($_SESSION['$name']);
}

public function offsetExists(mixed $offset): bool{
    return isset($this->session[$offset]);
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

echo "test-session";
