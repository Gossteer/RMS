<?php

namespace App\Components\DataBase;

use App\Components\Abstracts\Collection;

class DataBaseModelCollection extends Collection {
    
    public function delete(int $id): bool
    {
        parent::delete($id);

        return Connection::getInstance()->deleteData(substr(strrchr($this->model_name, "\\"), 1), $id);
    }
}