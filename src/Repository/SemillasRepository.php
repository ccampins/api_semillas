<?php

namespace App\Repository;

use App\Entity\Semillas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Semillas>
 *
 * @method Semillas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Semillas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Semillas[]    findAll()
 * @method Semillas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SemillasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Semillas::class);
    }

    public function add(Semillas $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Semillas $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Semillas[] Returns an array of Semillas objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Semillas
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findOneById($id): ?Semillas
    {
        return $this->createQueryBuilder('s')
            ->andWhere("s.id = $id")
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
