<?php

namespace App\Controller;

use App\Repository\DoctorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CityController extends AbstractController
{

    // this is accessible directly with the localhost/city
    #[Route('/city', name: 'app_city')]
    public function index(DoctorRepository $dr): JsonResponse
    {
        return $this->json([
            'cities' => $dr->findAll()
        ]);
    }
}
