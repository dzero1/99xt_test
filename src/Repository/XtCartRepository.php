<?php

namespace App\Repository;

use App\Entity\XtCart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method XtCart|null find($id, $lockMode = null, $lockVersion = null)
 * @method XtCart|null findOneBy(array $criteria, array $orderBy = null)
 * @method XtCart[]    findAll()
 * @method XtCart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XtCartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, XtCart::class);
    }

    // /**
    //  * @return XtCart[] Returns an array of XtCart objects
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
    public function findOneBySomeField($value): ?XtCart
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
