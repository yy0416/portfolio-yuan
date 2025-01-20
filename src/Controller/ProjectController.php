<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ProjectController extends BaseController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(): Response
    {
        $projects = [
            [
                'title' => $this->trans('Projet PHP/Symfony restaurant vente en ligne'),
                'description' => $this->trans('Application web développée avec Symfony 6'),
                'technologies' => ['PHP 8', 'Symfony 6', 'MySQL', 'Bootstrap', 'JavaScript'],
                'features' => [
                    $this->trans('Authentication utilisateur'),
                    $this->trans('CRUD opérations'),
                    $this->trans('API REST'),
                    $this->trans('Interface responsive')
                ],
                'image' => 'images/symfony_ecommerce.png',
                'github' => 'https://github.com/yy0416/ChezHibou.git'
            ],
            [
                'title' => $this->trans('Projet Java/Angular Kanban'),
                'description' => $this->trans('Application full-stack avec Spring Boot et Angular'),
                'technologies' => ['Java', 'Spring Boot', 'Angular', 'TypeScript', 'PostgreSQL'],
                'features' => [
                    $this->trans('Architecture microservices'),
                    $this->trans('Interface moderne'),
                    $this->trans('Gestion en temps réel')
                ],
                'image' => 'images/angular_kanban.jpg',
                'github' => 'https://github.com/votre-compte/projet-angular'
            ]
        ];

        return $this->render('project/index.html.twig', [
            'projects' => $projects
        ]);
    }
}
