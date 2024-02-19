<?php

namespace App\Repository;

use App\Entity\Cooperative;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cooperative>
 *
 * @method Cooperative|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cooperative|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cooperative[]    findAll()
 * @method Cooperative[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CooperativeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cooperative::class);
    }

//    /**
//     * @return Cooperative[] Returns an array of Cooperative objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cooperative
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
