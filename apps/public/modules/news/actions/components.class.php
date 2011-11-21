<?php

class newsComponents extends sfComponents
{
  public function executeTop(sfWebRequest $request, $limit = 5)
  {

    $query = Doctrine::getTable('News')
        ->createQuery('n')
        ->leftJoin('n.Translation t')
        ->andWhere('t.lang = ?', $this->getUser()->getCulture())
        ->addWhere('n.status=?', NewsTable::ACTIVE)
        ->orderBy('created_at DESC')
        ->limit($limit);

    $this->newss = $query->execute();
  }
}