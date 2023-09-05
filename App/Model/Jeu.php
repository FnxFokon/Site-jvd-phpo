<?php

namespace App\Model;

use App\Model\Note;
use Core\Model\Model;
use App\Model\RestrictionAge;

class Jeu extends Model
{
    public string $titre;
    public string $description;
    public int $prix;
    public string $date_sortie;
    public string $image_path;
    public int $note_id;
    public int $age_id;

    // Propriété associatives
    // Relation entre les tables dans la BDD
    public ?Note $note;
    public ?RestrictionAge $age;
}
