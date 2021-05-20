<?php

namespace App\Components\DataBase;

use App\Components\Abstracts\Fillable;
use App\Components\Interfaces\iTypeConnection;
use App\Components\Setting;

class Connection implements iTypeConnection
{
    /**
     * Объект одиночки храниться в статичном поле класса. Это поле — массив, так
     * как мы позволим нашему Одиночке иметь подклассы. Все элементы этого
     * массива будут экземплярами кокретных подклассов Одиночки. Не волнуйтесь,
     * мы вот-вот познакомимся с тем, как это работает.
     */
    private static Connection $connection;
    private iTypeConnection $typeconnection;

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
    public static function getInstance(): Connection
    {
        if (!isset(self::$connection)) {
            (self::$connection = new static())->setSetting();
        }

        return self::$connection;
    }

    //Выбираем с каким типом подключения к данным мы будем работать
    private function setSetting()
    {
        $this->typeconnection = Setting::getTypeConnection();
    }

    //Есть $count = null, то вытаскиваем все данные
    public function getData(string $modal_name, int $count = null, int $id = null, $equal_field = null, $equal_value= null): Fillable
    {
        return $this->typeconnection->getData($modal_name, $count, $id, $equal_field, $equal_value);
    }
    
    public function setData(string $modal_name, int $id, Fillable $fillable): bool
    {
        return $this->typeconnection->setData($modal_name, $id, $fillable);
    }
    
    public function deleteData(string $modal_name, int $id): bool
    {
        return $this->typeconnection->deleteData($modal_name, $id);
    }

    public function saveData(string $modal_name, Fillable $fillable): int
    {
        return $this->typeconnection->saveData($modal_name, $fillable);
    }
}
