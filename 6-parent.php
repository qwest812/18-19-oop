<?php
class A{
    function  test (){
        echo __CLASS__;
    }
}


class B extends A{
    function example(){
        parent::test();
    }
}

$f=new  B();

$f->example();