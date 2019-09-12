<?php

namespace App\Repository;

use App\Entity\LiveChatMaintenance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LiveChatMaintenance|null find($id, $lockMode = null, $lockVersion = null)
 * @method LiveChatMaintenance|null findOneBy(array $criteria, array $orderBy = null)
 * @method LiveChatMaintenance[]    findAll()
 * @method LiveChatMaintenance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiveChatMaintenanceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LiveChatMaintenance::class);
    }

    // /**
    //  * @return LiveChatMaintenance[] Returns an array of LiveChatMaintenance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LiveChatMaintenance
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
