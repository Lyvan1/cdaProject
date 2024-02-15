<?php

namespace App\Repository;

use App\Entity\GameNotation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GameNotation>
 *
 * @method GameNotation|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameNotation|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameNotation[]    findAll()
 * @method GameNotation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameNotationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GameNotation::class);
    }

//    /**
//     * @return GameNotation[] Returns an array of GameNotation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GameNotation
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
