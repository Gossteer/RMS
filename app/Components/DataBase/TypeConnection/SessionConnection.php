<?php

namespace App\Components\DataBase\TypeConnection;

use App\Components\Interfaces\iTypeConnection;
use Exception;

class SessionConnection implements iTypeConnection
{
    public function getData(string $modal_name, int $count = null, int $id = null, $equal_field = null, $equal_value= null): array
    {
        if ($equal_field and !is_null($equal_value)) {
            return array_filter($this->getSession($modal_name), function ($value) use($equal_value, $equal_field) {
                return $value[$equal_field] === $equal_value ? true : false;
            });
        }

        if (is_int($id)) {
            return $this->getSession($modal_name, $id);
        }

        return array_slice($this->getSession($modal_name), 0, $count, true);
    }

    public function setData(string $modal_name, int $id, array $fillable): bool
    {
        if (isset($_SESSION[$modal_name][$id])) {
            $this->setId($fillable, $id);
            $_SESSION[$modal_name][$id] = $fillable;
            return true;
        }

        return false;
    }

    public function deleteData(string $modal_name, int $id): bool
    {
        if (isset($_SESSION[$modal_name][$id])) {
            unset($_SESSION[$modal_name][$id]);
            return true;
        }

        return false;
    }

    public function saveData(string $modal_name, array $fillable): int
    {
        try {
            $data = $this->getSession($modal_name);

            array_push($data, $fillable);

            $array_key_last = array_key_last($data);
            $this->setId($data[$array_key_last], $array_key_last);
    
            $_SESSION[$modal_name] = $data;
    
            return $array_key_last;
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }
    }

    private function setId(array &$data, int $id){
        $data['id'] = $id;
    }

    private function getSession(string &$modal_name, int $id = null): array
    {
        if (is_int($id)) {
            return $_SESSION[$modal_name][$id] ?? [];
        }
        return $_SESSION[$modal_name] ?? [];
    }
}
