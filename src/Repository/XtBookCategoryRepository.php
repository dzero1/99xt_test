<?php

namespace App\Repository;

use App\Entity\XtBookCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method XtBookCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method XtBookCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method XtBookCategory[]    findAll()
 * @method XtBookCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XtBookCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, XtBookCategory::class);
    }

    // /**
    //  * @return XtBookCategory[] Returns an array of XtBookCategory objects
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
    public function findOneBySomeField($value): ?XtBookCategory
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
