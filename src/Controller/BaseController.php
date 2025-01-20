<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class BaseController extends AbstractController
{
    public function __construct(protected TranslatorInterface $translator) {}

    protected function trans(string $id): string
    {
        return $this->translator->trans($id);
    }
}
