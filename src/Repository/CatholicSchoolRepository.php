<?php

namespace App\Repository;

use App\Entity\CatholicSchool;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CatholicSchool|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatholicSchool|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatholicSchool[]    findAll()
 * @method CatholicSchool[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatholicSchoolRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CatholicSchool::class);
    }

    // /**
    //  * @return CatholicSchool[] Returns an array of CatholicSchool objects
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
    public function findOneBySomeField($value): ?CatholicSchool
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
