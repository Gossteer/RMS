<?php

namespace App\Components\Traits;

use App\Components\Abstracts\Models;
use App\Components\DataBase\DataBaseModelCollection;
use Exception;

trait Relationship
{
    protected array $relationship = [];
    private static array $with = [];

    //Определяет связи которые нам необходимо достать из источника данных
    public static function with(string ...$with)
    {
        $model = new static([]);
        $model->setWith(...$with);
        
        return $model;
    }

    public function setWith(string ...$with)
    {
        //TODO:Сделать проверку на существование данной связи в модели
        self::$with = $with;
    }

    private static function withExist(): ?array
    {
        return (count(self::$with) > 0 ? self::$with : null);
    }

    private function getModelName(string &$name_relationship): string
    {
        return 'App\Models\\' . $name_relationship;
    }

    private function checkExistsInModelRelationship(string $function_name, string &$name_relationship): bool
    {
        return (bool) (isset($this->relationship[$function_name]) and in_array($name_relationship, $this->relationship[$function_name], true));
    }

    public function oneToOne(string $name_relationship): Models
    {
        if ($this->checkExistsInModelRelationship(__FUNCTION__, $name_relationship)) {

            $model = $this->getModelName($name_relationship);

            return $model::find($this->set_fillable->{strtolower($name_relationship) . '_id'});
        }

        $this->getErrorNoExistRelationship();
    }

    public function oneToOneMain(string $name_relationship): DataBaseModelCollection
    {
        if ($this->checkExistsInModelRelationship(__FUNCTION__, $name_relationship)) {

            $model = $this->getModelName($name_relationship);

            return $model::equalGet((strtolower(substr(strrchr(static::class, "\\"), 1)) . '_id'), $this->getId())->first();
        }

        $this->getErrorNoExistRelationship();
    }

    public function manyToOne(string $name_relationship): Models
    {
        
        if ($this->checkExistsInModelRelationship(__FUNCTION__, $name_relationship)) {

            $model = $this->getModelName($name_relationship);
            
            return $model::find($this->set_fillable->{strtolower($name_relationship) . '_id'});
        }

        $this->getErrorNoExistRelationship();
    }

    public function oneToMany(string $name_relationship): DataBaseModelCollection
    {
        if ($this->checkExistsInModelRelationship(__FUNCTION__, $name_relationship)) {

            $model = $this->getModelName($name_relationship);

            return $model::equalGet((strtolower(substr(strrchr(static::class, "\\"), 1)) . '_id'), $this->getId());
        }

        $this->getErrorNoExistRelationship();
    }

    private function getErrorNoExistRelationship()
    {
        throw new Exception('Даннная связь не зарегистрирована');
    }
}
