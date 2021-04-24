<?php

namespace App\Repository;

use App\Entity\Reference;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class ReferenceRepository
 * @package App\Repository
 * @method Reference|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reference|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reference[]    findAll()
 * @method Reference[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceRepository extends ServiceEntityRepository
{
    
    /**
     * ReferenceRepository Constructor
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reference::class);
    }
}

