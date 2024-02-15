<?php

namespace App\Repository;

use App\Entity\PrivateTeacher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PrivateTeacher>
 *
 * @method PrivateTeacher|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateTeacher|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateTeacher[]    findAll()
 * @method PrivateTeacher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateTeacherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateTeacher::class);
    }

//    /**
//     * @return PrivateTeacher[] Returns an array of PrivateTeacher objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PrivateTeacher
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
