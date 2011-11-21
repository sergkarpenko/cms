<?php

class blockComponents extends sfComponents
{
  public function executeShow(sfWebRequest $request)
  {
    $query = Doctrine::getTable('Block')
        ->createQuery('b')
        ->leftJoin('b.Translation t')
        ->andWhere('t.lang = ?', $this->getUser()->getCulture())
        ->where('name = ?', $this->name);

    $this->block = $query->fetchOne();
  }
}