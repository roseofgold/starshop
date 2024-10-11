<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    public function getCollection(StarshipRepository $starshipRepository): Response
    {
        $starships = $starshipRepository->findAll();

        return $this->json($starships);
    }
}
