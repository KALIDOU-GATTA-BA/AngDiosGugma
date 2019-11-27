<?php

namespace App\Repository;

use App\Entity\GospelAlbum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GospelAlbum|null find($id, $lockMode = null, $lockVersion = null)
 * @method GospelAlbum|null findOneBy(array $criteria, array $orderBy = null)
 * @method GospelAlbum[]    findAll()
 * @method GospelAlbum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GospelAlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GospelAlbum::class);
    }

    // /**
    //  * @return GospelAlbum[] Returns an array of GospelAlbum objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GospelAlbum
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
