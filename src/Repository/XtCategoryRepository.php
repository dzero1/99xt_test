<?php

namespace App\Repository;

use App\Entity\XtCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method XtCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method XtCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method XtCategory[]    findAll()
 * @method XtCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XtCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, XtCategory::class);
    }

    // /**
    //  * @return XtCategory[] Returns an array of XtCategory objects
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
    public function findOneBySomeField($value): ?XtCategory
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
