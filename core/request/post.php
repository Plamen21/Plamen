<?php

namespace Core\Request;
interface ArrayAccess{};

class Post implements ArrayAccess{

    public $name;
    private $post = array();

    public function __construct($name,$value){
       $this-> $_POST['$name'] = $value ;
    }

    public function __get($name){
        return $_POST['$name'] ;
    }

    public function __isset($name){
        return isset($_POST['$name']);
    }

    public function __unset($name){
        unset($_POST['$name']);
    }

    public function offsetExists(mixed $offset): bool{
        return isset($this->post[$offset]);
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
echo "test - post";

