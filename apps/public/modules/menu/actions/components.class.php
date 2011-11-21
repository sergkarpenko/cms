<?php

class menuComponents extends sfComponents
{
  public function executeList(sfWebRequest $request)
  {

    $query = Doctrine::getTable('Menu')
        ->createQuery('m')
        ->leftJoin('m.Translation t')
        ->andWhere('t.lang = ?', $this->getUser()->getCulture())
        ->addWhere('m.status=?', MenuTable::ACTIVE)
        ->orderBy('position ASC');

    $this->menu = $query->execute();
  }
}