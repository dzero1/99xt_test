<?php

namespace App\Repository;

use App\Entity\XtInvoiceItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method XtInvoiceItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method XtInvoiceItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method XtInvoiceItems[]    findAll()
 * @method XtInvoiceItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XtInvoiceItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, XtInvoiceItems::class);
    }

    // /**
    //  * @return XtInvoiceItems[] Returns an array of XtInvoiceItems objects
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
    public function findOneBySomeField($value): ?XtInvoiceItems
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
