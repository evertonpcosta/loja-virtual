<?php

namespace App\Repository;

use App\Entity\Produto;
use App\Entity\ProdutoCategoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Produto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produto[]    findAll()
 * @method Produto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdutoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Produto::class);
    }

    public function findOneByIdJoinedToCategoria($categoria_id)
    {
        return $this->createQueryBuilder('p')
        // p.category refers to the "category" property on product
            ->innerJoin(ProdutoCategoria::class, 'pc')
        // selects all the
            ->andWhere('pc.categoria_id = :id')
            ->setParameter('id', $categoria_id)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
    //     * @return Produto[] Returns an array of Produto objects
    //     */
    /*
    public function findByExampleField($value)
    {
    return $this->createQueryBuilder('p')
    ->andWhere('p.exampleField = :val')
    ->setParameter('val', $value)
    ->orderBy('p.id', 'ASC')
    ->setMaxResults(10)
    ->getQuery()
    ->getResult()
    ;
    }
     */

    /*
public function findOneBySomeField($value): ?Produto
{
return $this->createQueryBuilder('p')
->andWhere('p.exampleField = :val')
->setParameter('val', $value)
->getQuery()
->getOneOrNullResult()
;
}
 */
}
