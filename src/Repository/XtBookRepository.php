<?php

namespace App\Repository;

use App\Entity\XtBook;
use App\Entity\XtCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method XtBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method XtBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method XtBook[]    findAll()
 * @method XtBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XtBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, XtBook::class);
    }

    // /**
    //  * @return XtBook[] Returns an array of XtBook objects
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
    public function findOneBySomeField($value): ?XtBook
    {
        return $this->createQueryBuilder('x')
            ->andWhere('x.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findByCategory($category_id)
    {
        return $this->createQueryBuilder('xt_book')
            ->select('xt_book')
            ->leftJoin('xt_book.category', 'cat')
            ->andWhere('cat.id = :val')
            ->setParameter('val', $category_id)
            ->getQuery()
            ->getResult();
    }

}
