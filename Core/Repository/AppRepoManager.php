<?php

namespace Core\Repository;

use Core\App;
use App\Model\Repository\JeuRepository;
use App\Model\Repository\NoteRepository;
use App\Model\Repository\RestrictionAgeRepository;

class AppRepoManager
{
    // On importe le trait
    use RepositoryManagerTrait;

    // Exemple d'une déclaration d'un repo
    // private UserRepository $userRepository;
    private JeuRepository $jeuRepository;
    private RestrictionAgeRepository $restrictionAgeRepository;
    private NoteRepository $noteRepository;


    // Getter de jeurepository
    public function getJeurepository()
    {
        return $this->jeuRepository;
    }

    public function getRestrictionAgeRepository()
    {
        return $this->restrictionAgeRepository;
    }

    public function getNoteRepository()
    {
        return $this->noteRepository;
    }
    // Exemple d'un getter
    // on créerle getter
    // Celui de UserRepository
    // public function getUserRepo(): UserRepository
    // {
    //     return $this->userRepository;
    // }

    protected function __construct()
    {
        $config = App::getApp();
        // Exemple d'un repo enrestrer
        // $this->userRepository = new UserRepository($config);
        $this->jeuRepository = new JeuRepository($config);
        $this->restrictionAgeRepository = new RestrictionAgeRepository($config);
        $this->noteRepository = new NoteRepository($config);
    }
}
