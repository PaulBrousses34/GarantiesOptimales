<?php

namespace App\Repository;

use App\Entity\SousCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SousCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousCategorie[]    findAll()
 * @method SousCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousCategorie::class);
    }


    // /**
    //  * @return SousCategorie[] Returns an array of SousCategorie objects
    //  */
    /*
    public function findByTypes($id)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.type = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    /*
    public function findOneBySomeField($value): ?SousCategorie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
