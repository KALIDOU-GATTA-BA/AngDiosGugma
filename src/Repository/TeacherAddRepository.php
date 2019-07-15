<?php

namespace App\Repository;

use App\Entity\TeacherAdd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TeacherAdd|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeacherAdd|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeacherAdd[]    findAll()
 * @method TeacherAdd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeacherAddRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TeacherAdd::class);
    }

    // /**
    //  * @return TeacherAdd[] Returns an array of TeacherAdd objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TeacherAdd
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
