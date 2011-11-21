<?php

/**
 * feedback actions.
 *
 * @package    si-invest
 * @subpackage feedback
 * @author     sergk
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class investorsActions extends sfActions
{
  public function preExecute()
  {
    $response = $this->getResponse();
    $response->setTitle($this->getContext()->getI18N()->__('КРАТКАЯ  АНКЕТА ИНВЕСТОРА'));
  }

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeAdd(sfWebRequest $request)
  {
    $this->form = new InvestorForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('investor'));

      if ($this->form->isValid())
      {
        $this->form->save();

        $admin = Doctrine_Core::getTable('sfGuardUser')
            ->createQuery('u')
            ->where('u.username = ?', 'admin')
            ->fetchOne();

        $to = $admin->email_address;

        $body = $this->getPartial('mail', array('form' => $this->form->getValues()));

        $this->getMailer()->composeAndSend(
          array('noreply@site.org' => 'Сайт site.org'),
          $to,
          'Заполнена краткая форма инвестора на сайте site.org',
          $body
        );

        $this->redirect('@investors_successfull');
      }
    }

  }

  public function executeSuccessfull(sfWebRequest $request)
  {

  }
}
