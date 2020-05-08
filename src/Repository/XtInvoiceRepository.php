<?php

namespace App\Repository;

use App\Entity\XtInvoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method XtInvoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method XtInvoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method XtInvoice[]    findAll()
 * @method XtInvoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XtInvoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, XtInvoice::class);
    }

    // /**
    //  * @return XtInvoice[] Returns an array of XtInvoice objects
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
    public function findOneBySomeField($value): ?XtInvoice
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
