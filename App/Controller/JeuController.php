<?php

namespace App\Controller;

use Core\View\View;
use Core\Controller\Controller;
use Core\Repository\AppRepoManager;

class JeuController extends Controller
{
    public function index()
    {
        // On créer un tableau de donnée à envoyer à la vue
        $data = [
            'title_tag' => 'Liste des jeux',
            'jeux' => AppRepoManager::getRm()->getJeuRepository()->getAllGamesWithAgeAndNote()
        ];

        $view = new View('jeu/index');
        $view->render($data);
    }

    public function detail(int $id)
    {
        // On créer un tableau de donnée à envoyer à la vue
        $data = [
            'title_tag' => 'Détail d\'un jeux',
            'jeu' => AppRepoManager::getRm()->getJeuRepository()->getAllGamesWithAgeAndNoteById($id)
        ];

        $view = new View('jeu/detail');
        $view->render($data);
    }

    public function listPegi(int $id)
    {
        // On créer un tableau de donnée à envoyer à la vue
        $data = [
            'title_tag' => 'Jeux trier par Pegi',
            'jeux' => AppRepoManager::getRm()->getJeuRepository()->getGamesWithAgeAndNoteByPegi($id)
        ];

        $view = new View('jeu/index');
        $view->render($data);
    }
}
