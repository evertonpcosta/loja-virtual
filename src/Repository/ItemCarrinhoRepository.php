<?php

namespace App\Repository;

use App\Entity\ItemCarrinho;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ItemCarrinho|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemCarrinho|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemCarrinho[]    findAll()
 * @method ItemCarrinho[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemCarrinhoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ItemCarrinho::class);
    }

//    /**
//     * @return ItemCarrinho[] Returns an array of ItemCarrinho objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ItemCarrinho
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
