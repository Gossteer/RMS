<?php

namespace App\Components;

use App\Components\Abstracts\Request;

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
        unset($this->routes['']);
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

        //TODO: Сделать красиво. Паттерн '' определяется для любого маршрута
        if ($uri === '') {
            return $this->route('', ROUTES[''], $uri);
        }
        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {
                return $this->route($uriPattern, $path, $uri);
            }
        }
    }

    private function showResult()
    {
        echo $this->result;
    }

    private function route(string $uriPattern, string $path, string $uri): bool
    {
        // Получаем внутренний путь из внешнего согласно правилу.
        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

        // Определить контроллер, action, параметры

        $segments = explode('/', $internalRoute);

        //Определяем пространство имён
        $controllerName = array_shift($segments) . 'Controller';
        $controllerName = '\App\Controllers\\' . ucfirst($controllerName);

        $actionName = explode('?', array_shift($segments))[0];

        $parameters = $segments;

        // Создать объект, вызвать метод (т.е. action)
        $controllerObject = new $controllerName;

        /* Вызываем необходимый метод ($actionName) у определенного 
         * класса ($controllerObject) с заданными ($parameters) параметрами
         */
        $this->result = $controllerObject->$actionName($this->getRequest($parameters, $_GET, $_POST));

        // Если метод контроллера успешно вызван, завершаем работу роутера
        if ($this->result != null) {
            $this->showResult();

            return true;
        }

        return false;
    }

    private function getRequest(array $parameters = [], array $get = [], array $post = []): Request
    {
        return Setting::getRequest([
            'get' => $get,
            'post' => $post,
            'parameters' => $parameters
        ]);
    }
}
