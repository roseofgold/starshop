<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', name: 'api_starships', methods: ['GET'])]
    public function getCollection(StarshipRepository $starshipRepository): Response
    {
        $starships = $starshipRepository->findAll();

        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', name: 'api_starship', methods: ['GET'])]
    public function get(int $id, StarshipRepository $starshipRepository): Response
    {
        $starship = $starshipRepository->find($id);

        if (!$starship) {
            throw $this->createNotFoundException('Starship not found.');
        }

        return $this->json($starship);
    }
}
