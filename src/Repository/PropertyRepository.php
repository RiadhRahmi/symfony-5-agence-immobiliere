<?php

namespace App\Repository;

use App\Entity\Property;
use App\Entity\PropertySearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }

    // used in search
    public function findAllVisibleQuery(PropertySearch $search)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.sold = false');

        if ($search->getMinPrice()) {
            $query = $query->andWhere('p.price >= :minPrice')
            ->setParameter('minPrice', $search->getMinPrice());
        }

        if ($search->getMaxPrice()) {
            $query = $query->andWhere('p.price <= :maxPrice')
            ->setParameter('maxPrice', $search->getMaxPrice());
        }

        if ($search->getMinSurface()) {
            $query = $query->andWhere('p.surface >= :minSurface')
            ->setParameter('minSurface', $search->getMinSurface());
        }

        if ($search->getMaxSurface()) {
            $query = $query->andWhere('p.surface <= :maxSurface')
            ->setParameter('maxSurface', $search->getMaxSurface());
        }

        if ($search->getOptions()->count() > 0) {
            $key = 0;
            foreach ($search->getOptions() as $option) {
                $key++;
                $query = $query->andWhere(":option$key MEMBER OF p.options")
                ->setParameter("option$key", $option);
            }
        }

        return $query->getQuery();
    }

    public function findLatest()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.sold = false')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
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
    public function findOneBySomeField($value): ?Property
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
