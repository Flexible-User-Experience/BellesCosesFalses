<?php
namespace Flux\PageBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PageRepository extends EntityRepository
{
    public function getActiveItemsSortedByPosition()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxPageBundle:Page p WHERE p.isActive = 1 ORDER BY p.position ASC')
            ->getResult();
    }

    public function getActiveItemsSortedByPositionWithStartCode($code)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxPageBundle:Page p WHERE p.isActive = 1 AND SUBSTRING(p.code, 1, 3) = :code ORDER BY p.position ASC')
            ->setParameter('code', $code)
            ->getResult();
    }
}