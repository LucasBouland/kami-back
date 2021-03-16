<?php

namespace App\Repository;

use App\Entity\RaceAttribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RaceAttribute|null find($id, $lockMode = null, $lockVersion = null)
 * @method RaceAttribute|null findOneBy(array $criteria, array $orderBy = null)
 * @method RaceAttribute[]    findAll()
 * @method RaceAttribute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RaceAttributeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RaceAttribute::class);
    }

    // /**
    //  * @return RaceAttribute[] Returns an array of RaceAttribute objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RaceAttribute
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
