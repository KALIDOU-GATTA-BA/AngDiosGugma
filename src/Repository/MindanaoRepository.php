<?php

namespace App\Repository;

use App\Entity\Mindanao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mindanao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mindanao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mindanao[]    findAll()
 * @method Mindanao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MindanaoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mindanao::class);
    }

    // /**
    //  * @return Mindanao[] Returns an array of Mindanao objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mindanao
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
