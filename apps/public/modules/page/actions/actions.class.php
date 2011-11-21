<?php

/**
 * page actions.
 *
 * @package    si-invest
 * @subpackage page
 * @author     sergk
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {

    if ($request->getParameter('name') == 'index')
    {
      if (!$request->getParameter('sf_culture'))
      {
        if ($this->getUser()->isFirstRequest())
        {
          $culture = $request->getPreferredCulture(array('ru', 'en', 'de'));
          $this->getUser()->setCulture($culture);
          $this->getUser()->isFirstRequest(false);
        }
        else
        {
          $culture = $this->getUser()->getCulture();
        }

        $this->redirect('localized_homepage');
      }
    }

    $name = $request->getParameter('name');
    $page = Doctrine_Core::getTable('Page')
        ->createQuery('p')
        ->addWhere('status=?', PageTable::ACTIVE)
        ->addWhere('slug=?', $name)
        ->fetchOne();

    $this->forward404Unless($page, sprintf('Object page does not exist (%s).', $name));

    $response = $this->getResponse();
    $response->setTitle($page->name ? $page->name : $page->title);
    $response->addMeta('description', $page->description);
    $response->addMeta('keywords', $page->keywords);

    $this->page = $page;
  }

}
