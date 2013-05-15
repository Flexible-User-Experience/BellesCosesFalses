<?php
namespace Flux\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ActivityRepository extends EntityRepository
{
    public function getActiveItemsSortedByPosition()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM FluxProductBundle:Activity c WHERE c.isActive = 1 ORDER BY c.position ASC')
            ->getResult();
    }

    public function getSortedActiveItemsOfCategory($category)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxProductBundle:Activity p WHERE p.isActive = 1 AND p.category = :category ORDER BY p.position ASC')
            ->setParameter('category', $category)
            ->getResult();
    }
}