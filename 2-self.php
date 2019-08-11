<?php
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who(); // Здесь действует позднее статическое связывание
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();