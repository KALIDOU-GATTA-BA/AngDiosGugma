<?php

namespace App\Repository;

use App\Entity\Guimaras;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Guimaras|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guimaras|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guimaras[]    findAll()
 * @method Guimaras[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuimarasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Guimaras::class);
    }

    // /**
    //  * @return Guimaras[] Returns an array of Guimaras objects
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
    public function findOneBySomeField($value): ?Guimaras
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
