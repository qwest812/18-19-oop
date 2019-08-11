<?php
final class BaseClass {
    public function test() {
        echo "Вызван метод BaseClass::test()\n";
    }

    // В данном случае неважно, укажете ли вы этот метод как final или нет
    final public function moreTesting() {
        echo "BaseClass::moreTesting() called\n";
    }
}

//class ChildClass extends BaseClass {
//}