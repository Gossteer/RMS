<?php

namespace App\Components;

/**
 * Класс Router
 * Компонент для работы с маршрутами
 */
class Router
{

    /**
     * Свойство для хранения массива роутов
     * @var array 
     */
    private array $routes;
    private $result;

    /**
     * Конструктор
     */
    public function __construct()
    {
        // Получаем роуты из констранты файла routes.php
        $this->routes = ROUTES;
    }

    /**
     * Возвращает строку запроса
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Метод для обработки запроса
     */
    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getURI();

        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определить контроллер, action, параметры

                $segments = explode('/', $internalRoute);

                //Определяем пространство имён
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = '\App\Controllers\\' . ucfirst($controllerName);

                $actionName = array_shift($segments);

                $parameters = $segments;

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;

                /* Вызываем необходимый метод ($actionName) у определенного 
                 * класса ($controllerObject) с заданными ($parameters) параметрами
                 */
                $this->result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($this->result != null) {
                    $this->showResult();

                    break;
                }
            }
        }
    }

    private function showResult()
    {
        echo $this->result;
    }
}
