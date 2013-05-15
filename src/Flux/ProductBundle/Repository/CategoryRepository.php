<?php
namespace Flux\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function getActiveItemsSortedByPosition()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM FluxProductBundle:Category c WHERE c.isActive = 1 ORDER BY c.position ASC')
            ->getResult();
    }
}