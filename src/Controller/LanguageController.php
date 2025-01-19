<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    #[Route('/change-locale/{locale}', name: 'change_locale')]
    public function changeLocale(Request $request, string $locale): Response
    {
        // Vérifier si la locale est valide
        if (!in_array($locale, ['fr', 'en', 'zh'])) {
            throw $this->createNotFoundException('Locale not found');
        }

        // Stocker la locale dans la session
        $request->getSession()->set('_locale', $locale);

        // Obtenir l'URL précédente
        $referer = $request->headers->get('referer');

        // Rediriger vers la page précédente ou la page d'accueil
        return $this->redirect($referer ?? '/');
    }
}
