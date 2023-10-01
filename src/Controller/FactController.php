<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

ini_set('display_errors', 1);
error_reporting(E_ALL);

class FactController extends AbstractController
{

    #[Route('/', name: 'app_fact')]
    public function index(Request $request): Response
    {

    	if ($request->query->get('combi_n') != null && $request->query->get('combi_p') != null) {
    		$n = intval($request->query->get('combi_n'));
    		$p = intval($request->query->get('combi_p'));
    		$r = factorielle($n)/(factorielle($p)*factorielle($n-$p));
			return $this->render('fact/factocombi.html.twig',[
    			'n' => $n,
    			'p' => $p, 
    			'r' => $r]);
    	} else if ($request->query->get('fact') != null){
    		$k = intval($request->query->get('fact'));
    		$r = factorielle($k);
			return $this->render('fact/factocombi.html.twig',[
    			'k' => $k, 
    			'r' => $r]);
    	} else {
			return $this->render('base.html.twig',[]);
    	}
    	

        
    }

    #[Route('/combi/{n}/{p}', name: 'app_combi')]
    public function combi($n,$p): Response
    {
        $combinaisons = factorielle($n)/(factorielle($p)*factorielle($n-$p));
        return new Response("Nombre de combinaisons de n éléments dans p places : ".$combinaisons);
    }

    #[Route('/fact/{n}')]
    public function fact($n): Response 
    {
    	return new Response($n."!=".factorielle($n));
    }
}

function factorielle($n){
	 	$res = 1;
	 	if ($n==0) {
	 		return $res;
	 	} else {
	 		for ($i=1; $i < $n+1; $i++) { 
	 			$res = $res*$i;
	 		}
	 	}
	 	return $res;
	 }
