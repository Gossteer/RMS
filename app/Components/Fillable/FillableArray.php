<?php

namespace App\Components\Fillable;

use App\Components\Abstracts\Fillable;

class FillableArray extends Fillable {
    
    protected array $fillable = [];

    //Переворачиваем местами значения с ключами и очищаем от ненужных данных (бывшие ключи)
    public final function fillable(): void
    {
        $this->fillable = array_flip($this->fillable);

        $this->fillable = array_map(function ($value) {
            $value = null;
        }, $this->fillable);
    }

    public function __construct(?array $fillable) {
        $this->fillable = $fillable;
    }

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->fillable)) {
            return $this->fillable[$name];
        }

        $this->showErrorFillable($name);
        return false;
    }

    public function __set(string $name, $value): bool
    {
        if (array_key_exists($name, $this->fillable)) {
            return (bool) $this->fillable[$name] = $value;
        }

        $this->showErrorFillable($name);
        return false;
    }

    private function showErrorFillable(string $name): void
    {
        $trace = debug_backtrace();
        trigger_error(
            'Неопределённое свойство: ' . $name .
                ' в файле ' . $trace[0]['file'] .
                ' на строке ' . $trace[0]['line'],
            E_USER_NOTICE
        );
    }

    public function setFillable($data): bool
    {
        if (is_array($data)) {
            if ($this->checkData($data) and $data) {
                foreach ($data as $key => $value) {
                    $this->fillable[$key] = $value;
                }
    
                return true;
            }
    
            return false;
        }

        $this->errorSetFillableType('array');
    }

    public function toArray(): array
    {
        return $this->fillable;
    }

    protected function checkData(array &$data): bool
    {
        foreach ($data as $key => $value) {
            if (!array_key_exists($key, $this->fillable)) {
                print_r('Данное свойство не зарегистрировано в моделe');
                return false;
            }
        }

        return true;
    }
}