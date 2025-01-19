<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(): Response
    {
        $projects = [
            [
                'title' => 'Projet PHP/Symfony restaurant vente en ligne',
                'description' => 'Application web développée avec Symfony 6',
                'technologies' => ['PHP 8', 'Symfony 6', 'MySQL', 'Bootstrap', 'JavaScript'],
                'features' => [
                    'Authentication utilisateur',
                    'CRUD opérations',
                    'API REST',
                    'Interface responsive'
                ],
                'image' => 'images/symfony-project.jpg',
                'github' => 'https://github.com/yy0416/ChezHibou.git'
            ],
            [
                'title' => 'Projet Java/Angular',
                'description' => 'Application full-stack avec Spring Boot et Angular',
                'technologies' => ['Java', 'Spring Boot', 'Angular', 'TypeScript', 'PostgreSQL'],
                'features' => [
                    'Architecture microservices',
                    'Interface moderne',
                    'Gestion en temps réel',
                    'Tests automatisés'
                ],
                'image' => 'images/angular-project.jpg',
                'github' => 'https://github.com/votre-compte/projet-angular'
            ]
        ];

        return $this->render('project/index.html.twig', [
            'projects' => $projects
        ]);
    }
}
