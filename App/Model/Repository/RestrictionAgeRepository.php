<?php

namespace App\Model\Repository;

use Core\Repository\Repository;

class RestrictionAgeRepository extends Repository
{
    public function getTableName(): string
    {
        return 'restriction_age';
    }
}
