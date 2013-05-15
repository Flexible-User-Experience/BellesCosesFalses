<?php
namespace Flux\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ActivityCategoryRepository extends EntityRepository
{
    public function getActiveItemsSortedByPosition()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM FluxProductBundle:ActivityCategory c WHERE c.isActive = 1 ORDER BY c.position ASC')
            ->getResult();
    }
}