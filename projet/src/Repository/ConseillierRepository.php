<?php

namespace App\Repository;

use App\Entity\Conseiller;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Conseiller|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conseiller|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conseiller[]    findAll()
 * @method Conseiller[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConseillierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conseiller::class);
    }

    // /**
    //  * @return Conseillier[] Returns an array of Conseillier objects
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
    public function findOneBySomeField($value): ?Conseillier
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
