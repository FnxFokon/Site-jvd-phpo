<?php

namespace App\Model\Repository;

use App\Model\Jeu;
use App\Model\Note;
use App\Model\RestrictionAge;
use Core\Repository\Repository;
use Core\Repository\AppRepoManager;

class JeuRepository extends Repository
{
    public function getTableName(): string
    {
        return 'jeu';
    }

    public function findAll()
    {
        return $this->readAll(Jeu::class);
    }

    // Function sans arguments mais avec plusieurs élément (tableau)
    public function getAllGamesWithAgeAndNote(): ?array
    {
        // On crée la requete
        $q = sprintf(
            'SELECT 
            %1$s.*,
            %2$s.note_media,
            %2$s.note_utilisateur,
            %3$s.label,
            %3$s.image_path as img_pegi
            FROM %1$s
            INNER JOIN %2$s
            ON %1$s.note_id = %2$s.id
            INNER JOIN %3$s
            ON %1$s.age_id = %3$s.id',
            $this->getTableName(), // %1$s
            AppRepoManager::getRm()->getNoteRepository()->getTableName(), // %2$s
            AppRepoManager::getRm()->getRestrictionAgeRepository()->getTableName() // %3$s
        );

        $arr_result = [];

        // On execute la requete
        $stmt = $this->pdo->query($q);

        // Si la requete n'est pas valide on retourne le tableau vide
        if (!$stmt) return $arr_result;

        // On boucle sur les données de la requete
        while ($row_data = $stmt->fetch()) {
            // On stock dans $arr_result un nouvel objet de la classe $class_name
            $jeu = new Jeu($row_data);

            // On reconstruit un tableau de donnée pour Note
            $data_note = [
                'id' => $row_data['note_id'],
                'note_media' => $row_data['note_media'],
                'note_utilisateur' => $row_data['note_utilisateur']
            ];

            // On instancie l'objet Note
            $note = new Note($data_note);

            $data_age = [
                'id' => $row_data['age_id'],
                'label' => $row_data['label'],
                'image_path' => $row_data['img_pegi']
            ];

            // On instancie l'objet RestrictionAge
            $age = new RestrictionAge($data_age);

            // On hydrate les valeur note et age avec les instance de note et age
            $jeu->note = $note;
            $jeu->age = $age;

            $arr_result[] = $jeu;
        }

        // On retourne le tableau
        return $arr_result;
    }

    // Function avec arguments mais un seul élément
    public function getAllGamesWithAgeAndNoteById(int $id)
    {
        $q = sprintf(
            'SELECT 
            %1$s.*,
            %2$s.note_media,
            %2$s.note_utilisateur,
            %3$s.label,
            %3$s.image_path as img_pegi
            FROM %1$s
            INNER JOIN %2$s
            ON %1$s.note_id = %2$s.id
            INNER JOIN %3$s
            ON %1$s.age_id = %3$s.id
            WHERE %1$s.id= :id',
            $this->getTableName(), // %1$s
            AppRepoManager::getRm()->getNoteRepository()->getTableName(), // %2$s
            AppRepoManager::getRm()->getRestrictionAgeRepository()->getTableName() // %3$s
        );

        // On prépare la requete
        $stmt = $this->pdo->prepare($q);

        // On vérifie que la requete est bien préparé
        if (!$stmt) return null;

        // On éxécute la requete
        $stmt->execute(['id' => $id]);

        // On récupere le résultat
        $row_data = $stmt->fetch();

        // Si on n'a pas de résultat on retourne null
        if (empty($row_data)) return null;

        // L'hydrateur ne remplit que les données qu'il connait
        $jeu = new Jeu($row_data);

        // On reconstruit un tableau de donnée pour Note
        $data_note = [
            'id' => $row_data['note_id'],
            'note_media' => $row_data['note_media'],
            'note_utilisateur' => $row_data['note_utilisateur']
        ];

        // On instancie l'objet Note
        $note = new Note($data_note);

        $data_age = [
            'id' => $row_data['age_id'],
            'label' => $row_data['label'],
            'image_path' => $row_data['img_pegi']
        ];

        // On instancie l'objet RestrictionAge
        $age = new RestrictionAge($data_age);

        // On hydrate les valeur note et age avec les instance de note et age
        $jeu->note = $note;
        $jeu->age = $age;

        return $jeu;
    }

    public function getGamesWithAgeAndNoteByPegi(int $id)
    {
        // On crée la requete
        $q = sprintf(
            'SELECT 
                    %1$s.*,
                    %2$s.note_media,
                    %2$s.note_utilisateur,
                    %3$s.label,
                    %3$s.image_path as img_pegi
                    FROM %1$s
                    INNER JOIN %2$s
                    ON %1$s.note_id = %2$s.id
                    INNER JOIN %3$s
                    ON %1$s.age_id = %3$s.id
                    WHERE %1$s.age_id = :id',
            $this->getTableName(), // %1$s
            AppRepoManager::getRm()->getNoteRepository()->getTableName(), // %2$s
            AppRepoManager::getRm()->getRestrictionAgeRepository()->getTableName() // %3$s
        );

        $arr_result = [];

        // On prépare la requete
        $stmt = $this->pdo->prepare($q);

        // On vérifie que la requete est bien préparé
        if (!$stmt) return $arr_result;

        // On éxécute la requete
        $stmt->execute(['id' => $id]);

        // Si la requete n'est pas valide on retourne le tableau vide
        if (!$stmt) return $arr_result;

        // On boucle sur les données de la requete
        while ($row_data = $stmt->fetch()) {
            // On stock dans $arr_result un nouvel objet de la classe $class_name
            $jeu = new Jeu($row_data);

            // On reconstruit un tableau de donnée pour Note
            $data_note = [
                'id' => $row_data['note_id'],
                'note_media' => $row_data['note_media'],
                'note_utilisateur' => $row_data['note_utilisateur']
            ];

            // On instancie l'objet Note
            $note = new Note($data_note);

            $data_age = [
                'id' => $row_data['age_id'],
                'label' => $row_data['label'],
                'image_path' => $row_data['img_pegi']
            ];

            // On instancie l'objet RestrictionAge
            $age = new RestrictionAge($data_age);

            // On hydrate les valeur note et age avec les instance de note et age
            $jeu->note = $note;
            $jeu->age = $age;

            $arr_result[] = $jeu;
        }

        // On retourne le tableau
        return $arr_result;
    }
}
