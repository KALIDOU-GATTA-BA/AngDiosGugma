<?php

namespace App\Repository;

use App\Entity\RadioSponsorship;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RadioSponsorship|null find($id, $lockMode = null, $lockVersion = null)
 * @method RadioSponsorship|null findOneBy(array $criteria, array $orderBy = null)
 * @method RadioSponsorship[]    findAll()
 * @method RadioSponsorship[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RadioSponsorshipRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RadioSponsorship::class);
    }
}
