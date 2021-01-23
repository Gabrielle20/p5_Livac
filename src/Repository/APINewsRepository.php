<?php

namespace App\Repository;

use App\Entity\APINews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method APINews|null find($id, $lockMode = null, $lockVersion = null)
 * @method APINews|null findOneBy(array $criteria, array $orderBy = null)
 * @method APINews[]    findAll()
 * @method APINews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class APINewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, APINews::class);
    }

    // /**
    //  * @return APINews[] Returns an array of APINews objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?APINews
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
