<?php declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController {
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response {
        $song = [
            'id' => $id,
            'url' => 'http://carvoy.com/song1.mp3',
            'name' => 'Good days'
        ];

        $logger->info('Returning API response for song {song}', [
            'song' => $id
        ]);

        return new JsonResponse($song);
    }

}
