<?php
class Foo {
    public static function aStaticMethod() {
       echo  __CLASS__;
    }
}

Foo::aStaticMethod();
$classname = 'Foo';
$classname::aStaticMethod(); // Начиная с PHP 5.3.0