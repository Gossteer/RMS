<?php

namespace App\Components\Abstracts;

use App\Components\DataBase\Connection;
use App\Components\DataBase\DataBaseModelCollection;
use App\Components\Interfaces\iModels;
use App\Components\Interfaces\iRelationship;
use App\Components\Setting;
use App\Components\Traits\Fillable;
use App\Components\Traits\Relationship;
use Exception;

abstract class Models implements iModels, iRelationship
{
    use Fillable, Relationship;

    private ?int $id = null;

    private static function getModelForStaticClass(): string
    {
        return substr(strrchr(static::class, "\\"), 1);
    }

    public static function all(): DataBaseModelCollection
    {
        return new DataBaseModelCollection(Connection::getInstance()->getData(self::getModelForStaticClass()), static::class);
    }

    public static function equalGet($equal_field, $equal_value): DataBaseModelCollection
    {
        return new DataBaseModelCollection(Connection::getInstance()->getData(self::getModelForStaticClass(), null, null, $equal_field, $equal_value), static::class);
    }

    public function __construct($data)
    {
        $this->setFillable(Setting::getFillable($this->fillable));

        $this->set_fillable->fillable();

        if (isset($data['id'])) {
            $this->setId($data['id']);
            unset($data['id']);
        }

        $this->set_fillable->setFillable($data);
    }

    public static function find(int $id): self
    {
        $data = Connection::getInstance()->getData(self::getModelForStaticClass(), 1, $id);

        if ($data) {
            return new static($data);
        }

        throw new Exception('Данные не найдены');
    }

    public static function delete(int $id): bool
    {
        return Connection::getInstance()->deleteData(self::getModelForStaticClass(), $id);
    }

    public function destroy(): bool
    {
        if ($this->id) {
            return Connection::getInstance()->deleteData(self::getModelForStaticClass(), $this->id);
        }

        return false;
    }

    public function save(): bool
    {
        if (is_int($this->id)) {
            return Connection::getInstance()->setData(self::getModelForStaticClass(), $this->id, $this->set_fillable);
        }
        
        $this->setId(Connection::getInstance()->saveData(self::getModelForStaticClass(), $this->set_fillable));

        return is_int($this->getId());
    }

    public function update(array $data): bool
    {
        $this->set_fillable->setFillable($data);
        return $this->save();
    }

    public static function create(array $data): self
    {
        $model = new static($data);
        $model->save();

        return $model;
    }

    private function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
