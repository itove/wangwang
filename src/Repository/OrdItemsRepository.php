<?php

namespace App\Repository;

use App\Entity\OrdItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrdItems>
 *
 * @method OrdItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdItems[]    findAll()
 * @method OrdItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdItems::class);
    }

//    /**
//     * @return OrdItems[] Returns an array of OrdItems objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OrdItems
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
