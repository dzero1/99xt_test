<?php

namespace App\Repository;

use App\Entity\XtCoupon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method XtCoupon|null find($id, $lockMode = null, $lockVersion = null)
 * @method XtCoupon|null findOneBy(array $criteria, array $orderBy = null)
 * @method XtCoupon[]    findAll()
 * @method XtCoupon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XtCouponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, XtCoupon::class);
    }

    // /**
    //  * @return XtCoupon[] Returns an array of XtCoupon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('x')
            ->andWhere('x.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('x.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?XtCoupon
    {
        return $this->createQueryBuilder('x')
            ->andWhere('x.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
