<?php

namespace App\Repository;

use App\Entity\Capiz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Capiz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Capiz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Capiz[]    findAll()
 * @method Capiz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CapizRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Capiz::class);
    }

    // /**
    //  * @return Capiz[] Returns an array of Capiz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Capiz
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
