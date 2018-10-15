<?php

namespace App\Repository;

use App\Entity\Video;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Video::class);
    }

    public function transform(Video $video){
        return [
            'id' => (int) $video->getId(),
            'title' => (string) $video->getTitle(),
            'description' => (string) $video->getDescription(),
            'video' => (string) $video->getVideoPath()
        ];
    }
//    /**
//     * @return Videos[] Returns an array of Videos objects
//     */
    public function findAllVideoByUser(){
        $videoArray = [];
        $videos = $this->findAllVideos();
        /*foreach ($videos as $video) {
            $videoArray[] = $this->transform($video);
        }*/
        dump($videos);die();


    }

    public function findAllVideos(){
        return $this->createQueryBuilder('v')
            ->andWhere('v.status = true')
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getArrayResult();
    }

    public function findOneVideo($id)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.id = :id')
            ->setParameter('id', $id)
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getArrayResult();
    }
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Videos
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
