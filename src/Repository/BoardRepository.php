<?php

namespace App\Repository;

use App\Entity\Board;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Board|null find($id, $lockMode = null, $lockVersion = null)
 * @method Board|null findOneBy(array $criteria, array $orderBy = null)
 * @method Board[]    findAll()
 * @method Board[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoardRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Board::class);
    }

    public function create() : Board
    {
        $board = new Board;

        $code = md5((new \DateTime)->format('YmdHis'));
        $board->setCode($code);

        $this->getEntityManager()->persist($board);
        $this->getEntityManager()->flush();

        return $board;

    }

    public function findOneByCode(string $code) :  ?Board
    {
        return $this->findOneBy(['code' => $code]);
    }

    // /**
    //  * @return Board[] Returns an array of Board objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Board
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
