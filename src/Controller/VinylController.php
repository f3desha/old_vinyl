<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController {
    #[Route('/')]
    public function homepage(): Response {
        $tracks = [
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB and Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response {
        if ($slug) {
            $title = 'Genre: ' . u(str_replace('-',' ', $slug))->title(true);
        } else {
            $title = 'Genre: All genres';
        }
        return new Response($title);
    }

}
