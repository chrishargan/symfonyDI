<?php

namespace App\Repository;

use App\Entity\Capitalize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Capitalize|null find($id, $lockMode = null, $lockVersion = null)
 * @method Capitalize|null findOneBy(array $criteria, array $orderBy = null)
 * @method Capitalize[]    findAll()
 * @method Capitalize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CapitalizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Capitalize::class);
    }

    // /**
    //  * @return Capitalize[] Returns an array of Capitalize objects
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
    public function findOneBySomeField($value): ?Capitalize
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
