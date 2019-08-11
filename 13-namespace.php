<?php
namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo() {}
class foo
{
    static function staticmethod() {}
}

/* Неполные имена */
foo(); // определяется как функция Foo\Bar\foo
foo::staticmethod(); // определяется как класс Foo\Bar\foo с методом staticmethod
echo FOO; // определяется как константа Foo\Bar\FOO

/* Полные имена */
subnamespace\foo(); // определяется как функция Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // определяется как класс Foo\Bar\subnamespace\foo
// c методом staticmethod
echo subnamespace\FOO; // определяется как константа Foo\Bar\subnamespace\FOO

/* Абсолютные имена */
\Foo\Bar\foo(); // определяется как функция Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // определяется как класс Foo\Bar\foo с методом staticmethod
echo \Foo\Bar\FOO; // определяется как константа Foo\Bar\FOO


//Доступ к глобальным классам, функциям и константам из пространства имен
$a = \strlen('hi'); // вызывает глобальную функцию strlen
$b = \INI_ALL; // получает доступ к глобальной константе INI_ALL
$c = new \Exception('error'); // Создает экземпляр глобального класса Exception