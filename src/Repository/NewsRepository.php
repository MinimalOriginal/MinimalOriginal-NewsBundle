<?php

namespace MinimalOriginal\NewsBundle\Repository;

use MinimalOriginal\CoreBundle\Repository\AbstractRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * NewsRepository
 */
class NewsRepository extends AbstractRepository
{
  /**
   * {@inheritdoc}
   */
  public function getOrderExposed(){
    return array_merge(
      parent::getOrderExposed(),
      array('published' => "Date de publication")
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function addTypeOn(QueryBuilder $qb)
  {
    switch ($this->getType()) {
        case 'online':
            $qb->andWhere($qb->getRootAlias() . '.publishedAt >= CURRENT_TIMESTAMP()');

            break;
    }
    return $qb;
  }

  /**
   * {@inheritdoc}
   */
  protected function addOrderBy(QueryBuilder $qb)
  {
      switch ($this->getOrderType()) {
          case 'published':
              $qb->orderBy($qb->getRootAlias() . '.published', $this->getOrderDir());

              break;
      }
      return parent::addOrderBy($qb);

  }

  /**
   * {@inheritdoc}
   */
  public function getDefaultOrderType()
  {
    return 'published';
  }
}
