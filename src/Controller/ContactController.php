<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig');
    }

    #[Route('/contact/send', name: 'contact_send', methods: ['POST'])]
    public function send(Request $request, MailerInterface $mailer): Response
    {
        try {
            $data = json_decode($request->getContent(), true);

            $email = (new Email())
                ->from('yueyuan0416@gmail.com')
                ->to($data['email'])
                ->replyTo($data['email'])
                ->subject('Nouveau message du Portfolio')
                ->html($this->renderView('contact/success.html.twig', [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'message' => $data['message']
                ]));

            $mailer->send($email);

            return $this->json([
                'success' => true,
                'redirect' => $this->generateUrl('contact_success')
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Erreur lors de l envoi du message: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route('/contact/success', name: 'contact_success')]
    public function success(): Response
    {
        return $this->render('contact/success.html.twig');
    }
}
