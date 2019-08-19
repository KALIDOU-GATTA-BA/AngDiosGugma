<?php

namespace App\Repository;

use App\Entity\Negros;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Negros|null find($id, $lockMode = null, $lockVersion = null)
 * @method Negros|null findOneBy(array $criteria, array $orderBy = null)
 * @method Negros[]    findAll()
 * @method Negros[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NegrosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Negros::class);
    }

    // /**
    //  * @return Negros[] Returns an array of Negros objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Negros
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
