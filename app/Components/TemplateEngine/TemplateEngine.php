<?php

namespace App\Components\TemplateEngine;

use App\Components\Interfaces\iTypeTemplateEngine;
use App\Components\Setting;

class TemplateEngine {
    /**
     * Объект одиночки храниться в статичном поле класса. Это поле — массив, так
     * как мы позволим нашему Одиночке иметь подклассы. Все элементы этого
     * массива будут экземплярами кокретных подклассов Одиночки. Не волнуйтесь,
     * мы вот-вот познакомимся с тем, как это работает.
     */
    private static TemplateEngine $template_engine;
    private iTypeTemplateEngine $type_template_engine;

    /**
     * Конструктор Одиночки всегда должен быть скрытым, чтобы предотвратить
     * создание объекта через оператор new.
     */
    protected final function __construct()
    {
        
    }

    /**
     * Одиночки не должны быть клонируемыми.
     */
    protected function __clone()
    {
        throw new \Exception("Cannot clone a Connection.");
    }

    /**
     * Одиночки не должны быть восстанавливаемыми из строк.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a Connection.");
    }

    /**
     * Это статический метод, управляющий доступом к экземпляру одиночки. При
     * первом запуске, он создаёт экземпляр одиночки и помещает его в
     * статическое поле. При последующих запусках, он возвращает клиенту объект,
     * хранящийся в статическом поле.
     *
     */
    public static function getInstance(): TemplateEngine
    {
        if (!isset(self::$template_engine)) {
            (self::$template_engine = new static())->setSetting();
        }

        return self::$template_engine;
    }

    //Выбираем с каким типом шаблонизатором мы будем работать
    private function setSetting()
    {
        $this->type_template_engine = Setting::getTypeTemplateEngine();
    }

    //рендерим представление
    public function render(string $fille, array $attributes = []): string
    {
        return $this->type_template_engine->render($fille, $attributes);
    }
}