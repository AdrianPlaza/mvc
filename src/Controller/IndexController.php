<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route("/", name: "index")]
    public function number(): Response
    {
        return $this->render('index.html.twig');
    }
    #[Route("/about", name: "about")]
    public function home(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route("/report", name: "report")]
    public function about(): Response
    {
        return $this->render('report.html.twig');
    }
    #[Route("/lucky", name: "lucky")]
    public function lucky(): Response
    {
        $number = random_int(0, 100);
        $data = [
            'number' => $number
        ];
        return $this->render('lucky.html.twig', $data);
    }
    #[Route("api/", name: "api")]
    public function api(): Response
    {
        return $this->render('api.html.twig');
    }
    #[Route("/api/quote", name: "quote")]
    public function quote(): Response
    {
        date_default_timezone_set("Europe/Stockholm");  
        $number = random_int(0, 2);
        $array = ["Best quote ever!", "Hej, kompis!", "Clutch or kick"];

        
        $data = [
            'date' => date("Y:m:d"),
            'time' => date("h:i:sa"),
            'quote' => $array[$number],
        ];
        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;   
    }
}   