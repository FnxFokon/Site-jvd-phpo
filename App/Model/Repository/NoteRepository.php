<?php

namespace App\Model\Repository;

use Core\Repository\Repository;

class NoteRepository extends Repository
{
    public function getTableName(): string
    {
        return 'note';
    }
}
