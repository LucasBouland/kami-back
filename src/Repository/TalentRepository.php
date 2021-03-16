<?php

namespace App\Repository;

use App\Entity\Talent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Talent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Talent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Talent[]    findAll()
 * @method Talent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TalentRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Talent::class);
        $this->manager = $manager;
    }

    public function saveTalent($name, $type, $timing, $reach,$target,$cost,$effect,$reference) :Talent 
    {
        $newTalent = new Talent();

        $newTalent
            ->setName($name)
            ->setType($type)
            ->setTiming($timing)
            ->setReach($reach)
            ->setTarget($target)
            ->setCost($cost)
            ->setEffect($effect)
            ->setReference($reference);
            $this->manager->persist($newTalent);
            $this->manager->flush();
        //TODO handle error
        return $newTalent;
    }

    public function updateTalent(Talent $talent) : Talent
    {
        $this->manager->persist($talent);
        $this->manager->flush();
        return $talent;
    }

    public function deleteTalent(Talent $talent) 
    {
        $this->manager->remove($talent);
        $this->manager->flush();
    }
    // /**
    //  * @return Talent[] Returns an array of Talent objects
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
    public function findOneBySomeField($value): ?Talent
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
