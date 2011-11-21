<?php

class galleryComponents extends sfComponents
{
  public function executeShow(sfWebRequest $request)
  {

    $query = Doctrine::getTable('Gallery')
        ->createQuery('g')
        ->leftJoin('g.Translation t')
        ->andWhere('t.lang = ?', $this->getUser()->getCulture())
        ->orderBy('position ASC');

    $this->gallery = $query->execute();
  }
}