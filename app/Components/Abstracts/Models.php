<?php

namespace App\Components\Abstracts;

use App\Components\DataBase\Connection;
use App\Components\DataBase\DataBaseModelCollection;
use App\Components\Interfaces\iFillable;
use App\Components\Interfaces\iModels;
use App\Components\Interfaces\iRelationship;
use App\Components\Traits\Fillable;
use App\Components\Traits\Relationship;
use Exception;

abstract class Models implements iModels, iFillable, iRelationship
{
    use Fillable, Relationship;

    private ?int $id = null;

    public static function all(): DataBaseModelCollection
    {
        $model_name = static::class;

        return new DataBaseModelCollection(Connection::getInstance()->getData(substr(strrchr($model_name, "\\"), 1)), $model_name);
    }

    public static function equalGet($equal_field, $equal_value): DataBaseModelCollection
    {
        $model_name = static::class;

        return new DataBaseModelCollection(Connection::getInstance()->getData(substr(strrchr($model_name, "\\"), 1), null, null, $equal_field, $equal_value), $model_name);
    }

    public function __construct(array $data = [])
    {
        $this->fillable();

        if (isset($data['id'])) {
            $this->setId($data['id']);
            unset($data['id']);
        }

        $this->setFillable($data);
    }

    public static function find(int $id): self
    {
        $data = Connection::getInstance()->getData(substr(strrchr(static::class, "\\"), 1), 1, $id);

        if ($data) {
            return new static($data);
        }

        throw new Exception('Данные не найдены');
    }

    public static function delete(int $id): bool
    {
        return Connection::getInstance()->deleteData(substr(strrchr(static::class, "\\"), 1), $id);
    }

    public function destroy(): bool
    {
        if ($this->id) {
            return Connection::getInstance()->deleteData(substr(strrchr(static::class, "\\"), 1), $this->id);
        }

        return false;
    }

    public function save(): bool
    {
        if (is_int($this->id)) {
            return Connection::getInstance()->setData(substr(strrchr(static::class, "\\"), 1), $this->id, $this->fillable);
        }
        
        $this->setId(Connection::getInstance()->saveData(substr(strrchr(static::class, "\\"), 1), $this->fillable));

        return is_int($this->getId());
    }

    public function update(array $data): bool
    {
        $this->setFillable($data);
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
