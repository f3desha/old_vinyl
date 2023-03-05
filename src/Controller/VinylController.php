<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController {
    #[Route('/', name: 'app_homepage')]
    public function homepage(Environment $twig): Response {
        $tracks = [
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB and Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response {

        $genre = $slug ? u(str_replace('-',' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }

}
