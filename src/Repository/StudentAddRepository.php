<?php

namespace App\Repository;

use App\Entity\StudentAdd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StudentAdd|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentAdd|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentAdd[]    findAll()
 * @method StudentAdd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentAddRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StudentAdd::class);
    }

    // /**
    //  * @return StudentAdd[] Returns an array of StudentAdd objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StudentAdd
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
