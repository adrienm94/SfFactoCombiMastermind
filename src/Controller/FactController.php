<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

include("factorielle.php");

class FactController extends AbstractController
{
    #[Route('/fact/{n}', name: 'app_fact')]
    public function index($n): Response
    {
        return new Response($n."!"."=".factorielle($n));
    }

    #[Route('/combi/{n}/{p}', name: 'app_combi')]
    public function combi($n,$p): Response
    {
        $combinaisons = factorielle($n)/(factorielle($p)*factorielle($n-$p));
        return new Response("Nombre de combinaisons de n éléments dans p places : ".$combinaisons);
    }
}
