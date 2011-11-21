<?php

/**
 * News
 *
 * @package    si-invest
 * @subpackage news
 * @author     sergk
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('News', 20);
    $this->pager->setQuery(Doctrine_Core::getTable('News')
        ->createQuery('n')
        ->leftJoin('n.Translation t')
        ->andWhere('t.lang = ?', $this->getUser()->getCulture())
        ->addWhere('n.status=?', NewsTable::ACTIVE)
        ->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    $response = $this->getResponse();
    $response->setTitle(
      $this->getContext()->getI18N()->__('Новости'));

  }

  /**
   * @param sfWebRequest $request
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->news = Doctrine_Core::getTable('News')
        ->createQuery('n')
        ->addWhere('id=?', $request->getParameter('id'))
        ->addWhere('n.status=?', NewsTable::ACTIVE)
        ->fetchOne();
    $this->forward404Unless($this->news);
    $response = $this->getResponse();
    $response->setTitle($this->news->name);
  }
}
