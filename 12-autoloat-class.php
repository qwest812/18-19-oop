<?php
//Сначала убедимся, что в стеке автозагрузки не зарегистрировано ниодной функции
var_dump(spl_autoload_functions());

//функция автозагруки, загружающая классы из папки classes:
function loadFromClasses($aClassName) {
    $aClassFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '18-19-oop-2' . DIRECTORY_SEPARATOR . 'class'. DIRECTORY_SEPARATOR . $aClassName . '.php';
    echo "<pre>";
    var_dump($aClassFilePath);
    echo "</pre>";
//    var_dump($aClassFilePath);
    if (file_exists($aClassFilePath)) {
        echo "<p>executing __aturoload() with aClassName = {$aClassName}</p>";
        require_once $aClassFilePath;
        return true;
    }
    return false;
}

//функция автозагруки, загружающая классы из папки libs:
function loadFromLibs($aClassName) {
    $aClassFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . $aClassName . '.php';
    if (file_exists($aClassFilePath)) {
        echo "<p>executing __aturoload() with aClassName = {$aClassName}</p>";
        require_once $aClassFilePath;
        return true;
    }
    return false;
}

//регистрируем обе функции автозагрузки
spl_autoload_register('loadFromClasses');
spl_autoload_register('loadFromLibs');

//Проверим, что в стеке функций автозагрузки присутствуют две функции:
var_dump(spl_autoload_functions());

$object1 = new FirstClass();
$object1->test();
$object2 = new MyClass3();

//удалим первую функцию автозагрузки
spl_autoload_unregister('loadFromClasses');

//В стеке должна остаться одна функция:
var_dump(spl_autoload_functions());

$object3 = new MyClass2(); //здесь будет ошибка

//set_include_path(get_include_path().PATH_SEPARATOR.'path/to/my/directory/');
//spl_autoload_extensions('.php, .inc');
//spl_autoload_register();



//spl_autoload_call — принудительно загружает класс по его имени, используя все доступные в системе автозагрузчики;
//spl_autoload_extensions — возвращает/модифицирует расширения файлов, из которых происходит загрузка неинициализированных классов;
//spl_autoload_functions — возвращает список всех зарегистрированных автозагрузчиков в системе;
//spl_autoload_register — регистрация собственного автозагрузчика в стеке автозагрузки;
//spl_autoload_unregister — удаление автозагрузчика из стека автозагрузки;
//spl_autoload — основная функция автоматической загрузки классов. Именно она вызывается при обращении к классу, который еще не инициализирован. Данная функция активирует все автоматические загрузчики из стека в порядке их добавления.