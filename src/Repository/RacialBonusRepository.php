<?php

namespace App\Repository;

use App\Entity\RacialBonus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RacialBonus|null find($id, $lockMode = null, $lockVersion = null)
 * @method RacialBonus|null findOneBy(array $criteria, array $orderBy = null)
 * @method RacialBonus[]    findAll()
 * @method RacialBonus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RacialBonusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RacialBonus::class);
    }

    // /**
    //  * @return RacialBonus[] Returns an array of RacialBonus objects
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
    public function findOneBySomeField($value): ?RacialBonus
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
