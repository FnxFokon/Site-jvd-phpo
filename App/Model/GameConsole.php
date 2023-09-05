<?php

namespace App\Model;

use App\Model\Jeu;
use Core\Model\Model;
use App\Model\Console;

class GameConsole extends Model
{
    public int $console_id;
    public int $jeu_id;

    // Propriété associatives
    // Relation entre les tables dans la BDD
    public ?Console $console;
    public ?Jeu $jeu;
}
