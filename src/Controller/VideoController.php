<?php

namespace App\Controller;

use App\Entity\Video;
use App\Repository\VideoRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends ApiController
{
    /**
     * @Route("/videos", name="video_index")
     * @param VideoRepository $videoRepository
     * @Method("GET")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(VideoRepository $videoRepository)
    {
        return $this->respond($videoRepository->findAllVideos());
    }

    /**
     * @Route("/video/{id}", name="video_show")
     * @Method("GET")
     */
    public function show($id, VideoRepository $videoRepository)
    {
        $video = $videoRepository->findOneVideo($id);

        if (! $video) {
            return $this->respondNotFound();
        }
        return $this->respond($video);
    }
}
